<?php

namespace App\Controllers;

class Mission extends BaseController
{
    private $missionModel;
    private $clientModel;
    private $profilModel;
    private $salarieModel;

    public function __construct()
    {
        $this->missionModel = model('Mission');
        // $this->missionModel = new Mission();
        $this->clientModel = model('Client');
        // $this->clientModel = new Client();
        $this->profilModel = model('Profil');
        // $this->clientModel = new Client();
        $this->salarieModel = model('Salarie');
        // $this->clientModel = new Client();
    }

    // Methode verif auth
    private function isAuthorized(): bool
    {
        $user = auth()->user();
        return $user->inGroup('admin') || $user->inGroup('com');
    }

    // methode deconnexion
    public function logout()
    {
        return redirect('logout');
    }

    // methode vue list mission
    public function list()
    {
        // verification si non RH
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $missions = $this->missionModel->findJoinAll();
        return view('mission/liste_missions.php', [
            'listeMissions' => $missions,
        ]);
    }

    public function mission($missionId)
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }

        $mission = $this->missionModel->find($missionId);
        $client = $this->clientModel->find($mission['ID_CLIENT']);
        $profilsMission = $this->missionModel->getProfil($missionId);
        $profilIds = [];

        foreach ($profilsMission as $profilMission) {
            $profilIds[] = $profilMission['ID_PROFIL'];
        }

        return view('mission/gestion_mission', [
            'mission' => $mission,
            'client' => $client,
            'profilsMission' => $profilsMission
        ]);
    }

    public function ajout()
    {

        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $clients = $this->clientModel->findAll();
        $profils = $this->profilModel->findAll();

        return view(
            'mission/ajout_mission',
            [
                'listeClient' => $clients,
                'listeProfil' => $profils
            ]
        );
    }

    public function create()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }

        $missionData = $this->request->getPost();

        $this->missionModel->save($missionData);

        // récupération du dernier ID inséré
        $idMission = $this->missionModel->getInsertID();

        // récupération de la liste des profils
        $listProfil = $this->request->getPost('profils[]');

        // parcour la liste de profils de la mission
        foreach ($listProfil as $idProfil) {
            // récupération du nombre par profil courrant
            $nbre = $this->request->getPost($idProfil);
            $this->missionModel->addProfil($idMission, $idProfil, $nbre);
        }
        return redirect('list_mission');
    }

    public function modif($missionId)
    {

        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $mission = $this->missionModel->find($missionId);
        $idMission = $mission['ID_MISSION'];
        $client = $this->clientModel->find($mission['ID_CLIENT']);
        $listeClient = $this->clientModel->findAll();
        $profilsMission = $this->missionModel->getProfil($missionId);

        $listNonProfilMission = $this->profilModel->getProfilsNotMission($idMission);

        //créer une fonction qui ramène les profil qui ne soint pas dans le profil de la mission
        // $listeProfil = $this->missionModel->getProfilNotMission(); //créer une fonction qui ramène les profil qui ne soint pas dans le profil de la mission


        // var_dump($idMission);
        // var_dump($client);
        // var_dump($listeClient);
        // var_dump($listNonProfilMission);
        // var_dump($profilsMission);
        // var_dump($listeProfil);
        // die();

        return view('mission/modif_mission', [
            'mission' => $mission,
            'client' => $client,
            'listeClient' => $listeClient,
            'profilsMission' => $profilsMission,
            'listNonProfilMission' => $listNonProfilMission
        ]);
    }

    public function update()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $missionData = $this->request->getPost();
        $this->missionModel->save($missionData);

        $idMission = $this->request->getPost('ID_MISSION');

        $listProfil = $this->request->getPost('ID_PROFIL[]');

        foreach ($listProfil as $idProfil) {
            $nbre = $this->request->getPost($idProfil);
            $this->missionModel->updateProfil($idMission, $idProfil, $nbre);
        }
        var_dump($missionData);
        return redirect()->to(url_to("gestion_mission", $idMission));
    }

    public function suppr()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $missionData = $this->request->getPost(['ID_MISSION']);
        $this->missionModel->deleteProfilsMission($missionData);
        $this->missionModel->delete($missionData);
        // var_dump($missionData);
        // die();
        return redirect('list_mission');
    }

    public function attribution($missionId)
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $mission = $this->missionModel->find($missionId);
        $profilsMission = $this->missionModel->getProfil($missionId);

        $listeSalarie = $this->salarieModel->findAll();
        $profilsSalarie = [];
        foreach ($listeSalarie as $salarie) {
            $profilsSalarie[] = $this->salarieModel->getProfil($salarie['ID_SALARIE']);
        }

        // var_dump($mission);
        // var_dump($profilsMission);
        // var_dump($listeSalarie);
        // die();

        return view('mission/affect_mission', [
            'mission' => $mission,
            'profilsMission' => $profilsMission,
            'listeSalarie' => $listeSalarie,
            'profilsSalarie' => $profilsSalarie,
        ]);
    }

    public function affect()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $data = $this->request->getPost();
        $nbr = $this->request->getPost('nbr');

        $missionId = $this->request->getPost('ID_MISSION_0');
        $this->missionModel->deleteSalarie($missionId);

        //Cette partie est OK mais il faut que je vérifie si c'est le même
        // for ($i = 0; ($i < $nbr); $i++) {
        //     $idSalarie = $this->request->getPost('ID_SALARIE_' . $i);
        //     $idMission = $this->request->getPost('ID_MISSION_' . $i);
        //     $this->missionModel->addSalarie($idSalarie, $idMission);
        // };

        //Cette partie vérifie si c'est le même
        for ($i = 0; ($i < $nbr); $i++) {
            $idSalarie = $this->request->getPost('ID_SALARIE_' . $i);
            $idMission = $this->request->getPost('ID_MISSION_' . $i);
            $idSalarie2 = $this->request->getPost('ID_SALARIE_' . ($i + 1));
            // var_dump($data);
            // die();
            // var_dump($idSalarie2);
            if ($idSalarie != '' || $idSalarie != null) {
                if ($idSalarie == $idSalarie2) {
                    echo '<h1>Selection des salariés non valide !<h1>';
                    echo '<a href=' . url_to("attribution_mission", $missionId) . '><button>Retour</button>';
                    $this->missionModel->deleteSalarie($missionId);
                    die();
                } else {

                    $this->missionModel->addSalarie($idSalarie, $idMission);
                }
            } else {
                echo '<h1>Selection des salariés vide !<h1>';
                echo '<a href=' . url_to("attribution_mission", $missionId) . '><button>Retour</button>';
                $this->missionModel->deleteSalarie($missionId);
                die();
            }
        };


        return redirect()->to(url_to("gestion_mission", $idMission));
    }

    public function ajoutProfil()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $idProfil = $this->request->getPost(['ID_PROFIL']);
        $nbrProfil = $this->request->getPost(['NOMBRE_PROFIL']);
        $idMission = $this->request->getPost('ID_MISSION');
        // var_dump($idProfil);
        // var_dump($nbrProfil);
        // var_dump($idMission);
        // die();
        $this->missionModel->addProfil($idMission, $idProfil, $nbrProfil);

        return redirect()->to(url_to("modif_mission", $idMission));
    }

    public function supprProfil()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $data = $this->request->getPost();
        $idMission = $this->request->getPost('ID_MISSION');
        $idProfil = $this->request->getPost('ID_PROFIL');
        $this->missionModel->deleteProfilMission($idMission, $idProfil);
        // var_dump($data);
        // var_dump($idMission);
        // var_dump($idProfil);
        // die();
        return redirect()->to(url_to("modif_mission", $idMission));
    }
}

<?php

namespace App\Controllers;

class Salarie extends BaseController
{
    private $salarieModel;
    private $profilModel;

    public function __construct()
    {
        $this->salarieModel = model('Salarie');
        $this->profilModel = model('Profil');
    }

    private function isAuthorized(): bool
    {
        $user = auth()->user();
        return $user->inGroup('admin') || $user->inGroup('rhu');
    }

    public function list()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $listSalaries = $this->salarieModel->findAll();
        // var_dump($listSalarie);

        $profilsSalarie = [];

        foreach ($listSalaries as $salarie) {
            $profilsSalarie[] = $this->salarieModel->getProfil($salarie['ID_SALARIE']);
        }
        // var_dump($profilsSalarie);
        // var_dump($idSalarie);
        // var_dump($profilsSalarie);
        return view('salarie/liste_salaries.php', [
            'listeSalaries' => $listSalaries,
            'profilsSalarie' => $profilsSalarie,
        ]);
    }

    public function ajout()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $profils = $this->profilModel->findAll();
        return view(
            'salarie/ajout_salarie.php',
            [
                'listeProfil' => $profils
            ]
        );
    }

    public function create()
    {

        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $salarieData = $this->request->getPost();
        $this->salarieModel->save($salarieData);
        // var_dump($salarieData);
        // die();
        $idSalarie = $this->salarieModel->getInsertID();

        $listProfil = $this->request->getPost('profils[]');

        foreach ($listProfil as $idProfil) {
            $this->salarieModel->addProfil($idSalarie, $idProfil);
        }

        // var_dump($salarieData);
        // var_dump($idSalarie);
        // var_dump($listProfil);
        return redirect('page_salarie');
    }

    public function modif($salarieId)
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $salarie = $this->salarieModel->find($salarieId);
        $idSalarie = $salarie['ID_SALARIE'];
        $profilsSalarie = $this->salarieModel->getProfil($salarieId);
        $listNonProfilSalarie = $this->profilModel->getProfilsNotSalarie($idSalarie);
        // var_dump($salarie);
        // var_dump($idSalarie);

        // var_dump($listNonProfilSalarie);
        // die();

        return view('salarie/modif_salarie', [
            'salarie' => $salarie,
            'profilsSalarie' => $profilsSalarie,
            'listNonProfilSalarie' => $listNonProfilSalarie
        ]);
    }

    public function update()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $salarieData = $this->request->getPost();

        // var_dump($salarieData);
        // var_dump($salarieFiles);
        // die();
        $this->salarieModel->save($salarieData);
        return redirect('page_salarie');
    }

    public function suppr()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $salarieData = $this->request->getPost(['ID_SALARIE']);
        $this->salarieModel->deleteProfilsSalarie($salarieData);
        $this->salarieModel->delete($salarieData);
        return redirect('page_salarie');
    }

    public function ajoutProfil()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $idProfil = $this->request->getPost('ID_PROFIL');
        $idSalarie = $this->request->getPost('ID_SALARIE');
        // var_dump($idProfil);
        // var_dump($nbrProfil);
        // var_dump($idMission);
        // die();
        $this->salarieModel->addProfil($idSalarie, $idProfil);

        return redirect()->to(url_to("modif_salarie", $idSalarie));
    }

    public function supprProfil()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $data = $this->request->getPost();
        $idSalarie = $this->request->getPost('ID_SALARIE');
        $idProfil = $this->request->getPost('ID_PROFIL');
        $this->salarieModel->deleteProfilSalarie($idSalarie, $idProfil);
        // var_dump($data);
        // var_dump($idMission);
        // var_dump($idProfil);
        // die();
        return redirect()->to(url_to("modif_salarie", $idSalarie));
    }
}

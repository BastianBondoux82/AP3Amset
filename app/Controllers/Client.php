<?php

namespace App\Controllers;

class Client extends BaseController
{
    private $clientModel;
    private $missionModel;

    public function __construct()
    {
        $this->clientModel = model('Client');
        $this->missionModel = model('Mission');
    }

    private function isAuthorized(): bool
    {
        $user = auth()->user();
        return $user->inGroup('admin') || $user->inGroup('com');
    }

    public function list()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $clients = $this->clientModel->findAll();
        return view('client/liste_clients.php', [
            'listeClients' => $clients
        ]);
    }

    public function ajout()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        return view('client/ajout_client');
    }

    public function create()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $clientData = $this->request->getPost();
        $this->clientModel->save($clientData);
        return redirect('page_client');
    }

    public function modif($clientId)
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $client = $this->clientModel->find($clientId);

        return view('client/modif_client.php', [
            'client' => $client
        ]);
    }

    public function update()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }

        $clientData = $this->request->getPost();
        $this->clientModel->save($clientData);
        return redirect('page_client');
    }

    public function suppr()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('page_salarie');
        }
        $idClient = $this->request->getPost(['ID_CLIENT']);

        $listMission = $this->missionModel->findAllMissionByClient($idClient);
        
        foreach ($listMission as $mission) {
            $this->missionModel->deleteProfilsMission($mission['ID_MISSION']);
            $this->missionModel->deleteSalarie($mission['ID_MISSION']);
            $this->missionModel->delete($mission['ID_MISSION']);
        }
        
        $this->clientModel->delete($idClient);

        return redirect('page_client');
    }
}

<?php

namespace App\Controllers;

class Client extends BaseController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = model('Client');
    }

    public function list(): string
    {
        $clients = $this->clientModel->findAll();
        return view('client/liste_clients.php', [
            'listeClients' => $clients
        ]);
    }

    public function ajout()
    {
        return view('client/ajout_client');
    }

    public function create()
    {
        $clientData = $this->request->getPost();
        $this->clientModel->save($clientData);
        return redirect('page_client');
    }

    public function modif($clientId): string
    {
        $client = $this->clientModel->find($clientId);

        return view('client/modif_client.php', [
            'client' => $client
        ]);
    }

    public function update() 
    {

        $clientData = $this->request->getPost();
        $this->clientModel->save($clientData);
        return redirect('page_client');
    }

    public function suppr()
    {
        $clientData = $this->request->getPost();
        $this->clientModel->delete($clientData['ID_CLIENT']);

        return redirect('page_client');
    }
}

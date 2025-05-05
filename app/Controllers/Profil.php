<?php

namespace App\Controllers;

class Profil extends BaseController
{
    private $profilModel;

    public function __construct()
    {
        $this->profilModel = model('Profil');

    }

    private function isAuthorized(): bool
    {
        $user = auth()->user();
        return $user->inGroup('admin');
    }

    public function list()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $profils = $this->profilModel->findAll();
        // dd($profils);
        // die();
        return view('profil/liste_profils.php', [
            'listeProfils' => $profils
        ]);
    }
    
    public function ajout()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        return view('profil/ajout_profil');
    }
    
    public function create()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $profilData = $this->request->getPost();
        // var_dump($profilData);
        // die();
        $this->profilModel->save($profilData);
        return redirect('page_profil');
    }

    // public function modif($profilId)
    // {
    //     if (!$this->isAuthorized()) {
    //         return redirect()->route('list_mission');
    //     }
    //     $profil = $this->profilModel->find($profilId);

    //     return view('profil/modif_profil.php', [
    //         'profil' => $profil
    //     ]);
    // }

    public function update() 
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $profilData = $this->request->getPost();
        // var_dump($profilData);
        // die();
        $this->profilModel->save($profilData);
        return redirect('page_profil');
    }

    //faire modifier profil suppr et ajouter étant déjà fait (Bastian et Paul)

    public function suppr()
    {
        if (!$this->isAuthorized()) {
            return redirect()->route('list_mission');
        }
        $profilData = $this->request->getPost();
        $this->profilModel->delete($profilData['ID_PROFIL']);

        return redirect('page_profil');
    }
}

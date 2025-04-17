<?php

namespace App\Controllers;

class Profil extends BaseController
{
    private $profilModel;

    public function __construct()
    {
        $this->profilModel = model('Profil');

    }

    public function list(): string
    {
        $profils = $this->profilModel->findAll();
        return view('profil/liste_profils.php', [
            'listeProfils' => $profils
        ]);
    }
    
    public function ajout()
    {
        return view('profil/ajout_profil');
    }
    
    public function create()
    {
        $profilData = $this->request->getPost();
        $this->profilModel->save($profilData);
        return redirect('page_profil');
    }

    public function modif($profilId): string
    {
        $profil = $this->profilModel->find($profilId);

        return view('profil/modif_profil.php', [
            'profil' => $profil
        ]);
    }

    public function update() 
    {

        $profilData = $this->request->getPost();
        $this->profilModel->save($profilData);
        return redirect('page_profil');
    }

    //faire modifier profil suppr et ajouter étant déjà fait (Bastian et Paul)

    public function suppr()
    {
        $profilData = $this->request->getPost();
        $this->profilModel->delete($profilData['ID_PROFIL']);

        return redirect('page_profil');
    }
}

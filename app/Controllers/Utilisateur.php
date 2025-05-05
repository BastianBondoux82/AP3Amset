<?php

namespace App\Controllers;

class Utilisateur extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}

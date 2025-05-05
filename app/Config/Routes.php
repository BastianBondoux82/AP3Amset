<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
service('auth')->routes($routes);

// routes pour les pages missions
$routes->get('/', 'Mission::list', ['as' => 'list_mission']);
$routes->get('gestion_mission-(:num)', 'Mission::mission/$1', ['as' => 'gestion_mission']);
$routes->post('list_mission', 'Mission::list', ['as' => 'list_mission']);


$routes->get('create_mission', 'Mission::ajout', ['as' => 'ajout_mission']);
$routes->post('create_mission', 'Mission::create', ['as' => 'create_mission']);

$routes->get('update_mission-(:num)', 'Mission::modif/$1', ['as' => 'modif_mission']);
$routes->post('update_mission', 'Mission::update', ['as' => 'update_mission']);

$routes->post('suppr_mission', 'Mission::suppr', ['as' => 'suppr_mission']);

// routes pour affecter les missions
$routes->get('affect_mission-(:num)', 'Mission::attribution/$1', ['as' => 'attribution_mission']);
$routes->post('affect_mission', 'Mission::affect', ['as' => 'affect_mission']);
$routes->post('suppr_attribution_mission', 'Mission::suppr_affect', ['as' => 'suppr_attribution_mission']);


// routes pour les clients
$routes->get('list_client', 'Client::list', ['as' => 'page_client']);

$routes->get('create_client', 'Client::ajout', ['as' => 'ajout_client']);
$routes->post('create_client', 'Client::create', ['as' => 'create_client']);

$routes->get('update_client-(:num)', 'Client::modif/$1', ['as' => 'modif_client']);
$routes->post('update_client', 'Client::update', ['as' => 'update_client']);

$routes->post('suppr_client', 'Client::suppr', ['as' => 'suppr_client']);

// routes pour les salariés
$routes->get('list_salarie', 'Salarie::list', ['as' => 'page_salarie']);

$routes->get('create_salarie', 'Salarie::ajout', ['as' => 'ajout_salarie']);
$routes->post('create_salarie', 'Salarie::create', ['as' => 'create_salarie']);

$routes->get('update_salarie-(:num)', 'Salarie::modif/$1', ['as' => 'modif_salarie']);
$routes->post('update_salarie', 'Salarie::update', ['as' => 'update_salarie']);

$routes->post('suppr_salarie', 'Salarie::suppr', ['as' => 'suppr_salarie']);

// routes V2

// routes pour les profils
$routes->get('list_profil', 'Profil::list', ['as' => 'page_profil']);

$routes->get('create_profil', 'Profil::ajout', ['as' => 'ajout_profil']);
$routes->post('create_profil', 'Profil::create', ['as' => 'create_profil']);

// $routes->get('update_profil-(:num)', 'Profil::modif/$1', ['as' => 'modif_profil']);
$routes->post('update_profil', 'Profil::update', ['as' => 'update_profil']);

$routes->post('suppr_profil', 'Profil::suppr', ['as' => 'suppr_profil']);

// routes pour les utilisateur de l'aplication
$routes->get('list_utilisateur', 'Utilisateur::list', ['as' => 'page_utilisateur']);

$routes->get('create_utilisateur', 'Utilisateur::ajout', ['as' => 'create_utilisateur']);
$routes->post('create_utilisateur', 'Utilisateur::create', ['as' => 'create_utilisateur']);

$routes->get('update_utilisateur-(:num)', 'Utilisateur::modif/$1', ['as' => 'update_utilisateur']);
$routes->post('update_utilisateur', 'Utilisateur::update', ['as' => 'update_utilisateur']);

$routes->post('suppr_utilisateur', 'Utilisateur::suppr', ['as' => 'suppr_utilisateur']);

// routes pour les modification mission
$routes->post('ajout_profil_mission', 'Mission::ajoutProfil', ['as' => 'ajout_profil_mission']);
$routes->post('suppr_profil_mission', 'Mission::supprProfil', ['as' => 'suppr_profil_mission']);

// routes pour les modification salarie
$routes->post('ajout_profil_salarie', 'Salarie::ajoutProfil', ['as' => 'ajout_profil_salarie']);
$routes->post('suppr_profil_salarie', 'Salarie::supprProfil', ['as' => 'suppr_profil_salarie']);
// routes page error
// $routes->get('error_message', 'Error::message', ['as'=> 'page_erreur']);
// $routes->post('error_message', 'Error::error', ['as'=> 'error_conexion']);

$routes->get('logout', 'Mission::logout', ['as' => 'logout']);
$routes->get('phpmyadmin', 'Mission::phpmyadmin', ['as' => 'phpmyadmin']);

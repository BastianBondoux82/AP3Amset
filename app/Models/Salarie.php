<?php

namespace App\Models;

use CodeIgniter\Model;

class Salarie extends Model
{
    protected $table            = 'salarie';
    protected $primaryKey       = 'ID_SALARIE';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'NOM',
        'PRENOM',
        'CIVILITE',
        'EMAIL_SALARIE',
        'NUM_TELEPHONE_SALARIE',
        'ADRESSE_SALARIE',
        'CODE_POSTAL_SALARIE',
        'VILLE_SALARIE',
        'PHOTO_SALARIE'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findJoinAll()
    {
        // return $this
        //     ->select('salarie.NOM,
        //     salarie.PRENOM,
        //     salarie.CIVILITE,
        //     salarie.EMAIL_SALARIE,
        //     salarie.NUM_TEL_SALARIE,
        //     salarie.ADRESSE_SALARIE,
        //     salarie.CODE_POSTAL_SALARIE,
        //     salarie.VAILLE_SALARIE,
        //     salarie.PHOTO_SALARIE')
        //     ->join('')
    }



    public function addMission($idSalarie, $isMission)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil_mission');
        $builder->insert([
            'ID_SALARIE' => $idSalarie,
            'ID_MISSION' => $isMission
        ]);
    }

    public function addProfil($idSalarie, $idProfil)
    {
        // var_dump($idProfil);
        // var_dump($idSalarie);
        // die();
        if ($idProfil != null) {
            $db      = \Config\Database::connect();
            $builder = $db->table('salarie_profil');
            $builder->insert([
                'ID_SALARIE' => $idSalarie,
                'ID_PROFIL' => $idProfil
            ]);
        }
    }

    public function getProfil($idSalarie)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('salarie_profil');
        $builder->join('profil', 'profil.ID_PROFIL = salarie_profil.ID_PROFIL');
        $query = $builder->getWhere(['ID_SALARIE' => $idSalarie]);
        return $query->getResultArray();
    }

    public function deleteProfilsSalarie($idSalarie)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('salarie_profil');
        $builder->Where('ID_SALARIE', $idSalarie);
        $builder->delete();
    }

    public function deleteProfilSalarie($idSalarie, $idProfil)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('salarie_profil');
        $builder->Where('ID_SALARIE', $idSalarie);
        $builder->Where('ID_PROFIL', $idProfil);
        $builder->delete();
    }

    public function findSalarie($idMission){
        $db= \Config\Database::connect();
        $builder = $db->table('salarie_mission');
        $builder->join('salarie', 'salarie.ID_SALARIE = salarie_mission.ID_SALARIE');
        $query = $builder->getWhere(['salarie_mission.ID_MISSION' => $idMission]);
        return $query->getResultArray();
    }
}

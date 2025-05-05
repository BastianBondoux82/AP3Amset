<?php

namespace App\Models;

use CodeIgniter\Model;

class Mission extends Model
{
    protected $table            = 'mission';
    protected $primaryKey       = 'ID_MISSION';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'INTITULE_MISSION',
        'ID_CLIENT',
        'DESCRIPTION',
        'DATE_DEBUT',
        'DATE_FIN',
        'STATUS'
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
        return $this
            ->select('mission.ID_MISSION,
        mission.INTITULE_MISSION,
        mission.DESCRIPTION,
        mission.DATE_DEBUT,
        mission.DATE_FIN,
        client.RAISON_SOCIAL as RAISON_SOCIAL,
        client.ID_CLIENT')
            ->join('client', 'client.ID_CLIENT = mission.ID_CLIENT')
            ->findAll();
    }
    public function findJoinAllFalse()
    {
        return $this
            ->select('mission.ID_MISSION,
        mission.INTITULE_MISSION,
        mission.DESCRIPTION,
        mission.DATE_DEBUT,
        mission.DATE_FIN,
        client.RAISON_SOCIAL as RAISON_SOCIAL,
        client.ID_CLIENT')
            ->join('client', 'client.ID_CLIENT = mission.ID_CLIENT')
            ->where('mission.STATUS = "non affect"')
            ->findAll();
    }
    public function findJoinAllTrue()
    {
        return $this
            ->select('mission.ID_MISSION,
        mission.INTITULE_MISSION,
        mission.DESCRIPTION,
        mission.DATE_DEBUT,
        mission.DATE_FIN,
        client.RAISON_SOCIAL as RAISON_SOCIAL,
        client.ID_CLIENT')
            ->join('client', 'client.ID_CLIENT = mission.ID_CLIENT')
            ->where('mission.STATUS = "affect"')
            ->findAll();
    }

    public function addProfil($idMission, $idProfil, $nbr)
    {
        // var_dump($idProfil);
        // var_dump($idProfil['ID_PROFIL']);
        // die();
        if ($idProfil != null) {
            $db      = \Config\Database::connect();
            $builder = $db->table('profil_mission');
            $builder->insert([
                'ID_MISSION' => $idMission,
                'ID_PROFIL' => $idProfil,
                'NOMBRE_SALARIE' => $nbr
            ]);
        }
    }
    public function updateProfil($idMission, $idProfil, $nbr)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil_mission');
        $builder->Where('ID_MISSION', $idMission);
        $builder->Where('ID_PROFIL', $idProfil);
        $builder->update([
            'NOMBRE_SALARIE' => $nbr
        ]);
    }

    public function getProfil($idMission)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil_mission');
        $builder->join('profil', 'profil.ID_PROFIL = profil_mission.ID_PROFIL');
        $query = $builder->getWhere(['ID_MISSION' => $idMission]);
        return $query->getResultArray();
    }

    public function deleteProfilsMission($idMission)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil_mission');
        $builder->Where('ID_MISSION', $idMission);
        $builder->delete();
    }

    public function deleteProfilMission($idMission, $idProfil)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil_mission');
        $builder->Where('ID_MISSION', $idMission);
        $builder->Where('ID_PROFIL', $idProfil);
        $builder->delete();
    }

    public function addSalarie($idSalarie, $idMission)
    {
        $db = \Config\Database::Connect();
        $builder = $db->table('salarie_mission');
        $builder->insert([
            'ID_SALARIE' => $idSalarie,
            'ID_MISSION' => $idMission
        ]);
    }
    
    public function deleteSalarie($idMission)
    {
        $db = \Config\Database::Connect();
        $builder = $db->table('salarie_mission');
        $builder->Where('salarie_mission.ID_MISSION', $idMission);
        $builder->delete();
    }

    public function deleteAll($idClient)
    {
        $db = \Config\Database::Connect();
        $builder = $db->table('mission');
        $builder->Where('mission.ID_CLIENT', $idClient);
        $builder->delete();
    }

    public function findAllMissionByClient($idClient)
    {
        $db = \Config\Database::Connect();
        $builder = $db->table('mission');
        $query = $builder->getWhere(['ID_CLIENT' => $idClient]);
        return $query->getResultArray();
    }
    
    // public function modifValStatus($status, $idMission)
    // {
    //     $db = \Config\Database::Connect();
    //     $builder = $db->table('mission');
    //     $builder->where('mission.ID_MISSION', $idMission);
    //     $builder->insert([
    //         'STATUS' => $status
    //     ]);
    // }

    public function deleteAllSalarieMission($idMission){
        $db = \Config\Database::Connect();
        $builder = $db->table('salarie_mission');
        $builder->Where('salarie_mission.ID_MISSION', $idMission);
        $builder->delete();
    }

    
}

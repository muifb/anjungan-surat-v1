<?php

namespace Pkl\MyApp\Models;

use PDO;
use Pkl\MyApp\Core\Database;

class ProfileModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tb_profile');
        $this->setColumn([
            'id_profile',
            'id_user',
            'nik'
        ]);
    }

    public function getAll()
    {
        return $this->get()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        return $this->get(['id_user' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function getProfile($data)
    {
        $qry = "SELECT * FROM tb_users JOIN tb_profile USING (id_user) JOIN tb_perangkat USING (nik) WHERE tb_users.id_user = ?";
        return $this->qry($qry, [$data['id_user']])->fetch(PDO::FETCH_ASSOC);
    }

    public function getNama($data)
    {
        $qry = "SELECT tb_perangkat.nama FROM tb_users JOIN tb_profile USING (id_user) JOIN tb_perangkat USING (nik) WHERE tb_users.id_user = ?";
        return $this->qry($qry, [$data['id_user']])->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data = array())
    {
        $table = [
            'id_user' => $data['id_user'],
            'nik' => $data['nik']
        ];
        return $this->insertData($table);
    }

    public function destroy($id)
    {
        return $this->deleteData(['id_profile' => $id]);
    }
}

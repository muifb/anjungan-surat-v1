<?php

namespace Pkl\MyApp\Models;

use PDO;
use Pkl\MyApp\Core\Database;

class UserModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tb_users');
        $this->setColumn([
            'id_user',
            'username',
            'password',
            'level'
        ]);
    }

    public function getAll()
    {
        return $this->get()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllProfile()
    {
        $query = "SELECT * FROM tb_users JOIN tb_profile USING (id_user) JOIN tb_perangkat USING (nik)";
        return $this->qry($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($user)
    {
        $qry = "SELECT * FROM tb_users JOIN tb_profile USING (id_user) JOIN tb_perangkat USING (nik) WHERE tb_users.id_user = ?";
        return $this->qry($qry, [$user])->fetch(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        return $this->get(['id_user' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function getByLvl($lvl)
    {
        return $this->get(['level' => $lvl])->fetch(PDO::FETCH_ASSOC);
    }

    public function prosesLogin($data)
    {
        return $this->get(['username' => $data['username']])->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data = array())
    {
        $options = [
            'cost' => 10,
        ];
        $password_hash = password_hash($data['password'], PASSWORD_DEFAULT, $options);
        $table = [
            'username' => $data['username'],
            'password' => $password_hash,
            'level' => $data['level']
        ];
        return $this->insertData($table);
    }

    public function destroy($id)
    {
        return $this->deleteData(['id_user' => $id]);
    }
}

<?php

namespace Pkl\MyApp\Models;

use PDO;
use Pkl\MyApp\Core\Database;

class PerangkatModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tb_perangkat');
        $this->setColumn([
            'nik',
            'nama',
            'jk',
            'no_hp',
            'jabatan',
            'alamat'
        ]);
    }

    public function getAll()
    {
        return $this->get()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByNik($nik)
    {
        return $this->get(['nik' => $nik])->fetch(PDO::FETCH_ASSOC);
    }

    public function getByJabatan($jabatan)
    {
        return $this->get(['jabatan' => $jabatan])->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $table = [
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'jk' => $data['jenis'],
            'no_hp' => $data['telp'],
            'jabatan' => $data['jabatan'],
            'alamat' => $data['alamat']
        ];
        return $this->create($table);
    }
}

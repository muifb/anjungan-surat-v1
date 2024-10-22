<?php

namespace Pkl\MyApp\Models;

use PDO;
use Pkl\MyApp\Core\Database;

class WargaModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tb_warga');
        $this->setColumn([
            'nik',
            'nama',
            'tgl_lahir',
            'jk',
            'kwa',
            'agama',
            'pekerjaan',
            'status',
            'alamat',
            'rt',
            'rw'
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

    public function insert($data)
    {
        $table = [
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'tgl_lahir' => $data['tanggal'],
            'jk' => $data['jenis'],
            'kwa' => $data['warga'],
            'agama' => $data['agama'],
            'pekerjaan' => $data['pekerjaan'],
            'status' => $data['status'],
            'alamat' => $data['alamat'],
            'rt' => $data['rt'],
            'rw' => $data['rw']
        ];
        return $this->create($table);
    }
}

<?php

namespace Pkl\MyApp\Models;

use PDO;
use Pkl\MyApp\Core\Database;

class SuratModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tb_surat');
        $this->setColumn([
            'id_surat',
            'nik',
            'jenis_surat',
            'keterangan',
            'tgl_cetak'
        ]);
    }

    public function getAll()
    {
        $query = "SELECT * FROM tb_surat JOIN tb_warga USING (nik) ORDER BY tb_surat.tgl_cetak DESC";
        return $this->qry($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $table = [
            'nik' => $data['nik'],
            'jenis_surat' => $data['jenis_surat'],
            'keterangan' => $data['keterangan'],
            'tgl_cetak' => $tanggal
        ];
        return $this->insertData($table);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM tb_surat JOIN tb_warga USING (nik) WHERE tb_surat.id_surat = ?";
        return $this->qry($query, [$id])->fetch(PDO::FETCH_ASSOC);
        // return $this->get(['id_surat' => $id])->fetch(PDO::FETCH_ASSOC);
    }
}

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
            'no_surat',
            'keterangan',
            'tgl_cetak',
            'id_user'
        ]);
    }

    public function getAll()
    {
        $query = "SELECT 
                        id_surat,
                        tb_surat.nik AS nik,
                        tb_warga.nama AS nama,
                        tb_warga.jk,
                        jenis_surat,
                        no_surat,
                        keterangan,
                        tgl_cetak,
                        tb_surat.id_user,
                        tb_perangkat.nik AS nip,
                        tb_perangkat.nama AS nm_perangkat,
                        jabatan
                  FROM tb_surat JOIN tb_warga USING (nik) JOIN tb_users USING (id_user) LEFT JOIN tb_profile ON tb_users.id_user=tb_profile.id_user
                  LEFT JOIN tb_perangkat ON tb_profile.nik=tb_perangkat.nik ORDER BY tb_surat.tgl_cetak DESC";
        // $query = "SELECT 
        // id_surat,
        // nik,
        // jenis_surat,
        // keterangan,
        // tgl_cetak,
        // id_user
        // FROM tb_surat JOIN tb_warga USING (nik) JOIN tb_users USING (id_user) ORDER BY tb_surat.tgl_cetak DESC";
        return $this->qry($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $table = [
            'nik' => $data['nik'],
            'jenis_surat' => $data['jenis_surat'],
            'no_surat' => $data['no_surat'],
            'keterangan' => $data['keterangan'],
            'tgl_cetak' => $tanggal,
            'id_user' => $_SESSION['login']['id_user']
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

<?php

namespace Pkl\MyApp\Controllers;

use Pkl\MyApp\Core\Message;
use Pkl\MyApp\Core\Controller;
use Pkl\MyApp\Models\SuratModel;
use Pkl\MyApp\Models\ProfileModel;
use Pkl\MyApp\Models\PerangkatModel;

class SuratController extends Controller
{
    public function __construct()
    {
        // 
    }

    public function index($surat)
    {
        if ($_SESSION['login']['akses'] == 'Administrator') {
            $d = [
                'title' => 'Domisili',
                'nama' => ['nama' => 'Administrator']
            ];
        } else {
            $d = [
                'title' => 'Domisili',
                'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
            ];
        }

        if ($surat == 'domisili') {
            $data = [
                'surat' => 'Domisili',
                'srt' => 'DMS'
            ];
        } elseif ($surat == 'izin') {
            $data = [
                'surat' => 'Izin Tidak Kerja',
                'srt' => 'ITK'
            ];
        } elseif ($surat == 'sktm') {
            $data = [
                'surat' => 'Tidak Mampu',
                'srt' => 'TM'
            ];
        } else {
            $data = [
                'surat' => 'Usaha',
                'srt' => 'USH'
            ];
        }

        $this->view('template/template-header', $d);
        $this->view('suket/surat', $data);
        $this->view('template/template-footer');
    }

    public function insertSurat()
    {
        $nomor = $_POST['srt'] . ' / ' . $_POST['srt1'] . ' / ' . $_POST['srt2'];
        $_POST['no_surat'] .= $nomor;
        $fields = [
            'nik' => 'string | required',
            'jenis_surat' => 'string | required',
            'no_surat' => 'string | required',
            'keterangan' => 'string | required',
        ];
        $message = [
            'nik' => [
                'required' => 'NIK harus diisi!',
            ],
            'keterangan' => [
                'required' => 'Keterangan harus diisi!',
            ]
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
            $this->redirect('domisili');
        }

        $proc = $this->model(SuratModel::class)->insert($inputs);
        if ($proc) {
            $data = [
                'nama' => $_POST['nama'],
                'nik' => $_POST['nik']
            ];
            $this->redirect('form-surat/cetak-surat/' . $proc);
        }
    }

    public function cetakSurat($id)
    {
        $result = $this->model(SuratModel::class)->getById($id);
        $qry = $this->model(PerangkatModel::class)->getByJabatan("Kepala Desa");
        if ($qry) {
            $rows = [
                'data' => $result,
                'dt' => $qry,
                'paragraf' => '',
                'kembali' => ''
            ];
        } else {
            $rows = [
                'data' => $result,
                'dt' => [
                    'nik' => '',
                    'nama' => '',
                    'jk' => '',
                    'no_hp' => '',
                    'jabatan' => '',
                    'alamat' => '',
                ],
                'paragraf' => '',
                'kembali' => ''
            ];
        }
        if ($result['jenis_surat'] == "Domisili") {
            $rows['paragraf'] .= 'Dengan ini menerangkan dengan sebenarnya bahwa yang bersangkutan berdomisili di Desa Bakalankrapyak.';
            $rows['kembali'] .= 'domisili';
        } elseif ($result['jenis_surat'] == "Tidak Mampu") {
            $rows['paragraf'] .= 'Dengan ini menerangkan benar nama tersebut adalah benar warga Desa Bakalankrapyak. Berdasarkan keterangan yang ada pada kami benar bahwa yang bersangkutan tergolong keluarga yang tidak mampu.';
            $rows['kembali'] .= 'sktm';
        } elseif ($result['jenis_surat'] == "Izin Tidak Kerja") {
            $rows['paragraf'] .= 'Dengan ini menerangkan dengan sebenarnya bahwa yang bersangkutan adalah warga kami Desa Bakalankrapyak.';
            $rows['kembali'] .= 'izin';
        } else {
            $rows['paragraf'] .= 'Dengan ini menerangkan dengan sebenarnya bahwa yang bersangkutan warga Desa Bakalankrapyak dan betul memiliki usaha.';
            $rows['kembali'] .= 'usaha';
        }

        if ($_SESSION['login']['akses'] == 'Administrator') {
            $data = [
                'title' => 'Cetak',
                'nama' => ['nama' => 'Administrator']
            ];
        } else {
            $data = [
                'title' => 'Cetak',
                'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
            ];
        }
        $this->view('template/template-header', $data);
        $this->view('suket/cetak/cetak', $rows);
        $this->view('template/template-footer');
    }
}

<?php

namespace Pkl\MyApp\Controllers;

use Pkl\MyApp\Core\Message;
use Pkl\MyApp\Core\Controller;
use Pkl\MyApp\Models\WargaModel;
use Pkl\MyApp\Models\ProfileModel;

class WargaController extends Controller
{
    public function __construct()
    {
        // 
    }

    public function storeWarga()
    {
        if ($_SESSION['login']['akses'] == 'Administrator') {
            $d = [
                'title' => 'Data Warga',
                'nama' => ['nama' => 'Administrator']
            ];
        } else {
            $d = [
                'title' => 'Data Warga',
                'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
            ];
        }

        $data = [
            'data' => $this->model(WargaModel::class)->getAll()
        ];

        $this->view('template/template-header', $d);
        $this->view('pages/warga', $data);
        $this->view('template/template-footer');
    }

    public function createWarga()
    {
        if ($_SESSION['login']['akses'] == 'Administrator') {
            $d = [
                'title' => 'Add Data Warga',
                'nama' => ['nama' => 'Administrator']
            ];
        } else {
            $d = [
                'title' => 'Add Data Warga',
                'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
            ];
        }

        $data = [
            'jkel' => [
                'Laki-Laki',
                'Perempuan'
            ],
            'kwar' => [
                'WNI',
                'WNA'
            ],
            'agm' => [
                'Islam',
                'Kristen',
                'Protestan',
                'Katolik',
                'Hindu',
                'Buddha',
                'Konghucu'
            ],
            'sts' => [
                'Belum Kawin',
                'Kawin'
            ],
            'no' => 9,
            'data' => $this->model(WargaModel::class)->getAll()
        ];

        $this->view('template/template-header', $d);
        $this->view('pages/add-warga', $data);
        $this->view('template/template-footer');
    }

    public function addWarga()
    {
        $fields = [
            'nik' => 'string | required | numeric | min:16 | max:16',
            'nama' => 'string | required',
            'tanggal' => 'string | required',
            'jenis' => 'string | required',
            'warga' => 'string | required',
            'agama' => 'string | required',
            'pekerjaan' => 'string | required',
            'status' => 'string | required',
            'alamat' => 'string | required',
            'rt' => 'int | required',
            'rw' => 'int | required'
        ];
        $message = [
            'nik' => [
                'required' => 'NIK harus diisi!',
                'numeric' => 'NIK harus diisi angka',
                'min' => 'NIK harus 16 karakter',
                'max' => 'NIK harus 16 karakter',
                'unique' => 'Data NIK Sudah Ada!'
            ],
            'nama' => ['required' => 'Nama harus diisi!'],
            'tanggal' => ['required' => 'Tanggal Lahir harus diisi!'],
            'jenis' => ['required' => 'Jenis Kelamin harus diisi!'],
            'warga' => ['required' => 'Kwarganegaraan harus diisi!'],
            'agama' => ['required' => 'Agama harus diisi!'],
            'pekerjaan' => ['required' => 'Pekerjaan harus diisi!'],
            'status' => ['required' => 'Status Perkawinan harus diisi!'],
            'alamat' => ['required' => 'Desa harus diisi!'],
            'rt' => ['required' => 'RT harus diisi!'],
            'rw' => ['required' => 'RW harus diisi!']
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($inputs['tanggal'] == "") {
            $inputs['tanggal'] = "0000-00-00";
        }

        if ($errors) {
            Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
            $this->redirect('data-warga/tambah');
        }

        $fields['nik'] .= '| string | unique:tb_warga,nik';

        [$inputs, $errors] = $this->filter($_POST, $fields, $message);
        if ($errors) {
            Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
            $this->redirect('data-warga/tambah');
        }

        $proc = $this->model(WargaModel::class)->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Berhasil !', 'Data Warga berhasil ditambahkan');
            $this->redirect('data-warga/tambah');
        }
    }
}

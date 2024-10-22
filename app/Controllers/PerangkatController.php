<?php

namespace Pkl\MyApp\Controllers;

use Pkl\MyApp\Core\Message;
use Pkl\MyApp\Core\Controller;
use Pkl\MyApp\Models\ProfileModel;
use Pkl\MyApp\Models\PerangkatModel;

class PerangkatController extends Controller
{
    public function __construct()
    {
        // 
    }

    public function storePerangkat()
    {
        if ($_SESSION['login']['akses'] == 'Administrator') {
            $d = [
                'title' => 'Data Perangkat',
                'nama' => ['nama' => 'Administrator']
            ];
        } else {
            $d = [
                'title' => 'Data Perangkat',
                'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
            ];
        }

        $data = [
            'data' => $this->model(PerangkatModel::class)->getAll()
        ];

        $this->view('template/template-header', $d);
        $this->view('pages/perangkat', $data);
        $this->view('template/template-footer');
    }

    public function createPerangkat()
    {
        if ($_SESSION['login']['akses'] == 'Administrator') {
            $d = [
                'title' => 'Add Data Perangkat',
                'nama' => ['nama' => 'Administrator']
            ];
        } else {
            $d = [
                'title' => 'Add Data Perangkat',
                'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
            ];
        }

        $data = [
            'title' => 'Add Data Perangkat',
            'jk' => [
                'Laki-Laki',
                'Perempuan'
            ],
            'perangkat' => []
        ];
        $qry = $this->model(PerangkatModel::class)->getByJabatan("Kepala Desa");
        if ($qry) {
            array_push($data['perangkat'], 'Sekretaris', 'Kaur Tatausaha dan Umum', 'Kaur Keuangan', 'Kaur Perencanaan', 'Kasi Pemerintahan', 'Kasi Kesejahteraan', 'Kasi Pelayanan', 'Kadus 1', 'Kadus 2', 'Kadus 3', 'Kadus 4', 'Kadus 5');
        } else {
            array_push($data['perangkat'], 'Kepala Desa', 'Sekretaris', 'Kaur Tatausaha dan Umum', 'Kaur Keuangan', 'Kaur Perencanaan', 'Kasi Pemerintahan', 'Kasi Kesejahteraan', 'Kasi Pelayanan', 'Kadus 1', 'Kadus 2', 'Kadus 3', 'Kadus 4', 'Kadus 5');
        }

        $this->view('template/template-header', $d);
        $this->view('pages/add-perangkat', $data);
        $this->view('template/template-footer');
    }

    public function addPerangkat()
    {
        $fields = [
            'nik' => 'string | required | numeric | min:16 | max:16',
            'nama' => 'string | required',
            'jenis' => 'string | required',
            'telp' => 'string | required | numeric',
            'jabatan' => 'string | required',
            'alamat' => 'string | required',
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
            'jenis' => ['required' => 'Jenis Kelamin harus diisi!'],
            'telp' => [
                'required' => 'Nomor Telepon harus diisi!',
                'numeric' => 'Nomor Telepon harus diisi angka'
            ],
            'jabatan' => ['required' => 'Jabatan harus diisi!'],
            'alamat' => ['required' => 'Desa harus diisi!']
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
            $this->redirect('data-perangkat/tambah');
        }

        $fields['nik'] .= '| string | unique:tb_perangkat,nik';

        [$inputs, $errors] = $this->filter($_POST, $fields, $message);
        if ($errors) {
            Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
            $this->redirect('data-perangkat/tambah');
        }

        $proc = $this->model(PerangkatModel::class)->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Berhasil !', 'Data Warga berhasil ditambahkan');
            $this->redirect('data-perangkat/tambah');
        }
    }
}

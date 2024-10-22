<?php

namespace Pkl\MyApp\Controllers;

use Pkl\MyApp\Core\Message;
use Pkl\MyApp\Core\Controller;
use Pkl\MyApp\Models\UserModel;
use Pkl\MyApp\Models\ProfileModel;
use Pkl\MyApp\Models\PerangkatModel;

class UserController extends Controller
{
    public function __construct()
    {
        // 
    }

    public function storeUser()
    {
        if ($_SESSION['login']['akses'] == 'Administrator') {
            $d = [
                'title' => 'Data User',
                'nama' => ['nama' => 'Administrator']
            ];
        } else {
            $d = [
                'title' => 'Data User',
                'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
            ];
        }

        $data = [
            'level' => [],
            'data' => $this->model(UserModel::class)->getAllProfile(),
            'perangkat' => $this->model(PerangkatModel::class)->getAll()
        ];

        $level = $this->model(UserModel::class)->getByLvl("Kepala Desa");
        if ($level) {
            array_push($data['level'], 'Petugas');
        } else {
            array_push($data['level'], 'Kepala Desa', 'Petugas');
        }

        $this->view('template/template-header', $d);
        $this->view('pages/user', $data);
        $this->view('template/template-footer');
    }

    public function addUser()
    {
        $fields = [
            'nik' => 'string | required | numeric | min:16 | max:16 | unique:tb_profile,nik',
            'level' => 'string | required',
            'username' => 'string | required | min:5 | trim | unique:tb_users,username',
            'password' => 'string | required'
        ];
        $message = [
            'nik' => [
                'required' => 'NIK harus diisi!',
                'numeric' => 'NIK harus diisi angka',
                'min' => 'NIK harus 16 karakter',
                'max' => 'NIK harus 16 karakter',
                'unique' => 'Nama User Sudah mempunyai akun!'
            ],
            'level' => ['required' => 'Level harus diisi!'],
            'username' => [
                'required' => 'Username harus diisi!',
                'min' => 'Username minimal 5 karakter',
                'trim' => 'Username tidak boleh ada spasi!',
                'unique' => 'Username Sudah Ada!'
            ],
            'password' => ['required' => 'Password harus diisi!']
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
            $this->redirect('data-user');
        }

        $proc = $this->model(UserModel::class)->create($inputs);
        if ($proc) {
            $dataInput = [
                'id_user' => $proc,
                'nik' => $inputs['nik']
            ];
            $inputProfile = $this->model(ProfileModel::class)->create($dataInput);
            if ($inputProfile) {
                Message::setFlash('success', 'Berhasil !', 'Data Warga berhasil ditambahkan');
                $this->redirect('data-user');
            }
        }
    }

    public function destroy($data)
    {
        $data = $this->model(UserModel::class)->getUserById($data);
        if ($data) {
            $delUser = $this->model(UserModel::class)->destroy($data['id_user']);
            $delProfile = $this->model(ProfileModel::class)->destroy($data['id_profile']);
            if ($delUser && $delProfile) {
                Message::setFlash('success', 'Berhasil !', 'Data User berhasil dihapus');
                $this->redirect('data-user');
            }
            Message::setFlash('error', 'Gagal !', 'Data User gagal dihapus');
            $this->redirect('data-user');
        }
        Message::setFlash('error', 'Gagal !', 'Data User gagal dihapus');
        $this->redirect('data-user');
    }
}

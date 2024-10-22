<?php

namespace Pkl\MyApp\Controllers;

use Pkl\MyApp\Core\Controller;
use Pkl\MyApp\Models\ProfileModel;
use Pkl\MyApp\Models\WargaModel;
use Signin;

class DefaultApp extends Controller
{

  public function __construct()
  {
    //
  }

  public function index()
  {
    if ($_SESSION['login']['akses'] == 'Administrator') {
      $data = [
        'title' => 'Home',
        'nama' => ['nama' => 'Administrator']
      ];
    } else {
      $data = [
        'title' => 'Home',
        'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
      ];
    }
    $this->view('template/template-header', $data);
    $this->view('home/index', $data);
    $this->view('template/template-footer');
  }

  public function profile()
  {
    if ($_SESSION['login']['akses'] == 'Administrator') {
      $d = [
        'title' => 'Profile',
        'nama' => ['nama' => 'Administrator']
      ];
    } else {
      $d = [
        'title' => 'Profile',
        'nama' => $this->model(ProfileModel::class)->getNama($_SESSION['login'])
      ];
    }

    $data = [
      'data' => []
    ];

    if ($_SESSION['login']['akses'] == 'Administrator') {
      $data['data'] += [
        'nik' => 'Administrator',
        'Id_user' => $_SESSION['login']['id_user'],
        'username' => $_SESSION['login']['username'],
        'password' => 'Administrator',
        'level' => $_SESSION['login']['akses'],
        'id_profile' => 'Administrator',
        'nama' => 'Administrator',
        'jk' => 'Administrator',
        'no_hp' => 'Administrator',
        'jabatan' => 'Administrator',
        'alamat' => 'Administrator',
      ];
    } else {
      $data['data'] += $this->model(ProfileModel::class)->getProfile($_SESSION['login']);
    }

    $this->view('template/template-header', $d);
    $this->view('pages/profile', $data);
    $this->view('template/template-footer');
  }

  public function getData()
  {
    $data = $this->model(WargaModel::class)->getByNik($_POST['id']);
    echo json_encode($data);
  }
}

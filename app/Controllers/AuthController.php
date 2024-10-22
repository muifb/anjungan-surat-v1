<?php

namespace Pkl\MyApp\Controllers;

use Signin;
use Pkl\MyApp\Core\Message;
use Pkl\MyApp\Core\Controller;
use Pkl\MyApp\Models\UserModel;

class AuthController extends Controller
{
    public function __construct()
    {
        // 
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        $this->view('home/login', $data);
    }

    public function login()
    {
        if (!empty($_POST)) {
            $password = $_POST['password'];
            $data = $this->model(UserModel::class)->prosesLogin($_POST);
            if (!empty($data)) {
                $id = $data['id_user'];
                $user = $data['username'];
                $pass = $data['password'];
                $lvl = $data['level'];
                if ($user == $_POST['username'] && password_verify($password, $pass)) {
                    Signin::setLogin($id, $user, $lvl);
                    $this->redirect('');
                } else {
                    Message::setFlash('error', 'Gagal !', 'Username atau Password salah!');
                    $this->redirect('login');
                }
            }
            Message::setFlash('error', 'Gagal !', 'Username atau Password salah!');
            $this->redirect('login');
        } else {
            Message::setFlash('error', 'Gagal !', 'Username atau Password tidak boleh kosong!');
            $this->redirect('login');
        }
    }

    public function logout()
    {
        Signin::logout();
        $this->redirect('login');
    }
}

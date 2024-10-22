<?php

class Signin
{

    public static function setLogin($id, $username, $akses)
    {
        $_SESSION['login'] = [
            'id_user' => $id,
            'username' => $username,
            'akses' => $akses
        ];
    }

    public static function login()
    {
        if (isset($_SESSION['login'])) {
            header('Location: ' . APPURL);
            exit;
        }
    }

    public static function isLogin()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . APPURL . '/login');
            exit;
        }
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
    }
}

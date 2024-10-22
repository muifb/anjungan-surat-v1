<?php

namespace Pkl\MyApp\Middleware;

use Signin;

class PetugasMiddleware implements Middleware
{
    function before(): void
    {
        Signin::isLogin();
        if (($_SESSION['login']['akses'] == 'Administrator') || ($_SESSION['login']['akses'] == 'Petugas')) {
            return;
        }
        header('Location: ' . APPURL . '/laporan');
        exit();
    }
}

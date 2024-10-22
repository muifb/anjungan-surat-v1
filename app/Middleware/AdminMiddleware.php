<?php

namespace Pkl\MyApp\Middleware;

use Signin;

class AdminMiddleware implements Middleware
{
    function before(): void
    {
        Signin::isLogin();
        if ($_SESSION['login']['akses'] !== 'Administrator') {
            header('Location: ' . APPURL);
            exit();
        }
    }
}

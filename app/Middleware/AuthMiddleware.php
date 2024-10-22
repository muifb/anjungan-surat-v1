<?php

namespace Pkl\MyApp\Middleware;

use Signin;

class AuthMiddleware implements Middleware
{

    function before(): void
    {
        Signin::isLogin();
    }
}

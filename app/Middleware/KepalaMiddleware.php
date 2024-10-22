<?php

namespace Pkl\MyApp\Middleware;

use Signin;

class KepalaMiddleware implements Middleware
{
    function before(): void
    {
        Signin::isLogin();
    }
}

<?php

namespace Pkl\MyApp\Middleware;

use Signin;

class SigninMiddleware implements Middleware
{
    function before(): void
    {
        Signin::login();
    }
}

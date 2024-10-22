<?php

use Pkl\MyApp\Core\Web;

if (!session_id())
    session_start();

require_once __DIR__ . '/../app/init.php';

$app = new Web;

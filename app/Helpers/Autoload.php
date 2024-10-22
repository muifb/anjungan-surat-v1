<?php

function load_helper($class_name)
{
    $path_to_file = '../app/helpers/' . $class_name . '.php';
    if (file_exists($path_to_file)) {
        require_once($path_to_file);
    }
}

spl_autoload_register('load_helper');

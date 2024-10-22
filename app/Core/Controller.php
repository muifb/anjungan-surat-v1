<?php

namespace Pkl\MyApp\Core;

class Controller extends Filter
{

    // public static function view(string $view, $model)
    // {
    //     require __DIR__ . '/../View/' . $view . '.php';
    // }

    public function view($view, $data = [])
    {
        if (count($data)) {
            extract($data);
        }
        require_once __DIR__ . '/../Views/' . $view . '.php';
    }

    public function redirect($url)
    {
        header('Location: ' . APPURL . '/' . $url);
        exit;
    }

    public function model($model)
    {
        // require_once '../src/models/' . $model . '.php';
        return new $model();
    }
}

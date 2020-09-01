<?php

namespace Core;

class Controller
{
    public function secondController() {

    }
    public function view($view, $data = [])
    {
        $path = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($path)) {//наличие
            ob_start();//кеш
            extract($data);//массив парсинг
            require $path;
            echo ob_get_clean();//вывод


        }
    }
}
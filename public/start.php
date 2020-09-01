<?php
require_once __DIR__.'/../'.'vendor/autoload.php';

require __DIR__.'/../views/start/index.html';
use Controllers\SecondController;


if(isset($_GET['url'])) {
    echo '<br>';


    $sc = new SecondController;
    $sc->index();
}

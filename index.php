<?php
declare(strict_types=1);
namespace App;

require_once("src/Controller.php");



$request = [
    'post' => $_POST,    
];

(new Controller($request))->run();
<?php

declare(strict_types=1);
namespace App;

class View
{
    public function render(string $page, array $params = null, array $passwordsArray = null) : void
    {        
        include_once("templates/layout.php");
    }
}
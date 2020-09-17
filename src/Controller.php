<?php

declare(strict_types=1);
namespace App;
require_once("View.php");

class Controller 
{
    private View $view;
    private array $request; 

    function __construct(array $request)
    {
        //$_GET and $_POST from index.php
        $this->request = $request;       
        $this->view = new View();        
    }


    //main function - passing a parameter to layout
    public function run() : void
    {
        $viewParams = $this->checkRequest();
        $page = $viewParams['page'];
        //passing parameters to View
        $this->view->render($page, $viewParams);
    }

    
    private function checkRequest() : array 
    {
        $params = [];

        if(isset($this->request['post']['noChar'])) {
            $params['page'] = "resultPage";
        } else {
            $params['page'] = "formPage";
        }
        return $params;

    }

}
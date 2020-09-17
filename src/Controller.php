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
        $viewParams = $this->dataValidation();
        $page = $viewParams['page'];
        //passing parameters to View
        $this->view->render($page, $viewParams);
    }

    //noPass, noChar, 
    //passStruc_LL = lowLetters, passStruc_UL = upLEtters
    //passStruc_DG = digits, passStruc_SC = specChar

    
    private function dataValidation() : array 
    {        
        $params = [];
        
        if(isset($this->request['post']['submit'])) {
            
            if(!preg_match('/^[1-9][0-9]{0,2}$/', $this->request['post']['noPass'])) {
                $params['page'] = "formPage";
                $params['info'] = "Nieprawidłowa wartość dla liczby haseł! <BR>(1-999)";
                $params['noPass'] = $this->request['post']['noPass'];
                $params['noChar'] = $this->request['post']['noChar'];

                if(isset($this->request['post']['passStruc_LL'])) {
                    $params['passStruc_LL'] = $this->request['post']['passStruc_LL'];
                }
                if(isset($this->request['post']['passStruc_UL'])) {
                    $params['passStruc_UL'] = $this->request['post']['passStruc_UL'];
                }
                if(isset($this->request['post']['passStruc_DG'])) {
                    $params['passStruc_DG'] = $this->request['post']['passStruc_DG'];
                }
                if(isset($this->request['post']['passStruc_SC'])) {
                    $params['passStruc_SC'] = $this->request['post']['passStruc_SC']; 
                }                               
            } elseif(!preg_match('/^[1-9][0-9]{0,1}$/', $this->request['post']['noChar'])) {
                $params['page'] = "formPage";
                $params['info'] = "Nieprawidłowa wartość dla liczby zanków! <BR>(1-99)";            
                $params['noPass'] = $this->request['post']['noPass'];
                $params['noChar'] = $this->request['post']['noChar'];

                if(isset($this->request['post']['passStruc_LL'])) {
                    $params['passStruc_LL'] = $this->request['post']['passStruc_LL'];
                }
                if(isset($this->request['post']['passStruc_UL'])) {
                    $params['passStruc_UL'] = $this->request['post']['passStruc_UL'];
                }
                if(isset($this->request['post']['passStruc_DG'])) {
                    $params['passStruc_DG'] = $this->request['post']['passStruc_DG'];
                }
                if(isset($this->request['post']['passStruc_SC'])) {
                    $params['passStruc_SC'] = $this->request['post']['passStruc_SC']; 
                }                               
            }  else if(!isset($this->request['post']['passStruc_LL']) && !isset($this->request['post']['passStruc_UL']) && !isset($this->request['post']['passStruc_DG']) && !isset($this->request['post']['passStruc_SC'])) {
                $params['page'] = "formPage";
                $params['info'] = "Musisz zaznaczyć choć jeden checkBox";
                $params['noPass'] = $this->request['post']['noPass'];
                $params['noChar'] = $this->request['post']['noChar'];
            } else {
                $params['page'] = "resultPage";
            }
        } else {
            $params['page'] = "formPage";
        }
        return $params;
    }






}
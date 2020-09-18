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
        $passwordsArray = [];
        $dataParams = $this->dataValidation();
        //validation ok
        if( $dataParams['page'] === "resultPage") {
            $page = $dataParams['page'];           
            $passwordsArray = $this->generatePassword($dataParams);
        //invalid validation
        } else {
            $page = $dataParams['page'];
        }

        $page = $dataParams['page'];
        //passing parameters to View
        $this->view->render($page, $dataParams, $passwordsArray);
    }    

    //password generation
    public function generatePassword(array $dataArray) : array 
    {
        $pass = [];
        $arrayActiveGroups =[];
        $activeLL = False;
        $activeUL = False;
        $activeDG = False;
        $activeSC = False;
        //creating array 'arrayActiveGroups' with active groups to random
        //set active groups
        if(isset($dataArray['passStruc_LL'])) {
            $activeLL = TRUE; 
            $arrayActiveGroups[] = 'randomLL';          
        }
        if(isset($dataArray['passStruc_UL'])) {
            $activeUL = TRUE;
            $arrayActiveGroups[] = 'randomUL';          
        }
        if(isset($dataArray['passStruc_DG'])) {
            $activeDG = TRUE;
            $arrayActiveGroups[] = 'randomDG';           
        }
        if(isset($dataArray['passStruc_SC'])) {
            $activeSC = TRUE; 
            $arrayActiveGroups[] = 'randomSC';         
        }        
        
        //groups are active and we can choose randomly from them
        $arrayGroups = $arrayActiveGroups;                  
        //variable: number of groups' members, needed to determine 
        //the function check all characters groups are used 
        $noGroups = count($arrayActiveGroups);;
        //number of generated passwords
        for ($j=0; $j < $dataArray['noPass'] ; $j++) {
            //variable holding characters
            $passGen = "";
            //number of characters from a given group
            //we assum that they are to from each group  
            $passLL = 0; $passUL = 0; $passDG = 0; $passSC = 0;
            //for - number of characters generated in the password        
            for ($i=0; $i < $dataArray['noChar'] ; $i++) {            
                //at the end of the generation we check if there are all types of characters
                //if not we create a temporary array with missing character groups
                if (($i >= $dataArray['noChar'] - $noGroups) && 
                    (($passLL == 0 && $activeLL == TRUE) || 
                    ($passUL == 0 && $activeUL == TRUE) || 
                    ($passDG == 0 && $activeDG == TRUE) || 
                    ($passSC == 0 && $activeSC == TRUE))) {                   
                    if($passLL == 0 && $activeLL == TRUE) {
                        $tempArray[] = 'randomLL';
                    }
                    if($passUL == 0 && $activeUL == TRUE) {
                        $tempArray[] = 'randomUL';
                    }
                    if($passDG == 0 && $activeDG == TRUE) {
                        $tempArray[] = 'randomDG';
                    }
                    if($passSC == 0 && $activeSC == TRUE) {
                        $tempArray[] = 'randomSC';
                    }
                    $charsGroup = $tempArray[rand(0, count($tempArray) - 1)];
                                  
                    unset($tempArray);
                //Group selection while selecting initial characters of the password
                } else {                     
                    $charsGroup = $arrayGroups[rand(0, $noGroups - 1)];                    
                }
                
                //random selection of characters from a given group
                if($charsGroup == 'randomLL') {
                    //selection of characters and assigning them to an array
                    $passGen .= $this->randomLL();
                    //to check if a character from this group has already been selected
                    $passLL++;
                    continue;
                }
                if($charsGroup == 'randomUL') {
                    $passGen .= $this->randomUL();
                    $passUL++;
                    continue;
                }
                if($charsGroup == 'randomDG') {
                    $passGen .= $this->randomDG();
                    $passDG++;
                    continue;
                }
                if($charsGroup == 'randomSC') {
                    $passGen .= $this->randomSC();
                    $passSC++;
                    continue;
                }
            }

            $passwords[$j] = $passGen;
            unset($passGen);
        }       
        return $passwords;
    }


    //random function
    private function randomLL() : string 
    {
        //define groups of characters 
        $lowerCase = 'abcdefghijklmnoprstuwxyz';
        //lenght of groups - needed to determine max for rand function 
        $lenghtLC = strlen($lowerCase);
        //generating characters
        $sign = $lowerCase[rand(0,$lenghtLC - 1)];
        return $sign;
    }

    private function randomUL() : string 
    {
        $blockLetter = 'ABCDEFGHIJKLMNOPRSTUWXYZ';
        $lenghtBL = strlen($blockLetter);
        $sign = $blockLetter[rand(0,$lenghtBL - 1)];
        return $sign;
    }

    private function randomDG() : string 
    {
        $digits = '0123456789';
        $lenghtD = strlen($digits);
        $sign = $digits[rand(0,$lenghtD - 1)];
        return $sign;
    }

    private function randomSC() : string 
    {
        $specialCharacters = '!@#$%&?';
        $lenghtSC = strlen($specialCharacters);
        $sign = $specialCharacters[rand(0,$lenghtSC - 1)];
        return $sign;
    }


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
            }  elseif(!isset($this->request['post']['passStruc_LL']) && !isset($this->request['post']['passStruc_UL']) && !isset($this->request['post']['passStruc_DG']) && !isset($this->request['post']['passStruc_SC'])) {
                $params['page'] = "formPage";
                $params['info'] = "Musisz zaznaczyć choć jeden checkBox";
                $params['noPass'] = $this->request['post']['noPass'];
                $params['noChar'] = $this->request['post']['noChar'];
            } else {
                $params['page'] = "resultPage";
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
            }
        } else {
            $params['page'] = "formPage";
        }
        return $params;
    }


}
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../models/Palindroom.php';
if (!empty($_POST)){
    if (checkPostArguments()){
        $woord = $_POST["naam"];
        if(strlen($woord)> 1){
            $palindroom = new Palindroom();
            $palindroom->flipText($woord);

            if ($palindroom->heeftFlippedTextEenBetekenis()){
                $viewData = array(
                    "palindroom" => $palindroom->getFlippedText(),
                    "message" => "heeft een betekenis",
                    "actie" => "Vul nog een woord of sluit de browser"
                );
            }
            else{
                $viewData = array(
                    "palindroom" => $palindroom->getFlippedText(),
                    "message" => "heeft geen betekenis",
                    "actie" => "Vul nog een woord of sluit de browser"
                );
            }
        }
        else{
            $viewData = array(
                "palindroom" => "",
                "message" => "U heeft geen woord ingevuld",
                "actie" => "Vul een woord in of sluit de browser"
            );
        }
        include_once '../views/View.php';
    }else{
        http_response_code(400);      
    }
}
else{
    http_response_code(400);
}

function checkPostArguments(){
    $validArguments = array("naam", "submit");
    $aantalArgumentenInPost = sizeOf($validArguments);
    
    if(sizeof($_POST) == $aantalArgumentenInPost ){
        for ($index =0 ; $index < $aantalArgumentenInPost ; $index++){
            if(!isset($_POST[$validArguments[$index]])){
                return FALSE;
            }
        }
        return TRUE;
    }
    return FALSE;
}


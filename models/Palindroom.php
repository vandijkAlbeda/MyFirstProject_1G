<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../integration/DbHandler.php';

class Palindroom{
    private $text;
    private $flippedText;
    
    function flipText($text){
        $this->text = $text;
        $flippedText="";
        // we gebruiken een for omdat we de rangeomvang kennen.
        for ($index = strlen($text) - 1 ; $index > -1 ; $index --){
            $flippedText = $flippedText . $text[$index];
        }
        $this->flippedText = $flippedText;
    }
    
    function getFlippedText(){
        return $this->flippedText;
    }
    
    function heeftFlippedTextEenBetekenis(){
        $db = new DbHandler();
        return $db->findWoord($this->flippedText);
    }
}

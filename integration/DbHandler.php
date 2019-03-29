<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbHandler
 *
 * @author H.M
 */

$db = new DbHandler();
if ($db->findWoord("Henk") == TRUE){
    $db->printWoord();    
}
else{
    echo "Geen kaaaaaaaaaaaaaaaaaaaaaaaaas vandaag";
}


class DbHandler {
    // dit noemen in OO een attribute
    private $woord;
    
    // een functie in OO heet een method
    function findWoord($woord){
        $result = FALSE;
        $this->woord = $woord;
        // stap 1 : instellen PDO
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    
        $host = '127.0.0.1'; 
        $charset = 'utf8mb4'; 
        $db   = 'palindroom';
        $user = "root";
        $password ="";

        $host = "mysql:host=$host;dbname=$db;charset=$charset";

        $sql = "SELECT * FROM palindromen WHERE woord='".$woord."';";
        try {
            // STAP 2: connect
            $conn = new PDO($host, $user, $password, $options);
            // stap 3: run the query
            $stmt = $conn->query($sql);
            // stap 4: fetch
            if ($stmt->rowCount() == 1){
                $result = TRUE;
            }
        }
        catch (PDOException $e) {
            echo "jou text" . $e->getMessage()."(".$e->getCode().")." ;
        }
        return $result;
        }
    
    function printWoord(){
        echo $this->woord;
    }
    //put your code here
}

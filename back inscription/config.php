<?php 
        /*
           Attention ! le host => l'adresse de la base de données et non du site !!
        
           Pour ceux qui doivent spécifier le port ex : 
           $bdd = new PDO("mysql:host=CHANGER_HOST_ICI;dbname=CHANGER_DB_NAME;charset=utf8;port=3306", "CHANGER_LOGIN", "CHANGER_PASS");
           
         */
 

    try {
        $this->connection = new mysqli(localhost:3306, xuereert_lbc, 5XqExJE!;3G(, xuereert_lbc);
     
        if ( mysqli_connect_errno()) {
            throw new Exception("Could not connect to database.");   
        }
    } catch (Exception $e) {
        throw new Exception($e->getMessage());   
    }       
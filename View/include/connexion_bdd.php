<?php 
        /*
           Attentio !  le host => l'adresse de la base de données et non du site !!
        
           Pour ceux qui doivent spécifier le port ex : 
           $pdo = new PDO("mysql:host=CHANGER_HOST_ICI;dbname=CHANGER_DB_NAME;charset=utf8;port=3306", "CHANGER_LOGIN", "CHANGER_PASS");
           
         */
    try 
    {
        $pdo = new PDO("mysql:host=localhost;dbname=xuereert_lbc;charset=utf8", "xuereert_lbc", "vfJHmPC(mT$5");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }

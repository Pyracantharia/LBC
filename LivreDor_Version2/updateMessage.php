<?php

use App\Utils\Database;

session_start();

require 'vendor/autoload.php';

$db = new Database();

if(isset($_GET['id'])) {
    $errorId = false;
    $id = (int)$_GET['id'];
    /**
     * Prépare -> j'execute -> je récupère
     */
    $query = $db->getPdo()->prepare('SELECT id FROM livredor WHERE id = :id');
    $query->execute([
        "id" => $id
    ]);
    $checkId = $query->fetch();

    /**
     * Je vérifie si l'id existe bien en base de données (Celui envoyer en paramètre)
     */
    if(!$checkId) {
        $errorId = true;
    }

    if(empty($id)) {
        $errorId = true;
    } 

    if($errorId) { 
        header('Location: index.php?error=1');
        exit();
    } else {
        /**
         * Memes condition que le addMessage
         */
        if(isset($_POST['pseudo'], $_POST['message'])) {
            $errorForm = false;
            $username = trim($_POST['pseudo']);
            $contenu = trim($_POST['message']);
            
            if(empty($username) && empty($contenu)) {
                $errorForm = true;
            } 
        
            if(mb_strlen($username) > 29) {
                $errorForm = true;
            }
        
            if(mb_strlen($contenu) > 300) {
                $errorForm = true;
            }

            if($errorForm) { 
                /**
                 * Je renvoie l'id en paramètre pour garder la modification afin d'eviter que ça ramene dans l'insertion
                 */
                header("Location: index.php?action=update&id=$id&error=1");
                exit();
            } else {
                $query = $db->getPdo()->prepare("UPDATE livredor SET username = :username, contenu = :contenu WHERE id = :id");
                $query->execute([
                    'id' => $id,
                    'username' => $username,
                    'contenu' => $contenu
                ]);
                header("Location: index.php?update=1");
                exit();

            }
        }
    }
} else {
    header("Location: index.php?error=1");
    exit();
}
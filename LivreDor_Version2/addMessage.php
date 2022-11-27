<?php

use App\Utils\Database;

session_start();

/**
 * J'appeler l'autoloader
 */
require 'vendor/autoload.php';

$db = new Database();

/**
 * Je vérifié si les POST existent
 */

if(isset($_POST['pseudo'], $_POST['message'])) {
    $error = false;
    /**
     * Je trim le pseudo et le message c'est à dire que j'enlève les espace avant et après
     */
    $username = trim($_POST['pseudo']);
    $contenu = trim($_POST['message']);

    /**
     * Je vérifie si les variable ne sont pas vides
     * Si un utilisateur à rentrer qqchose sinon ERROR
     */
    if(empty($username) && empty($contenu)) {
        $error = true;
    } 

    /**
     * Je vérifie la taille de mon pseudo avec la fonction mb_strlen qui vérifie même les caractères unicode
     * Si la taille du pseudo est supérieur à 29 caractères erreur
     */
    if(mb_strlen($username) > 29) {
        $error = true;
    }

     /**
     * Je vérifie la taille de mon message avec la fonction mb_strlen qui vérifie même les caractères unicode
     * Si la taille du message est supérieur à 300 caractères erreur
     */
    if(mb_strlen($contenu) > 300) {
        $error = true;
    }
    
    /**
     *  Si y a au moins une erreur ça rentre dans la fonction
     */
    if($error) { 
        /**
         * Je déclare une session pour sauvegarder ce que l'utilisateur à rentrer
         * Ensuite je redirige l'utilisateur vers la page d'accueil
         * et j'exit
         */
        $_SESSION['pseudo'] = $username;
        $_SESSION['message'] = $contenu;
        header('Location: index.php?error=1');
        exit();
    } else {
        /**
         * Je prepare la requête ensuite je l'execute
         * Après je unset les session, ce qui permettra de les vider 
         * Puis je rediriger l'utilisateur vers la page d'accueil
         * et j'exit
         */
        $query = $db->getPdo()->prepare("INSERT INTO livredor (username, contenu) VALUES (:username, :contenu)");
        $query->execute([
            'username' => $username,
            'contenu' => $contenu
        ]);
        unset($_SESSION['pseudo']);
        unset($_SESSION['message']);
        header('Location: index.php?success=1');
        exit();
    }
}
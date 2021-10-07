<?php

/**
 * Gestion de la connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
    case 'demandeConnexion':
        include 'vues/v_connexion.php';
        break;
    case 'valideConnexion':
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
         $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
        $visiteur = $pdo->getInfosVisiteur($login);
        $comptable = $pdo->getInfosComptable($login);
        $mdpVisiteur= $pdo->getMdpVisiteur($login);
        $round = rand(1000,9999);
        
        if(!password_verify($mdp, $pdo->getMdpVisiteur($login)))
        {
            if(!password_verify($mdp,$pdo->getMdpComptable($login))){
              ajouterErreur('Login ou mot de passe incorrect');
              include 'vues/v_erreurs.php';
              include 'vues/v_connexion.php';  
            }
            else{
                $id = $comptable['id'];
                $nom = $comptable['nom'];
                $prenom = $comptable['prenom'];
                connecter_comptable($id, $nom, $prenom);
                header('Location: index.php');
                
                }
        }
        else{
            $id = $visiteur['id'];
            $nom = $visiteur['nom'];
            $prenom = $visiteur['prenom'];
            connecter($id, $nom, $prenom);
            $pdo->setCodeVisiteur($login,$round);
//            header('Location: index.php');            
            mail("julien@gmail.com","connexion",$round);
            include 'vues/v_validerCode.php';
        }        
        
            
 
        
//        if (!is_array($comptable)){
//            ajouterErreur('Login ou mot de passe incorrect');
//            include 'vues/v_erreurs.php';
//            include 'vues/v_connexion.php';
//        } 
        
        break;
    default:
        include 'vues/v_connexion.php';
        break;
}

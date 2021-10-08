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
        $round = strval(rand(1000,9999));
        
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
            connecter($id, $nom, $prenom,$round);
            $pdo->setCodeVisiteur($login,$round);
//            header('Location: index.php');
            $mail = $pdo->getMailVisiteur($id);
            $message = 
                     '<html>
<meta charset="utf-8">
      <head>
	  <style type="text/css">
	  body{
	  font-family: "Segoe UI Light","Segoe UI","Helvetica Neue Medium",Arial,sans-serif;
	  }
	  #mail{
	  color :#2672ec;
	  font-size: 41px;
	  
	  
	  }
	  </style>
       <title>Calendrier des anniversaires pour Août</title>
      </head>
      <body>
	  <h1>
                    <img src="./images/logo.jpg" class="img-responsive center-block" alt="Laboratoire Galaxy-Swiss Bourdin" title="Laboratoire Galaxy-Swiss Bourdin">
                </h1>
       <p id="mail" >Code de sécurité</p>
	   <p>Veuillez utiliser le code de sécurité suivant pour le compte sdsd</p>
	   
	  <p>Code de sécurité: <strong>code</strong</p>
        
      </body>
     </html>';
            mail($mail[0],"lem.julien83@gmail.com" . $nom,$message,"From:<LyceeBonaparte@gmail.com");
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

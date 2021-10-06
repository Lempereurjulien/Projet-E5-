<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$code = $pdo->getCodeVisiteur($login);
if($code == $round){
    header('Location: index.php');
    include 'vues/v_accueil';
}
else{
    AjouterErreur('Login ou mot de passe incorrect');
              include 'vues/v_erreurs.php';
              include 'vues/v_connexion.php';
}

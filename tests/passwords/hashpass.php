<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$pdo = new PDO('mysql:host=localhost;dbname=gsb_frais', 'root', '');
$pdo->query('SET CHARACTER SET utf8');

function getLesVisiteurs($pdo)
{
    $req = 'select * from visiteur';
    $res = $pdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
}

$visiteurs = getLesVisiteurs($pdo);
foreach ($visiteurs as $visiteur ){
    $hashMdp = password_hash($visiteur['mdp'],PASSWORD_DEFAULT);
$req = "UPDATE visiteur SET mdp='" . $hashMdp . "' WHERE id ='" . $visiteur['id'] . "';";
$pdo->exec($req);
}

function getLesComptables($pdo)
{
    $req = 'select * from comptable';
    $res = $pdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
}
$comptables = getLesComptables($pdo);
foreach ($comptables as $comptable ){
    $hashMdp = password_hash($comptable['mdp'],PASSWORD_DEFAULT);
$req = "UPDATE comptable SET mdp='" . $hashMdp . "' WHERE id ='" . $comptable['id'] . "';";
$pdo->exec($req);
}

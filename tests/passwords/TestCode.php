<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$codage=rand(1000,9999);
$round = 1000;
$nbEssai = 0;
$t0=microtime();
while ($codage != $round){
    $round+=1;
    $nbEssai++;
}
$t1 = microtime();
$temps=$t1;
echo "Essai : ".$nbEssai." Temps en seconde : ".$temps;



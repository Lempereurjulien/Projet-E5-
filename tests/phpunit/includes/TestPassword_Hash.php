<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Test{
    
    public function HashMDP($mdp){
        
    $hashMdp = password_hash($mdp,PASSWORD_DEFAULT);
    $req = "UPDATE visiteur SET mdp='" . $hashMdp . "' WHERE id='" . $id . "';";
        
    $requetePrepare = PdoGsbTest::$monPdo->prepare(
            
    )
}
}
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
/**
 * Vue Accueil
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
?>
<link href="../styles/style.css" rel="stylesheet" type="text/css"/>
<div id="accueil-comptable">
    <h2>
        Gestion des frais<small> - Comptable : 
            <?php 
            echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']
            ?></small>
    </h2>   
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" style="border-color:#fb8500">
            <div class="panel-heading" style="background-color:#fb8500; border-color:#fb8500";>
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-bookmark"></span>
                    Navigation
                </h3>
            </div>
            <div class="panel-body">
                <!--<div class="row">-->
                    <div class="col-xs-12 col-md-12">
                        <a href="index.php?uc=gererFrais&action=saisirFrais"
                           class="btn btn-success btn-lg" role="button" style="background-color:#fb8500">
                        
                       <a href="v_validerFichefrais.php"
                           class="btn btn-success btn-lg" role="button" style="background-color:#fb8500">
                            <span class="glyphicon glyphicon-pencil"></span>
                            <br>Valider fiche de frais</a>
                        <a href="index.php?uc=etatFrais&action=selectionnerMois"
                           class="btn btn-primary btn-lg" role="button">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <br>Suivre paiement fiches de frais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
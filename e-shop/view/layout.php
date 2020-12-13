<?php
require_once 'db_files/db_artikel.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel ="stylesheet" href ="<?= CSS_URL . "mainStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "trgovinaStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "loginStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "profilStyle.css" ?>">

<nav class="navbar navbar-expand-lg navbar-dark static-top">
  <div class="container">
    <a class="navbar-brand" href ="<?= BASE_URL . "/trgovina" ?>">
          E-SHOP
    </a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          
        
        <?php if($_SESSION["mailStranke"] == NULL) :?>
        <li class="nav-item">
          <a class="navbar-brand" href ="<?= BASE_URL . "/uporabnik/registracija" ?>"> REGISTRACIJA </a>
        </li>

        <li class="nav-item">
          <a class="navbar-brand" href ="<?= BASE_URL . "/uporabnik/vpis" ?>"> VPIS </a>
        </li>
        <?php endif?>

        <?php if($_SESSION["mailStranke"] != NULL) :?>
        <li class="nav-item">
          <a class="navbar-brand" href ="<?= BASE_URL . "profil" ?>"> PROFIL </a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand" href ="<?= BASE_URL . "izpisi" ?>"> IZPIS </a>
        </li>
        <?php endif?>
      </ul>
    </div>
  </div>
</nav>
        
    
    

        
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

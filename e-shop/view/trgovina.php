<?php
require_once 'db_files/db_artikel.php';
#session_start();
#var_dump($_SESSION);
#exit();
?>



<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
        
        
        <div class ="kategorije" align ="center">
            
        </div>
        <div class ="kategorijeTitle" align ="center" style ="padding-top: 0.4vh;">
            <h4 style ="font-weight: 600;"> KATEGORIJE</h4>
        </div>
        
        <div class ="title" align ="center" style ="padding-top: 0.4vh;">
            <h4 style ="font-weight: 600;"> ARTIKLI</h4>
        </div>
        
       
        <div class ="overflow-auto itemList" >
            
        <?php foreach ($Artikli as $Artikel): ?>
            <?php if($_SESSION["tipUporabnika"] == "stranka" or $_SESSION["tipUporabnika"] == NULL):?>
                <?php if($Artikel["aktiviran"] == 1):?>
                        <a href ="<?= BASE_URL . "/artikel?idArtikla=" . $Artikel["idArtikla"]?>"><div class ="item" >
                        <div id ="prikaznoImeArtikla" style ="margin-top: 65%;color: white;"><?=  $Artikel["imeArtikla"] ?> <?= $Artikel["cenaArtikla"] ?> </div>
                        </div></a>
                <?php endif;?>
            <?php else:?>
                <?php if($Artikel["aktiviran"] == 0):?>
                        <a href ="<?= BASE_URL . "/artikel?idArtikla=" . $Artikel["idArtikla"]?>"><div class ="item" style =" background-color: rgba(255, 0, 0, 0.4)!important;">
                        <div id ="prikaznoImeArtikla" style ="margin-top: 65%;color: white;">
                            <?=  $Artikel["imeArtikla"] ?> <?= $Artikel["cenaArtikla"] ?> 
                        </div>
                        </div></a>
                <?php else:?>
                <a href ="<?= BASE_URL . "/artikel?idArtikla=" . $Artikel["idArtikla"]?>"><div class ="item" >
                        <div id ="prikaznoImeArtikla" style ="margin-top: 65%;color: white;"><?=  $Artikel["imeArtikla"] ?> <?= $Artikel["cenaArtikla"] ?> </div>
                        </div></a>
                <?php endif;?> 
            <?php endif;?>    
        <?php endforeach; ?>
        </div>
    </div>
</div
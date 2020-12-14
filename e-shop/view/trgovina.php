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
                <a href ="<?= BASE_URL . "/artikel?idArtikla=" . $Artikel["idArtikla"]?>"><div class ="item" >
        	<div id ="prikaznoImeArtikla" style ="margin-top: 65%;color: white;"><?=  $Artikel["imeArtikla"] ?> <?= $Artikel["cenaArtikla"] ?> </div>
                </div></a>
                
        <?php endforeach; ?>
        </div>
    </div>
</div
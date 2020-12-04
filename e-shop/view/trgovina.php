<?php
require_once 'db_files/db_artikel.php';
?>


        <?php
        // put your code here
        ?>

<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        <div class ="title" align ="center">
            <h4>ARTIKLI</h4>
        </div>
        <div class ="overflow-auto itemList" >
            
        <?php foreach ($Artikli as $Artikel): ?>
                <div class ="item" >
        	<?= $Artikel["imeArtikla"] ?> <?= $Artikel["cenaArtikla"] ?> 
                </div>
                    
        <?php endforeach; ?>
        </div>
    </div>
</div
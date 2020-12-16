<?php
require_once 'db_files/db_artikel.php';
#session_start();
#var_dump($_SESSION);
#exit();

#echo(password_hash("amazon", PASSWORD_BCRYPT));
#exit();
?>



<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
        
        
        <div class ="kategorije" align ="center" 
        style ="padding: 1%; font-size: 1.2em; text-decoration: none; color: black; background: none; ">
            
            
            <div class = "link" id ="kat1">
                <a id = "k1l" href ="https://localhost/server/h/EP-seminarska-naloga/e-shop/index.php/trgovina?kategorija=Fekalije"> Kategorija 1</a>
            </div>
            

            <div class = "link" id ="kat2">
                <a id = "k2l" href ="https://localhost/server/h/EP-seminarska-naloga/e-shop/index.php/trgovina?kategorija=Orbanove%20orgije"> Kategorija 2</a>
            </div>

            <div class = "link" id ="kat3">
                <a id = "k3l" href ="https://localhost/server/h/EP-seminarska-naloga/e-shop/index.php/trgovina?kategorija=Gaming"> Kategorija 3</a>
            </div>
            
            <div class = "link" id ="kat4">
                <a id = "k4l"  href ="https://localhost/server/h/EP-seminarska-naloga/e-shop/index.php/trgovina?kategorija=Fresh%20gum"> Kategorija 4</a>
            </div>
        </div>
        <div class ="kategorijeTitle" align ="center" style ="padding-top: 0.8vh;  height: 5vh;">
            <h4 style ="font-weight: 600;"> KATEGORIJE</h4>
            
        </div>
        
        <div class ="title" align ="center" style ="padding-top: 0.4vh;">
            <h4 style ="font-weight: 600;"> ARTIKLI</h4>
        </div>
        
       
        <div class ="overflow-auto itemList" >
            
        <?php foreach ($Artikli as $Artikel): ?>
            <?php if($_SESSION["tipUporabnika"] == "stranka" or $_SESSION["tipUporabnika"] == NULL):?>
                <?php if($Artikel["aktiviran"] == 1 && $_GET["kategorija"] == NULL):?>
                        <a href ="<?= BASE_URL . "/artikel?idArtikla=" . $Artikel["idArtikla"]?>"><div class ="item" >
                        <div id ="prikaznoImeArtikla" style ="margin-top: 65%;color: white;"><?=  $Artikel["imeArtikla"] ?> <br><?= $Artikel["cenaArtikla"] ?>€ </div>
                        </div></a>
                <?php elseif($Artikel["aktiviran"] == 1 && $Artikel["kategorijaArtikla"] == $_GET["kategorija"]) :?>
                        <a href ="<?= BASE_URL . "/artikel?idArtikla=" . $Artikel["idArtikla"]?>"><div class ="item" >
                        <div id ="prikaznoImeArtikla" style ="margin-top: 65%;color: white;"><?=  $Artikel["imeArtikla"] ?> <br><?= $Artikel["cenaArtikla"] ?>€ </div>
                        </div></a>
                <?php endif;?>
            <?php else:?>
                <?php if($Artikel["aktiviran"] == 0):?>
                        <a href ="<?= BASE_URL . "/artikel?idArtikla=" . $Artikel["idArtikla"]?>"><div class ="item" style =" background-color: rgba(255, 0, 0, 0.4)!important;">
                        <div id ="prikaznoImeArtikla" style ="margin-top: 65%;color: white;">
                            <?=  $Artikel["imeArtikla"] ?> <br><?= $Artikel["cenaArtikla"] ?>€
                        </div>
                        </div></a>
                <?php else:?>
                <a href ="<?= BASE_URL . "/artikel?idArtikla=" . $Artikel["idArtikla"]?>"><div class ="item" >
                        <div id ="prikaznoImeArtikla" style ="margin-top: 65%;color: white;"><?=  $Artikel["imeArtikla"] ?> <br><?= $Artikel["cenaArtikla"] ?>€ </div>
                        </div></a>
                <?php endif;?> 
            <?php endif;?>    
        <?php endforeach; ?>
        </div>
    </div>
</div>

<script src = "<?= JS_URL . "kategorije.js"?>"></script>


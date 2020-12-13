

<?php
require_once 'db_files/db_artikel.php';
$url = filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_SPECIAL_CHARS);
#var_dump($_SESSION);




?>
   
<link rel ="stylesheet" href ="<?= CSS_URL . "artikelStyle.css" ?>">

 
         

<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
       
        <div class ="titleArtikel" align ="center" style ="padding-top: 0.4vh;">
            <h4 style ="font-weight: 600;"><?= $Artikel["imeArtikla"]?></h4>
        </div>
        
    
        <div class ="artikelVsebnik" >
            
            
            <div id ="opisIzdelka">
               <div id ="oArtiklu">O ARTIKLU</div>
               <div class ="overflow-auto" id="besediloOpisa">
               <?= $Artikel["opisArtikla"]?>
               </div>
            </div>
            
            <div id ="desno">
                <div class ="row no-gutters justify-content-center">
                    <img id ="artikelSlika" src = "<?= IMAGES_URL . "dildak.jpeg"?>">
                </div>
                
                <div class ="row no-gutters justify-content-center nakup">
                <s style = "margin-right: 5px;">250€</s><?= $Artikel["cenaArtikla"]?>
                </div>
                <div class ="row no-gutters justify-content-center dodVkos">
                    <form action ="" method = "POST">
                        <input type="hidden" name="do" value="add_into_cart" />    
                        <input type = "hidden" name = "idArtikla" value = "<?= $Artikel["idArtikla"]?>">
                        <input type = "hidden" name = "imeArtikla" value = "<?= $Artikel["imeArtikla"]?>">
                        <input type = "hidden" name = "cenaArtikla" value = "<?= $Artikel["cenaArtikla"]?>">    

                        <button type="submit" class="btn btn-light dodajVKos">Dodaj v kosarico</button>
                
                    
                    </form>
                </div>
                
                <div class ="row no-gutters justify-content-center dodVkos">
                    <a href ="<?= BASE_URL . "/artikel/uredi?idArtikla=" . $Artikel["idArtikla"]?>"> 
                    <button type="button" class="btn btn-light dodajVKos">Uredi artikel</button>
                    </a>
            </div> 

            
          
            
        </div>
        
        
    </div>
</div


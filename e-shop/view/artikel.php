

<?php
require_once 'db_files/db_artikel.php';


?>
   
<link rel ="stylesheet" href ="<?= CSS_URL . "artikelStyle.css" ?>">
  
         

<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
       
        
        <div class ="titleArtikel" align ="center">
            <h4><?= $Artikel["imeArtikla"]?></h4>
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
                    <button type="button" class="btn btn-light dodajVKos">Dodaj v kosarico</button>
                </div>
            </div> 
          
            
        </div>
        
        
    </div>
</div


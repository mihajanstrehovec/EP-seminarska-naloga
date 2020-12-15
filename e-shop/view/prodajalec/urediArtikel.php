

<?php
require_once 'db_files/db_artikel.php';
#var_dump($Artikel);
#exit();

?>
   
<link rel ="stylesheet" href ="<?= CSS_URL . "artikelStyle.css" ?>">
  
         

<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
       
        <div class ="titleArtikel" align ="center" style ="padding-top: 0.4vh;">
            <form id = "urediArtikel" action ="<?= BASE_URL . "artikel/uredi" ?>" method = "POST">
            <input form = "urediArtikel" type = "hidden" name = "zalogaArtikla" value ="<?= $Artikel["zalogaArtikla"]?>" placeholder ="<?= $Artikel["zalogaArtikla"]?>">
            <input form = "urediArtikel" type = "hidden" name = "kategorijaArtikla" placeholder ="<?= $Artikel["kategorijaArtikla"]?>" value ="<?= $Artikel["kategorijaArtikla"]?>">
            <input form = "urediArtikel" type = "hidden" name = "idArtikla" value ="<?=$_GET['idArtikla']?>">
            <h4 style ="font-weight: 600;"><input form = "urediArtikel" type ="text" placeholder ="<?= $Artikel["imeArtikla"]?>" value = "<?= $Artikel["imeArtikla"]?>" name = "imeArtikla" style ="background-color: rgba(0,0,0,0); border: 0px; color: white;"></h4>
            </form>
        </div>
        
    
        <div class ="artikelVsebnik" >
            
            
            <div id ="opisIzdelka">
               <div id ="oArtiklu">O ARTIKLU</div>
               <div class ="overflow-auto" id="besediloOpisa">
               <textarea form = "urediArtikel" placeholder="<?= $Artikel["opisArtikla"]?>" class="form-control" id="exampleFormControlTextarea1" rows="7" 
               name ="opisArtikla" style ="width: 100%; float: left; margin-top: 20px; background-color: rgba(0,0,0,0); border: 0px; color: white;"><?= $Artikel["opisArtikla"]?>
               </textarea>
               
               </div>
            </div>
            
            <div id ="desno">
                <div class ="row no-gutters justify-content-center">
                    <img id ="artikelSlika" src = "<?= IMAGES_URL . "dildak.jpeg"?>">
                </div>
                
                <div class ="row no-gutters justify-content-center nakup">
                <input form ="urediArtikel" class="form-control" type="number" name="cenaArtikla" value="<?= $Artikel["cenaArtikla"]?>" id="example-number-input" style ="width: 20%; flaot: left; margin-top: 20px; background-color: rgba(0,0,0,0); border: 0px; color: rgba(89,145,144,0.7);;">
                </div>
               
                
                <div class ="row no-gutters justify-content-center dodVkos">
                    
                    <?php if($Artikel["aktiviran"] == 1):?>

                        <button form = "urediArtikel" type="submit" class="btn btn-light dodajVKos">POTRDI SPREMEMBE</button>
                        <form action="<?= BASE_URL . "artikel/izbrisi" ?>" method="post" style="margin-top:1.5vh;">
                            <input type="hidden" name="idArtikla" value="<?= $Artikel["idArtikla"] ?>"  />
                            <label class = "text-danger">Deaktiviraj? <input type="checkbox" name="delete_confirmation" /></label>
                            <button type="submit" class="btn btn-danger">Deaktiviraj artikel</button>
                        </form>

                    <?php elseif($Artikel["aktiviran"] == 0):?>

                        <form action="<?= BASE_URL . "artikel/aktiviraj" ?>" method="post" style="margin-top:1.5vh;">
                            <input type="hidden" name="idArtikla" value="<?= $Artikel["idArtikla"] ?>"  />
                            <label class = "text-success">Aktiviraj? <input type="checkbox" name="delete_confirmation" /></label>
                            <button type="submit" class="btn btn-success">Aktiviraj artikel</button>
                        </form>

                    <?php endif;?>

                    
            </div> 

            
          
            
        </div>
        
        
    </div>
</div


<?php 

#var_dump($Artikel["Images"][0]);
#exit();
?>

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
                <div class ="row no-gutters ">
                    
                    <?php for($i = 0; $i < count($Artikel["Images"]); $i++):?>
                        <div class ="col-lg-10">
                        <img onclick = "myFunction()" id ="artikelSlika" src = "<?= IMAGES_URL . "/products/". $Artikel["Images"][0]["imeSlike"]?>">
                        </div>
                    <?php endfor;?>

                    <div class="slideshow-container">
                        
                            <!-- Full-width images with number and caption text -->
                            <div class="mySlides fade">
                                <div class="numbertext">1 / 3</div>
                                <img src="<?= IMAGES_URL . "/products/". $Artikel["Images"][0]["imeSlike"]?>" style="width:100%">
                                <div class="text">Caption Text</div>
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">2 / 3</div>
                                <img src="<?= IMAGES_URL . "/products/". $Artikel["Images"][1]["imeSlike"]?>" style="width:100%">
                                <div class="text">Caption Two</div>
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">3 / 3</div>
                                <img src="<?= IMAGES_URL . "/products/". $Artikel["Images"][1]["imeSlike"]?>" style="width:100%">
                                <div class="text">Caption Three</div>
                            </div>

                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            </div>
                            <br>

                            <!-- The dots/circles -->
                            <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                            </div>
                        
                    
                </div>
                
                <div class ="row no-gutters justify-content-center nakup">
                <s style = "margin-right: 5px;">250€</s><?= $Artikel["cenaArtikla"]?>
                </div>
                <?php if($_SESSION["tipUporabnika"] == "stranka"): ?> 
                <div class ="row no-gutters justify-content-center dodVkos">
                    <form action ="" method = "POST">
                        <input type="hidden" name="do" value="add_into_cart" />    
                        <input type = "hidden" name = "idArtikla" value = "<?= $Artikel["idArtikla"]?>">
                        <input type = "hidden" name = "imeArtikla" value = "<?= $Artikel["imeArtikla"]?>">
                        <input type = "hidden" name = "cenaArtikla" value = "<?= $Artikel["cenaArtikla"]?>">    
        
                        <button type="submit" class="btn btn-light dodajVKos">Dodaj v kosarico</button>
                
                    
                    </form>
                </div>
                                        //$Artikel["ocena"]
                <?php for($i = 0; $i < $Artikel["ocena"];$i++){ ?>
                        
                    <button id=<?="rating$i"?>><img style="width:2em" src="<?= IMAGES_URL . "star.png"?>"></button> 

                <?php } ?>
                <script>
                        function name() {
                        document.getElementById("rating3").src="<?= IMAGES_URL . "shopping-cart.png"?>";
                    }
                </script>
                <?php endif; ?>
                

                <?php if($_SESSION["tipUporabnika"] == "prodajalec") :?>
                    <div class ="row no-gutters justify-content-center dodVkos">
                        <a href ="<?= BASE_URL . "/artikel/uredi?idArtikla=" . $Artikel["idArtikla"]?>"> 
                        <button type="button" class="btn btn-light dodajVKos">Uredi artikel</button>
                        </a>
                    </div> 
                <?php endif ?>

            
          
            
        </div>
        
        
    </div>
</div>


<script>
    function myFunction() {
        var mm = "<?php echo $Artikel["images"][0]["imeSlike"]; ?>";
       console.log(mm);
    }
</script>


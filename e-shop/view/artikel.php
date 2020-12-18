
<style> /* Stil za galerijo slik; Komentar => zunanji CSS style sheet ne vpliva na izgled spletne strani :( */

* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
 
}

/* Gumba za prejšno in naslednjo sliko */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Pozicija desnega gumba */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* Pozicija levega gumba */
.prev {
  left: 0;
  border-radius: 3px 0 0 3px;
}

/* Ko gremo čez gum se oyadje pobarva */
.prev:hover, .next:hover {
  background-color: rgba(89,145,144,0.5);
}


/* Ob hover puščice ostanete beli */ 
a:hover{
    text-decoration: none;
    color: white;
}
a:active{
    text-decoration: none;
    color: white;
}
a:hover{
    color: white;
}

/* Trenutna slika v desnem zgornjem kotu */
.trenutnaSlika {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}



/* Animacije prehoda */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1s;
  animation-name: fade;
  animation-duration: 1s;
}

.fade:not(.show) {
    opacity: 1;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>

<?php 

#var_dump($Artikel["Images"]);
#exit();
?>

<?php
require_once 'db_files/db_artikel.php';
$url = filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_SPECIAL_CHARS);
#var_dump($_SESSION);

//


?>

 <!-- Slideshow container -->
 
   
<link rel ="stylesheet" href ="<?= CSS_URL . "artikelStyle.css" ?>">
<!-- Full-width images with number and caption text -->

 
         

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

                <div class="slideshow-container">
                     <!-- Galerija slik -->
                    <div class="slideshow-container">

                        <!--For loop, ki prikazuje vse slike artikla-->
                        <?php for($i = 0; $i < count($Artikel["Images"]); $i++):?>
                            <div class="mySlides fade">
                                <div class="trenutnaSlika">1 / 3</div>
                                <img src="<?= IMAGES_URL . "/products/". $Artikel["Images"][$i]["imeSlike"]?>" height = "200px" style="width:100%">
                                
                            </div>
                        <?php endfor;?>

                        <?php if($Artikel["Images"][1] != NULL):?>
                            <!-- Gumb za prejšno in naslednjo sliko -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        <?php endif;?>
                    </div>
                    
                    <br>

                    <!-- Krogci, ki prikazujejo na kateri sliki smo -->
                    
                            
                    
                    

                   
                
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
                                        
                <?php for($i = 0; $i < 5;$i++){ 
                    
                    if($i <= $Artikel["ocena"]){    ?>
                    
                      <button style="background-color:rgba(0,0,0,0);border:0px " id=<?="rating$i"?> onclick="seosSiTU()"><img id=<?="zvezdica$i"?> style="width:2em" src="<?= IMAGES_URL . "star.png"?>"></button> 
                <?php
                    }
                    else if($i > $Artikel["ocena"]){ ?>

                      <button style="background-color:rgba(0,0,0,0);border:0px " id=<?="rating$i"?> onclick="seosSiTU()"><img id=<?="zvezdica$i"?> style="width:2em" src="<?= IMAGES_URL . "gray-star.png"?>"></button> 
                <?php    } 
                      } ?>
                




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
    var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  
  //dots[slideIndex-1].className += " active";
  var trenutnaSlika = document.getElementsByClassName("trenutnaSlika");
  //console.log(trenutnaSlika.length);
  for(var i = 0; i < trenutnaSlika.length; i++){

      trSlika = i+1;
      
      trenutnaSlika[i].innerHTML = trSlika + "/" + trenutnaSlika.length;
  
  }
} 
</script>


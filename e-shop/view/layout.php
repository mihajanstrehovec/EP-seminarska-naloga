<?php
require_once 'db_files/db_artikel.php';
#var_dump($_SESSION);
#exit();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel ="stylesheet" href ="<?= CSS_URL . "mainStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "trgovinaStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "loginStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "profilStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "kosaricaStyle.css" ?>">

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
  <img src = "<?= IMAGES_URL . "shopping-cart(1).png"?>" width = "20px" height = "20px">
</nav>

<?php
$_SESSION['price'] = array(100);


?>
<?php if($_SESSION["tipUporabnika"] == "stranka"): ?>
<div class="cart">
            <h3>Košarica</h3>
            <p><?php
            $total = 0;
            if (isset($_SESSION["cart"])): {
                    #$idArtikla = $_POST['idArtikla'];
                    
                    for($i = 0; $i <= 6; $i++){
                    
                    // Preverimo, če je knjiga z id-jem 1 nastavljena
                    if(isset($_SESSION["cart"][$i])){
                        $idTr["idArtikla"] = $i;
                        $trArtikel = eshopDB::get($idTr);// Pridobimo objekt knjiga iz Knjiga.php in ga shranimo v $knjiga
                        $total += $trArtikel["cenaArtikla"] * $_SESSION["cart"][$i]; // K skupni ceni prištejemo ceno knjige pomnoženo s številom le te 
                        ?> 
                          <!-- HTML obrazec v katerem lahko nastavimo število knjig in posodobimo to vrednost-->
                          <form action="<?= BASE_URL . "artikel" ?>" method="post">
                              <input type="hidden" name="do" value="update_cart" />
                              <input type="hidden" name="idArtikla" value="<?= $trArtikel["idArtikla"] ?>" />
                              <input type="number" name= "quantity" value = "<?= $_SESSION["cart"][$i]?>" /> <!--Število knjig -->
                              
                              <?= $trArtikel["imeArtikla"] ?>
                              
                              <!-- Gumb za praznenje košarice, ki v php sproži case 'update_cart' in posledično posodobi število knjig -->
                              <button type="submit">Posodobi</button>
                          </form>   
            <?php
                    
                    
                    }
                  }
               
                print ("Skupna cena:" . " ". "<strong>". $total . "</strong>");
                
                
            }?>
                <!-- Gumb za praznenje košarice, ki v php sproži case 'purge_cart' in posledično unset($_SESSION['cart']) -->
                <form action="<?= BASE_URL . "izprazni" ?>" method="post">
                    <button type="submit" name ="do" value = "purge_cart">Sprazni</button>
                </form>
                
            <?php else : ?>
                Košara je prazna
                
                        
            <?php endif;?></p>
        </div>
    
<?php endif?>
        <!--<?= var_dump($_SESSION); ?>-->
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

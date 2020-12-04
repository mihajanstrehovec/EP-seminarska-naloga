<?php

?>

        <?php
        // put your code here
        ?>
        
        <h1>DODAJANJE ARTIKLA</h1>
        
        <form action ="<?= BASE_URL . "artikel/dodaj" ?>" method = "POST">
            <!--<input type="hidden" name="do" value="add" />-->
            Ime artikla: <input name ="imeArtikla" type ="text"/><br>
            Cena artikla: <input name ="cenaArtikla" type ="number"/><br>
            Opis artikla: <input name ="opisArtikla" type ="text"/><br>
            Zaloga artikla: <input name ="zalogaArtikla" type ="number"/><br>
            <p><button>DODAJ</button></p>
        </form>
        
        <?php
            /*if(isset ($_POST['do']) && $_POST['do'] == 'add'){
                try {
                    dbArtikli::dodajArtikel($_POST["ime"], $_POST["cena"], $_POST["opis"], $_POST["zaloga"]);
                    echo "Artikel uspešno dodan. <a href='$_SERVER[PHP_SELF]'>Na prvo stran.</a></p>";
                }catch (Exception $e) {
                    echo "<p>Napaka pri dodajanju: {$e->getMessage()}.</p>";
                }
            }*/
        ?>

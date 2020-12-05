
        
        <h1>DODAJANJE ARTIKLA</h1>
        
        <form action ="<?= BASE_URL . "artikel/dodaj" ?>" method = "POST">
            <!--<input type="hidden" name="do" value="add" />-->
            Ime artikla: <input name ="imeArtikla" type ="text"/><br>
            Cena artikla: <input name ="cenaArtikla" type ="number"/><br>
            Opis artikla: <input name ="opisArtikla" type ="text"/><br>
            kategorija artikla: <input name ="kategorijaArtikla" type ="text"/><br>
            Zaloga artikla: <input name ="zalogaArtikla" type ="number"/><br>
            <p><button>DODAJ</button></p>
        </form>
        
       
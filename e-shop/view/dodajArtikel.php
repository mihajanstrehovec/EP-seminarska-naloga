

<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
       
        
        <div class ="titleArtikel" align ="center" style ="padding-top: 0.4vh;">
            <h4 style ="font-weight: 600;">DODAJ ARTIKEL</h4>
        </div>
    
        <div class ="artikelVsebnik" style="padding: 60px;">
            
        <form action ="<?= BASE_URL . "artikel/dodaj" ?>" method = "POST">
        <div class="form-row" >
        <div class="col-lg-12">
        <input type="text" class="form-control" name ="imeArtikla"placeholder="Ime artikla" style="float: left; width: 50%; ">
        </div>
        <div class="col-lg-12">
        <textarea placeholder="Opis artikla"   class="form-control" id="exampleFormControlTextarea1" rows="7" name ="opisArtikla" style ="width: 70%; float: left; margin-top: 20px;"></textarea>
        </div>
       
        <div class="col-lg-12">
            <select class="form-control" id="exampleFormControlSelect1" name ="kategorijaArtikla"style ="width: 35%; float: left; margin-top: 20px;">
                <option hidden> Kategorija</option>
                <option>Gaming</option>
                <option>Fekalije</option>
                <option>Orbanove orgije</option>
                <option>Fresh gum</option>
            </select>
        </div>

        </div>

        <label for="example-number-input" class ="col-1" style ="margin-top: 24px; color: rgba(89,145,144,0.7); font-weight: 600; float: left; margin-right: 10px;">ZALOGA</label>
        <input class="form-control" type="number" name="zalogaArtikla" value="420" id="example-number-input" style ="width: 10%; float: left; margin-top: 20px;">
            
        
        
        <div class="form-group row">
            <label for="example-number-input" class ="col-1" style ="margin-top: 24px; color: rgba(89,145,144,0.7); font-weight: 600;">CENA</label>
            
            <input class="form-control" type="number" name="cenaArtikla" value="420" id="example-number-input" style ="width: 10%; flaot: left; margin-top: 20px;">
            
        
        </div>
      
                    <button type="submit" class="btn btn-light dodajVKos">Ustvari izdelek</button>
               
        </form>
            

        

            
        </div>
        
        
    </div>
</div

        
        
        
       
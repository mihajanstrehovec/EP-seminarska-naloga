
<div class ="container">
<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
       
        <div class = col-lg-6>
        <div class ="titleRegister" align ="center" style ="padding-top: 0.4vh;">
            <h4 style ="font-weight: 600;">REGISTRACIJA</h4>
        </div>
    
        <div class ="registerVsebnik" style="padding: 60px;">

        <form action = "<?= BASE_URL . "uporabnik/registracija"?>" method = "POST">
            
            <div class = "form-row">
                <div class ="col">
                    <input type = "text" name = "imeStranke" placeholder = "Ime" class = "form-control">
                </div>

                <div class ="col">
                    <input type = "text" name = "priimekStranke" placeholder = "Priimek" class = "form-control">
                </div>
            </div>
            <?php if($err ==  "Prosimo vnesite validen e-mail") :?>
                    <div class = "form-row">
                        <h7 style ="color: red;"> <?= $err ?> </h7>
                    </div>
            <?php endif;?>
            <div class = "form-row">
                
                
                
                <div class ="col">
                    <input type = "text" name = "mailStranke" placeholder = "E-pošta" class = "form-control">
                </div>
  
            </div>
            
            
            <div class = "form-row" style = "margin-top: 3vh;">
           
                <div class ="col">
                    <input type = "password" name = "gesloStranke" placeholder = "Geslo" class = "form-control">
                </div>
  
            </div>


            <?php if($err ==  "Gesli se ne ujemata") :?>
                    <div class = "form-row">
                        <h7 style ="color: red;"> <?= $err ?> </h7>
                    </div>
            <?php endif;?>

            <div class = "form-row">
                
                <div class ="col">
                    <input type = "password" name = "gesloPonovi" placeholder = "Ponovite geslo" class = "form-control"
                    style = "margin-bottom: 1vh;">
                </div>

            </div>
           Naslov 
            <div class = "form-row">
                <div class ="col-lg-9">
                    
                    <input type = "text" name = "ulica" placeholder = "Ulica" class = "form-control">
                </div>
                <div class ="col-lg-3">
                    <input type = "number" name = "hisnaSt" placeholder = "Št" class = "form-control">
                </div>
            </div>

            <div class = "form-row">
                <div class ="col-lg-9">
                    
                    <input type = "text" name = "posta" placeholder = "Pošta" class = "form-control">
                </div>
                <div class ="col-lg-3">
                    <input type = "number" name = "postnaSt" placeholder = "Št" class = "form-control">
                </div>
            </div>
               
            

            <div class = "form-row justify-content-center">
                <div class = "col-lg-6" allign ="center">
                    <button type = "submit" class = "btn my-4 btn-block waves-effect waves-light" 
                    style = "margin-top: 3vh; background-color: rgba(89,145,144,1); color: white;">REGISTRACIJA</button>
                </div>
            </div>

            
        
        </form> 
            
        </div>
        </div>
        
    </div>
</div>
</div>

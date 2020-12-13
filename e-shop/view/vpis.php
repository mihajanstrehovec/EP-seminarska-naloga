
<div class ="container">
<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
       
        <div class = col-lg-6>
        <div class ="titleRegister" align ="center" style ="padding-top: 0.4vh;">
            <h4 style ="font-weight: 600;">VPIS</h4>
        </div>
    
        <div class ="registerVsebnik" style="padding: 0px;">

        <form action = "<?= BASE_URL . "uporabnik/vpis"?>" method = "POST">
            
            <?php if($err ==  "Prosimo vnesite veljaven e-pošta naslov") :?>
                    <div class = "form-row">
                        <h7 style ="color: red;"> <?= $err ?> </h7>
                    </div>
            <?php endif;?>


            <?php if($err ==  "Podatki se ne ujemajo") :?>
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


            
            <div class = "form-row justify-content-center">
                <div class = "col-lg-6" allign ="center">
                    <button type = "submit" class = "btn my-4 btn-block waves-effect waves-light" 
                    style = "margin-top: 3vh; background-color: rgba(89,145,144,1); color: white;">PRIJAVA</button>
                </div>
            </div>
        
        </form> 
            
        </div>
        </div>
        
    </div>
</div

</div>
        
       
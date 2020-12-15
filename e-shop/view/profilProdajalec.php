
<?php
    #var_dump($_SESSION);
    #exit();
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
        
       
        
            <div class ="titleProfil" align ="center" style ="padding-top: 0.4vh;">
                <h4 style ="font-weight: 600;">PROFIL</h4>
            </div>
    
            <div class ="profilVsebnik" style="padding: 7%;">
            
                <form action = "" method = "POST">
                
                <div class ="form-group ">
                        <label for = "gesloStranke">Sprememba gesla</label>
                        
                        <?php if($err ==  "Vnešeno geslo je napačno") :?>
                            <div class = "form-row">
                                <h7 style ="color: red;" > <?= $err ?> </h7>
                            </div>
                        <?php endif;?>
                        
                        <div class = "col-lg-5">

                            <input type = "password" class ="form-control" name = "trenutnoGeslo" id ="gesloStranke" placeholder = "Vpišite trenutno geslo">
                        </div>
                        
                       
                        
                        <div class = "col-lg-5" style ="margin-top: 1vh;">
                            <input type = "password" class = "form-control" name = "geslo" placeholder = "Vpišite novo geslo">
                        </div>
                        <button type = "submit" class ="btn my-4" 
                        style ="background-color: rgba(89,145,144,1); color: white; ">
                        Spremeni</button>
                        

                </div>

                

                </form>

                <form action = "" method = "POST">

                <div class ="form-row justify-content-center" style = "margin-top: 4vh;">
                    
                        <label for = "mailStranke">Sprememba uporabniškega imena</label>
                            <div class = "col-lg-5">
                        <input type = "text" class = "form-control" name = "uporabniskoIme"  placeholder = "Vpišite novo uporabniško ime" style ="margin-left: 20px;">
                        </div>

                        <div class = "col-lg-2">
                        <button type = "submit" class ="btn my-4" 
                        style ="background-color: rgba(89,145,144,1); color: white; margin-top: 0px !important; margin-left: 40px;">
                        Spremeni</button>
                        </div>
                </div>

                

                </form>
        
            </div>

        </div>
    </div>
        
</div>
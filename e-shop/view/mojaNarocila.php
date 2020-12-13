
<?php
    #var_dump($imenaNarocil);
    #exit();
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
        
       
        
            <div class ="titleProfil" align ="center" style ="padding-top: 0.4vh;">
                <h4 style ="font-weight: 600;">MOJA NAROČILA</h4>
            </div>
    
            <div class ="overflow-auto profilVsebnik" style="padding: 7%;">
            
                <div class = "row justify-content-center">
                    <h6>ODDANA NAROČILA</h6> 
                </div>

                <div class = "row ">
                    <div class = "col-lg-12 overflow-auto narocila ">
                        <?php for ($i = 0; $i < count($narocila); $i ++):?>
                            <?php var_dump($narocila[4])?>
                        <?php endfor ?>
                    </div>
                </div>




                <div class = "row justify-content-center">
                    <h6>POTRJENA NAROČILA</h6> 
                </div>

                <div class = "row">
                    <div class = "col-lg-12 overflow-auto narocila">
                        FOO-BAR
                    </div>
                </div>






                <div class = "row justify-content-center"">
                    <h6>ZAVRNJENA NAROČILA</h6> 
                </div>

                <div class = "row">
                    <div class = "col-lg-12 overflow-auto narocila">
                        FOO-BAR
                    </div>
                </div>






                <div class = "row justify-content-center"">
                    <h6>STORNIRANA NAROČILA</h6> 
                </div>

                <div class = "row">
                    <div class = "col-lg-12 overflow-auto narocila">
                        FOO-BAR
                    </div>
                </div>



        
            </div>

        </div>
    </div>
        
</div>

<?php
    #var_dump($imenaNarocil);
    #exit();
    require_once("model/eshopDB.php");
    #$mail["mailStranke"] = "kurac@net.nisi";
    $ind = 0;
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
        
       
        
            <div class ="titleProfil" align ="center" style ="padding-top: 0.4vh;">
                <h4 style ="font-weight: 600;">MOJA NAROČILA</h4>
            </div>
    
            <div class ="overflow-auto profilVsebnik" style="padding: 7%;">
            
                <div class = "row justify-content-center">
                    <h5 style ="font-weight:600; color: rgba(89,145,144,1);">ODDANA NAROČILA</h5> 
                </div>

                <div class = "row ">
                    <div class = "col-lg-12 overflow-auto narocila" 
                    style ="background-color: rgba(0,0,0,0); border-style: solid; border-width:1px; border-color: rgba(89,145,144,1);
                    box-shadow: 0px 0px 8px rgba(89,145,144,0.4);">
                    <?php  foreach ($narocila as $narocilo): ?>
                       <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["potrjeno"] == 0):?>
                                <h6>ID naročila: <?= $narocilo[$i]["idNaročila"]?></h6>
                                IZDELKI: 
                                <?php 
                
                                    $id["idNarocila"] = $narocilo[$i]["idNaročila"];
                                    $Artikli = eshopDB::getNarociloArtikli($id); 
                                    #var_dump($Artikli);
                                    

                                ?>
                                <?php for($l = 0; $l < count($Artikli); $l++):?>
                                    <?php 
                                        $id["idArtikla"]= $Artikli[$l]["idArtiklaForeign"];
                                        $Artikel = eshopDB::get($id);
                                    ?>

                                    <?= $Artikel["imeArtikla"] ?> (<?= $Artikli[$l]["kolicina"] ?>) 
                                    
                                    <?php endfor;?>
                            <?php endif;?>
                            
                            <h6>Končna cena: <?= $narocilo[$i]["total"] ?> </h6> 
                            <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                       <?php endfor;?>
                       
                    <?php endforeach;?>
                    </div>
                </div>




                <div class = "row justify-content-center" style = "margin-top: 5vh;">
                    <h5 class = "text-success" style ="font-weight:600; color: rgba(89,145,144,1);">POTRJENA NAROČILA</h6> 
                </div>

                <div class = "row">
                <div class = "col-lg-12 overflow-auto narocila" 
                    style ="background-color: rgba(0,0,0,0); border-style: solid; border-width:1px; border-color: #5cb85c ;
                    box-shadow: 0px 0px 8px rgba(92, 184, 92, 0.4) ;">
                    <?php  foreach ($narocila as $narocilo): ?>
                       <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["potrjeno"] == 1):?>
                                <h6>ID naročila: <?= $narocilo[$i]["idNaročila"]?></h6>
                                IZDELKI:
                                <?php 
                
                                    $id["idNarocila"] = $narocilo[$i]["idNaročila"];
                                    $Artikli = eshopDB::getNarociloArtikli($id); 
                                    #var_dump($Artikli);
                                    

                                ?>
                                <?php for($l = 0; $l < count($Artikli); $l++):?>
                                    <?php 
                                        $id["idArtikla"]= $Artikli[$l]["idArtiklaForeign"];
                                        $Artikel = eshopDB::get($id);
                                    ?>

                                    <?= $Artikel["imeArtikla"] ?> (<?= $Artikli[$l]["kolicina"] ?>) 
                                    
                                    <?php endfor;?>
                                    <h7>KONČNA CENA: <?= $narocilo[$i]["total"] ?> </h7> 
                            <?php endif;?>
                            
                            
                       <?php endfor;?>
                       
                    <?php endforeach;?>
                    </div>
                </div>






                <div class = "row justify-content-center" style = "margin-top: 5vh;">
                <h5 class = "text-danger" style ="font-weight:600; color: rgba(89,145,144,1);">ZAVRNJENA NAROČILA</h5> 
                </div>

                <div class = "row">
                <div class = "col-lg-12 overflow-auto narocila" 
                    style ="background-color: rgba(0,0,0,0); border-style: solid; border-width:1px; border-color: rgba(217, 83, 79, 1);
                    box-shadow: 0px 0px 8px rgba(217, 83, 79, 0.4);">
                    <?php  foreach ($narocila as $narocilo): ?>
                       <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["preklicano"] == 1):?>
                                <h6>ID naročila: <?= $narocilo[$i]["idNaročila"]?></h6>
                                IZDELKI: 
                                <?php 
                
                                    $id["idNarocila"] = $narocilo[$i]["idNaročila"];
                                    $Artikli = eshopDB::getNarociloArtikli($id); 
                                    #var_dump($Artikli);
                                    

                                ?>
                                <?php for($l = 0; $l < count($Artikli); $l++):?>
                                    <?php 
                                        $id["idArtikla"]= $Artikli[$l]["idArtiklaForeign"];
                                        $Artikel = eshopDB::get($id);
                                    ?>

                                    <?= $Artikel["imeArtikla"] ?> (<?= $Artikli[$l]["kolicina"] ?>) 
                                    
                                    <?php endfor;?>
                                    <h7>KONČNA CENA: <?= $narocilo[$i]["total"] ?> </h7> 
                            <?php endif;?>
                            
                            
                       <?php endfor;?>
                       
                    <?php endforeach;?>
                    </div>
                </div>





                <!--                      
                <div class = "row justify-content-center"">
                    <h6>STORNIRANA NAROČILA</h6> 
                </div>

                <div class = "row">
                    <div class = "col-lg-12 overflow-auto narocila">
                        FOO-BAR
                    </div>
                </div>
                -->


        
            </div>

        </div>
    </div>
        
</div>
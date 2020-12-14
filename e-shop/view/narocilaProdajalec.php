
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
                <h4 style ="font-weight: 600;">NAROČILA</h4>
            </div>
    
            <div class ="overflow-auto profilVsebnik" style="padding: 7%;">
            
                <div class = "row justify-content-center">
                    <h5 style ="font-weight:600; color: rgba(89,145,144,1);">V ČAKALNI VRSTI</h5> 
                </div>

                <div class = "row ">
                    <div class = "col-lg-12 overflow-auto narocila" 
                    style ="background-color: rgba(0,0,0,0); border-style: solid; border-width:1px; border-color: rgba(89,145,144,1);
                    box-shadow: 0px 0px 8px rgba(89,145,144,0.4); height: 45vh;">
                    <?php  foreach ($narocila as $narocilo): ?>
                       <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["potrjeno"] == 0 && $narocilo[$i]["preklicano"] == 0 ):?>
                                <h5><b>ID naročila:</b> <?= $narocilo[$i]["idNaročila"]?></h5>
                                <h6><b>IZDELKI: </b>
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
                                    <h6><b>Končna cena:</b> <?= $narocilo[$i]["total"] ?> </h6> 
                                    <div class = "row">
                                    <form action = "" method = "POST">
                                        <input type = "hidden" name = "idNarocila" value = "<?= $narocilo[$i]["idNaročila"]?>">
                                        <input type = "hidden" name = "ukaz" value = "potrdi">
                                        <button type="submit" class ="btn btn-success" style = "margin-left: 3vw;">Potrdi</button>

                                    </form>
                                    
                                    
                                    <form action = "" method = "POST">
                                        <input type = "hidden" name = "idNarocila" value = "<?= $narocilo[$i]["idNaročila"]?>">
                                        <input type = "hidden" name = "ukaz" value = "preklici">
                                        <button type="submit" class ="btn btn-danger" style = "margin-left: 1vw;">Prekliči</button>

                                    </form>
                                    </div>
                                    <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                            <?php endif;?>
                            </h6>
                            
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
                    box-shadow: 0px 0px 8px rgba(92, 184, 92, 0.4); height: 45vh;">
                    <?php  foreach ($narocila as $narocilo): ?>
                       <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["potrjeno"] == 1):?>
                                <h5><b>ID naročila:</b> <?= $narocilo[$i]["idNaročila"]?></h5>
                                <h6><b>IZDELKI: </b>
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
                                    <h6><b>Končna cena:</b> <?= $narocilo[$i]["total"] ?> </h6>
                                    <form action = "" method = "POST">
                                        <input type = "hidden" name = "idNarocila" value = "<?= $narocilo[$i]["idNaročila"]?>">
                                        <input type = "hidden" name = "ukaz" value = "storniraj">
                                        <button type="submit" class ="btn " style = "margin-left: 3vw; background-color: rgba(41, 43, 44, 0.5); color: white;">Storniraj</button>

                                    </form> 
                                    <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                            <?php endif;?>
                            </h6>
                            
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
                    box-shadow: 0px 0px 8px rgba(217, 83, 79, 0.4); height: 45vh;">
                    <?php  foreach ($narocila as $narocilo): ?>
                       <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["preklicano"] == 1):?>
                                <h5><b>ID naročila:</b> <?= $narocilo[$i]["idNaročila"]?></h5>
                                <h6><b>IZDELKI: </b>
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
                                    <h6><b>Končna cena:</b> <?= $narocilo[$i]["total"] ?> </h6> 
                            <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                            <?php endif;?>
                            </h6>
                            
                       <?php endfor;?>
                       
                    <?php endforeach;?>
                    </div>
                </div>



                <div class = "row justify-content-center" style = "margin-top: 5vh;">
                <h5  style ="font-weight:600; color: rgba(41, 43, 44, 1) ;">STORNIRANA NAROČILA</h5> 
                </div>

                <div class = "row">
                <div class = "col-lg-12 overflow-auto narocila" 
                    style ="background-color: rgba(0,0,0,0); border-style: solid; border-width:1px; border-color: rgba(41, 43, 44, 1);
                    box-shadow: 0px 0px 8px rgba(41, 43, 44, 0.4); height: 45vh">
                    <?php  foreach ($narocila as $narocilo): ?>
                       <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["stornirano"] == 1):?>
                                <h5><b>ID naročila:</b> <?= $narocilo[$i]["idNaročila"]?></h5>
                                <h6><b>IZDELKI: </b>
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
                                    <h6><b>Končna cena:</b> <?= $narocilo[$i]["total"] ?> </h6> 
                            <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                            <?php endif;?>
                            </h6>
                            
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
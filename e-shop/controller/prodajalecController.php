<?php



require_once("model/eshopDB.php");
require_once("ViewHelper.php");

class prodajalecController {
    public static function prodajalecNarocila() {
        #$idStranke = eshopDB::getStrankaID($_SESSION);
        
        
        #$id["idStranke"] = 1;
       
        $narocila = eshopDB::getNarocilaAll(); # Dobimo vsa naročila
        #var_dump($narocila[0]);
        #exit();
        $Artikli = [];

        

        $ArtikliInfo = [[]];

        
        echo ViewHelper::renderNarocila("view/layout.php", "view/prodajalec/narocilaProdajalec.php", ["narocila" => $narocila], ["imenaNarocil" => $ArtikliInfo]);
        
        
        
    
    }

    public static function prodajalecNarocilaEdit() {
        
        $urejanjeNarocila = filter_input_array(INPUT_POST, self::getRulesUrediNarocilo());
        #var_dump($urejanjeNarocila);
        #exit();

        if($urejanjeNarocila["ukaz"] == "potrdi"){
            eshopDB::potrdiNarocilo($urejanjeNarocila);
        }

        else if($urejanjeNarocila["ukaz"] == "preklici"){
            eshopDB::prekliciNarocilo($urejanjeNarocila);
        }

        else if($urejanjeNarocila["ukaz"] == "storniraj"){
            eshopDB::stornirajNarocilo($urejanjeNarocila);
        }

        ViewHelper::redirect(BASE_URL . "prodajalec/narocila" );
       
        
            
    }


    public static function prodajalecStranke() {
        

        $Stranke = eshopDB::getStranke();


        
        echo ViewHelper::render("view/layout.php", "view/prodajalec/prodajalecStranke.php", ["Stranke" => $Stranke]);
        
        
        
    
    }

    public static function prodajalecStrankeEdit() {
        
        $urejanjeStranke = filter_input_array(INPUT_POST, self::getRulesUrediStranko());
        #var_dump($urejanjeNarocila);
        #exit();

        if($urejanjeStranke["ukaz"] == "deaktiviraj"){
            eshopDB::deaktivirajStranko($urejanjeStranke);
        }

        else if($urejanjeStranke["ukaz"] == "aktiviraj"){
            eshopDB::aktivirajStranko($urejanjeStranke);
        }

        else if($urejanjeStranke["ukaz"] == "storniraj"){
            eshopDB::stornirajNarocilo($urejanjeStranke);
        }

        ViewHelper::redirect(BASE_URL . "prodajalec/stranke" );
       
        
            
    }

    public static function prodajalecProfil() {
        
        
        echo ViewHelper::render("view/layout.php", "view/prodajalec/profilProdajalec.php", ["Stranke" => $Stranke]);
       
        
            
    }

    public static function prodajalecProfilSubmit() {
        $rules = self::getRulesEditProfil();
        
        
   
        
        
        
       
        $data = filter_input_array(INPUT_POST, $rules);
        #var_dump($data);
        #exit();

        
       
        
        if($data["geslo"] != NULL){
            #$mail = [$data["mailStranke"]];
            $input["uporabniskoIme"] = $_SESSION["prodajalec"];
            $Prodajalec = eshopDB::getProdajalec($input);
            
            
            $input["geslo"] = password_hash($data["geslo"], PASSWORD_BCRYPT);
            

            if(password_verify($data["trenutnoGeslo"], $Prodajalec[0]["geslo"])){
                #$_SESSION["stranka"] = $data["mailStranke"];
                eshopDB::urejanjeGeslaProdajalec($input);
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );

                #exit();

            #exit();
            }else{
                $err = "Vnešeno geslo je napačno";
                echo ViewHelper::renderRegError("view/layout.php", "view/prodajalec/profilProdajalec.php", $values, $err);
            }

        }

        if($data["uporabniskoIme"] != NULL){
            
           
            
            $input["uporabniskoIme"] = $_SESSION["prodajalec"];
            $input["novoUporabniskoIme"] = $data["uporabniskoIme"];
            

           
                eshopDB::urejanjeUporabniskegaImena($input);
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );



        }



       
     
    }
    


    public static function prodajalecVpis($values = [
        "uporabiskoIme" => "",
        "geslo" => "",
    ]) {
        $err = "";
        echo ViewHelper::renderRegError("view/layout.php", "view/prodajalec/vpisProdajalec.php", $values, $err);
    }

    public static function prodajalecVpisSubmit() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracija());

        #var_dump($data);
        #exit();
        
        
        
       
     
        #$mail = [$data["mailStranke"]];
        $Prodajalec = eshopDB::getProdajalec($data);
        #var_dump($Prodajalec[0]["geslo"]);
        #exit();
        
       

        if(password_verify($data["geslo"], $Prodajalec[0]["geslo"])){
                if($Prodajalec[0]["aktiviran"] == 1){
                    session_destroy();
                    session_regenerate_id();
                    session_start();
                    $_SESSION["prodajalec"] = $data["uporabniskoIme"];
                    $_SESSION["tipUporabnika"] = "prodajalec";
                    echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
                } else{
                    $err = "Vaš račun je bil deaktiviran!";
                    echo ViewHelper::renderRegError("view/layout.php", "view/prodajalec/vpisProdajalec.php", $values, $err);
                }
           

        
        }else{
            $err = "Uporabniško ime in geslo se ne ujemata";
            echo ViewHelper::renderRegError("view/layout.php", "view/prodajalec/vpisProdajalec.php", $values, $err);
        }

        
        

        
        /*
        else if (self::checkValues($data)) {
            $id = eshopDB::insert($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina");
            
        } else {
            self::addForm($data);
        }*/
    }



    
    

    public static function addForm($values = [
        "imeArtikla" => "",
        "cenaArtikla" => "",
        "opisArtikla" => "",
        "kategorijaArtikla" => "",
        "zalogaArtikla" => "",
    ]) {
        echo ViewHelper::render("view/layout.php", "view/prodajalec/dodajArtikel.php", $values);
    }

    
    public static function add() {
        $data = filter_input_array(INPUT_POST, self::getRules());
        
        
        if (self::checkValues($data)) {

            
 
                // Count total files
                $countfiles = count($_FILES['file']['name']);
                
                $fileNames = [$countfiles];

                // Looping all files
                for($i=0;$i<$countfiles;$i++){

                    $filename = $_FILES['file']['name'][$i];
                    $text = explode('.', $fileName);
                    $fileExt = strtolower(end($text));
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    $fileNames[$i] = $filename;
                    /*
                    $check = getimagesize($_FILES["file"]["tmp_name"][$i]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                        } else {
                            #echo "File is not an image.";
                            echo ViewHelper::render("view/layout.php", "view/prodajalec/dodajArtikel.php", $values);
                            $uploadOk = 0;
                    }

                    if ($_FILES["file"]["size"][$i] > 500000) {
                        #echo "Sorry, your file is too large.";
                        echo ViewHelper::render("view/layout.php", "view/prodajalec/dodajArtikel.php", $values);
                        $uploadOk = 0;
                    }

                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" ) {
                            #echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            echo ViewHelper::render("view/layout.php", "view/prodajalec/dodajArtikel.php", $values);
                            $uploadOk = 0;
                        }
                    
                    */
                    
                    // Upload file
                    #$fileNameNew = uniqid('', true).".".$fileExt;
                    move_uploaded_file($_FILES['file']['tmp_name'][$i],'/home/miha/programming/h/EP-seminarska-naloga/e-shop/static/images/products/'.$filename);
                    
                    
                
                }
                #var_dump($fileNames);
                #exit();
                
            
            
            $id = eshopDB::insert($data);
            
            eshopDB::insertImage()
            
            echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
            
        } else {
            self::addForm($data);
        }
    }

    public static function editForm($Artikel = []) {
        if (empty($Artikel)) {
            $rules = [
                "idArtikla" => [
                    'filter' => FILTER_VALIDATE_INT,
                    'options' => ['min_range' => 1]
                ]
            ];

            $data = filter_input_array(INPUT_GET, $rules);

            if (!self::checkValues($data)) {
                throw new InvalidArgumentException();
            }

            $Artikel = eshopDB::get($data);
        }

        echo ViewHelper::render("view/layout.php", "view/prodajalec/urediArtikel.php", ["Artikel" => $Artikel]);
    }

    public static function edit() {
        $rules = self::getRulesEdit();
        
        
   
        $rules["idArtikla"] = [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1]
        ];

        
        
       
        $data = filter_input_array(INPUT_POST, $rules);
        #var_dump($data);
        #exit();
       
        if (self::checkValues($data)) {
            eshopDB::update($data);
            ViewHelper::redirect(BASE_URL . "" );
        } else {
           
            
            self::editForm($data);
            
        }
    }

    public static function deaktiviraj() {
        $rules = [
            'delete_confirmation' => FILTER_REQUIRE_SCALAR,
            'idArtikla' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];
        $data = filter_input_array(INPUT_POST, $rules);
        
        if (self::checkValues($data)) {
            eshopDB::delete($data);
            $url = BASE_URL;
        } else {
            if (isset($data["id"])) {
                $url = BASE_URL . "artikel/uredi?id=" . $data["id"];
            } else {
                $url = BASE_URL;
            }
        }

        ViewHelper::redirect($url);
    }

    public static function aktiviraj() {
        $rules = [
            'delete_confirmation' => FILTER_REQUIRE_SCALAR,
            'idArtikla' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];
        $data = filter_input_array(INPUT_POST, $rules);
        
        if (self::checkValues($data)) {
            eshopDB::aktiviraj($data);
            $url = BASE_URL;
        } else {
            if (isset($data["id"])) {
                $url = BASE_URL . "artikel/uredi?id=" . $data["id"];
            } else {
                $url = BASE_URL;
            }
        }

        ViewHelper::redirect($url);
    }


    public static function urediStranko() {
        echo ViewHelper::render("view/layout.php", "view/prodajalec/urediStranko.php");
    }

    public static function urediStrankoSubmit() {
        $rules = self::getRulesEditProfil();
        
        
   
        
        
        
       
        $data = filter_input_array(INPUT_POST, $rules);
        #var_dump($data["mailStranke"], $_SESSION);
        #exit();

        var_dump($data);
       
        
        eshopDB::spremeniNaslovStranke($data);

        echo ViewHelper::redirect(BASE_URL. "prodajalec/stranke");
       
     
    }

    public static function editProfilNaslov() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracijaStranka());

        
        # Preverimo, če je email naslov ustrezen
       
        $data["mailStranke"] = $_SESSION["mailStranke"];
        
        
       
            #var_dump($data);
            #exit();
        eshopDB::urediNaslov($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina");
            
      
    }

    /**
     * Returns TRUE if given $input array contains no FALSE values
     * @param type $input
     * @return type
     */
    private static function checkValues($input) {
        if (empty($input)) {
            return FALSE;
        }

        $result = TRUE;
        foreach ($input as $value) {
            $result = $result && $value != false;
        }

        return $result;
    }

    /**
     * Returns an array of filtering rules for manipulation books
     * @return type
     */
    private static function getRules() {
        return [
            'imeArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'cenaArtikla' => FILTER_VALIDATE_FLOAT,
            'opisArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'kategorijaArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'zalogaArtikla' => FILTER_VALIDATE_FLOAT,
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    

    private static function getRulesEdit() {
        return [
            'imeArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'cenaArtikla' => FILTER_VALIDATE_FLOAT,
            'opisArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'kategorijaArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'zalogaArtikla' => FILTER_VALIDATE_FLOAT,
    
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesRegistracija() {
        return [
            'imeStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'priimekStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'mailStranke' => FILTER_SANITIZE_EMAIL,
            'gesloStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'gesloPonovi' => FILTER_SANITIZE_SPECIAL_CHARS,
            'uporabniskoIme' => FILTER_SANITIZE_SPECIAL_CHARS,
            'geslo' => FILTER_SANITIZE_SPECIAL_CHARS,
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesEditProfil() {
        return [
            'gesloStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'trenutnoGeslo' => FILTER_SANITIZE_SPECIAL_CHARS,
            'mailStranke' => FILTER_SANITIZE_EMAIL,
            'uporabniskoIme' => FILTER_SANITIZE_EMAIL,
            'geslo' => FILTER_SANITIZE_SPECIAL_CHARS,
            "hisnaSt" => FILTER_SANITIZE_SPECIAL_CHARS,
            "ulica" => FILTER_SANITIZE_SPECIAL_CHARS,
            "posta" => FILTER_SANITIZE_SPECIAL_CHARS,
            "postnaSt" => FILTER_VALIDATE_INT,
            "idStranke" => FILTER_VALIDATE_INT,
            
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesOddajNarocilo() {
        return [
            'total' => FILTER_VALIDATE_FLOAT,
            
            
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesUrediNarocilo() {
        return [
            'idNarocila' => FILTER_VALIDATE_INT,
            'ukaz' => FILTER_SANITIZE_SPECIAL_CHARS
            
            
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesUrediStranko() {
        return [
            'idStranke' => FILTER_VALIDATE_INT,
            'ukaz' => FILTER_SANITIZE_SPECIAL_CHARS,
            "hisnaSt" => FILTER_SANITIZE_SPECIAL_CHARS,
            "ulica" => FILTER_SANITIZE_SPECIAL_CHARS,
            "posta" => FILTER_SANITIZE_SPECIAL_CHARS,
            "postnaSt" => FILTER_VALIDATE_INT,
            
            
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesRegistracijaStranka() {
        return [
            'imeStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'priimekStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'mailStranke' => FILTER_SANITIZE_EMAIL,
            'gesloStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'gesloPonovi' => FILTER_SANITIZE_SPECIAL_CHARS,
            "hisnaSt" => FILTER_SANITIZE_SPECIAL_CHARS,
            "ulica" => FILTER_SANITIZE_SPECIAL_CHARS,
            "posta" => FILTER_SANITIZE_SPECIAL_CHARS,
            "postnaSt" => FILTER_VALIDATE_INT,
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    

    
}

?>
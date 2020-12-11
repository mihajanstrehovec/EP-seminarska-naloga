<?php

session_start();

require_once("model/eshopDB.php");
require_once("ViewHelper.php");

class eshopController {

    public static function index() {
            
      
            
            

        
            $Artikli = eshopDB::getAll();
         

                
          

           
       
            echo ViewHelper::render("view/layout.php", "view/trgovina.php", [
                "Artikli" => $Artikli
            ]);
        
    }

    
    
    public static function artikel() {
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
            echo ViewHelper::render("view/layout.php", "view/artikel.php", [
                "Artikel" => $Artikel
            ]);
        
    }
    
    

    public static function addForm($values = [
        "imeArtikla" => "",
        "cenaArtikla" => "",
        "opisArtikla" => "",
        "kategorijaArtikla" => "",
        "zalogaArtikla" => "",
    ]) {
        echo ViewHelper::render("view/layout.php", "view/dodajArtikel.php", $values);
    }

    
    public static function add() {
        $data = filter_input_array(INPUT_POST, self::getRules());
        
        if (self::checkValues($data)) {
            $id = eshopDB::insert($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
            
        } else {
            self::addForm($data);
        }
    }
    public static function izpisi() {
        
        session_destroy();
        echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
            
        
    }


    public static function registracijaForm($values = [
        "email" => "",
        "uIme" => "",
        "geslo" => "",
        "ime" => "",
        "priimek" => "",
    ]) {
        $err = "";
        echo ViewHelper::renderRegError("view/layout.php", "view/register.php", $values, $err);
    }

    public static function registracijaSubmit() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracija());


        # Preverimo, če je email naslov ustrezen
        if(!filter_var($data['mailStranke'], FILTER_VALIDATE_EMAIL)){
           
            $err = "Prosimo vnesite validen e-mail";
            echo ViewHelper::renderRegError("view/layout.php", "view/register.php", $values, $err);
            
        }
        
        # Preverimo, če se gesli ujemata
        else if($data["gesloStranke"] != $data["gesloPonovi"]){
            
            $err = "Gesli se ne ujemata";
            echo ViewHelper::renderRegError("view/layout.php", "view/register.php", $values, $err);
           
        }

        
        
        else if (self::checkValues($data)) {
            
            $id = eshopDB::ustvariStranko($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina");
            
        } else {
            self::addForm($data);
        }
    }


    public static function vpisForm($values = [
        "mailStranke" => "",
        "gesloStranke" => "",
    ]) {
        $err = "";
        echo ViewHelper::renderRegError("view/layout.php", "view/vpis.php", $values, $err);
    }

    public static function vpisSubmit() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracija());


        # Preverimo, če je email naslov ustrezen
        if(!filter_var($data['mailStranke'], FILTER_VALIDATE_EMAIL)){
           
            $err = "Prosimo vnesite veljaven e-pošta naslov";
            echo ViewHelper::renderRegError("view/layout.php", "view/vpis.php", $values, $err);
            
        }
        
        # Preverimo, če se gesli ujemata
        $rules = [
            "mailStranke" => [
                'filter' => FILTER_VALIDATE_EMAIL,
                
            ]
        ];

        $mail = filter_input_array(INPUT_POST, $rules);
     
        #$mail = [$data["mailStranke"]];
        $Stranka = eshopDB::getStranka($mail);
        
       

        if($data["gesloStranke"] == $Stranka[0]["gesloStranke"]){
            $_SESSION["stranka"] = $data["mailStranke"];
            echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);

        exit();
        }else{
            var_dump("NONO");
            exit();
        }

        
        

        
        /*
        else if (self::checkValues($data)) {
            $id = eshopDB::insert($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina");
            
        } else {
            self::addForm($data);
        }*/
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

        echo ViewHelper::render("view/layout.php", "view/urediArtikel.php", ["Artikel" => $Artikel]);
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

    public static function profil() {
        echo ViewHelper::render("view/layout.php", "view/profil.php");
    }
    

    public static function delete() {
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

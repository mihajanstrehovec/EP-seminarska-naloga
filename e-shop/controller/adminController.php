<?php



require_once("model/eshopDB.php");
require_once("ViewHelper.php");

class adminController {

    public static function seznamProdajalcev(){

            $Prodajalci = eshopDB::getProdajalci();

            echo ViewHelper::render("view/layout.php", "view/admin/seznamProdajalcev.php", ["Prodajalci" => $Prodajalci]);
    
    }

    public static function seznamProdajalcevEdit(){

        $urejanjeProdajalca = filter_input_array(INPUT_POST, self::getRulesUrediProdajalca());
        #var_dump($urejanjeNarocila);
        #exit();

        if($urejanjeProdajalca["ukaz"] == "deaktiviraj"){
            eshopDB::deaktivirajProdajalca($urejanjeProdajalca);
        }

        else if($urejanjeProdajalca["ukaz"] == "aktiviraj"){
            eshopDB::aktivirajProdajalca($urejanjeProdajalca);
        }

       

        ViewHelper::redirect(BASE_URL . "admin/prodajalci" );
       
        
            
    }



    public static function urediProdajalcaForm(){
        
        

        echo ViewHelper::render("view/layout.php", "view/admin/urediProdajalca.php");

    }

    public static function urediProdajalcaSubmit(){
        
        $rules = self::getRulesEditProfil();
        
        $data = filter_input_array(INPUT_POST, $rules);

        #var_dump($data);
        #exit();

        if($data["geslo"] != NULL){
            #$mail = [$data["mailStranke"]];
            $input["idProdajalca"] = $data["idProdajalca"];
            
            $Prodajalec = eshopDB::getProdajalecByID($input);
            
            
            $input["geslo"] = $data["geslo"];
            

            if($data["trenutnoGeslo"] == $Prodajalec[0]["geslo"]){
                #$_SESSION["stranka"] = $data["mailStranke"];
                eshopDB::urejanjeGeslaProdajalecID($input);
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );

                #exit();

            #exit();
            }else{
                $err = "Vnešeno geslo je napačno";
                echo ViewHelper::renderRegError("view/layout.php", "view/admin/urediProdajalca.php", $values, $err);
            }

        }

        
        if($data["uporabniskoIme"] != NULL){
            
           
            
            
            $input["ime"] = $data["uporabniskoIme"];
            $input["id"] = $data["idProdajalca"];
            

           
                eshopDB::urejanjeUporabniskegaImenaP($input);
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );



        }

    }
    
    public static function ustvariProdajalcaForm(){
        
    }

    public static function ustvariProdajalcaSubmit(){
        
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
            'idStranke' => FILTER_VALIDATE_INT,
            'idProdajalca' => FILTER_VALIDATE_INT,
            
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

    private static function getRulesUrediProdajalca() {
        return [
            'idProdajalca' => FILTER_VALIDATE_INT,
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


   


    

}

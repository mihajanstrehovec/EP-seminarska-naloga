<?php

require_once("model/eshopDB.php");
require_once("ViewHelper.php");

class eshopController {

    public static function index() {
        $rules = [
            "id" => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];

        $data = filter_input_array(INPUT_GET, $rules);

        if (self::checkValues($data)) {
            echo ViewHelper::render("view/layout.php", "view/book-detail.php", [
                "Artikli" => eshopDB::getAll()
            ]);
            
        } else {
            echo ViewHelper::render("view/layout.php", "view/trgovina.php", [
                "Artikli" => eshopDB::getAll()
            ]);
        }
    }

    public static function addForm($values = [
        "imeArtikla" => "",
        "cenaArtikla" => "",
        "opisArtikla" => "",
        "zalogaArtikla" => "",
    ]) {
        echo ViewHelper::render("view/layout.php", "view/dodajArtikel.php", $values);
    }

    public static function add() {
        $data = filter_input_array(INPUT_POST, self::getRules());

        if (self::checkValues($data)) {
            $id = eshopDB::insert($data);
            echo ViewHelper::redirect(BASE_URL. "/artikel/dodaj"/*. "books?id=" . $id*/);
        } else {
            echo ("ne radi");
        }
    }

    public static function editForm($book = []) {
        /*if (empty($book)) {
            $rules = [
                "id" => [
                    'filter' => FILTER_VALIDATE_INT,
                    'options' => ['min_range' => 1]
                ]
            ];

            $data = filter_input_array(INPUT_GET, $rules);

            if (!self::checkValues($data)) {
                #throw new InvalidArgumentException();
            }

            $book = BookDB::get($data);
        }*/

        echo ViewHelper::render("view/layout.php", "view/urediArtikel.php", /*["book" => $book]*/);
    }

    public static function edit() {
        $rules = self::getRules();
        $rules["id"] = [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1]
        ];
        $data = filter_input_array(INPUT_POST, $rules);

        if (self::checkValues($data)) {
            BookDB::update($data);
            ViewHelper::redirect(BASE_URL . "books?id=" . $data["id"]);
        } else {
            self::editForm($data);
        }
    }

    public static function delete() {
        $rules = [
            'delete_confirmation' => FILTER_REQUIRE_SCALAR,
            'id' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];
        $data = filter_input_array(INPUT_POST, $rules);

        if (self::checkValues($data)) {
            BookDB::delete($data);
            $url = BASE_URL . "books";
        } else {
            if (isset($data["id"])) {
                $url = BASE_URL . "books/edit?id=" . $data["id"];
            } else {
                $url = BASE_URL . "books";
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
            'opisArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'cenaArtikla' => FILTER_VALIDATE_FLOAT,
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

}

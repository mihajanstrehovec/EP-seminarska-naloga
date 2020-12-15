<?php

// enables sessions for the entire app
session_start();

require_once("controller/eshopController.php");
require_once("controller/prodajalecController.php");
require_once("controller/strankaController.php");
require_once("controller/adminController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");
define("JS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/JS/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

  /*Uncomment to see the contents of variables
  var_dump(BASE_URL);
  var_dump(IMAGES_URL);
  var_dump(CSS_URL);
  var_dump($path);
  exit();*/

// ROUTER: defines mapping between URLS and controllers
$urls = [
    "trgovina" => function () {
        eshopController::index();
    },
    "artikel" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            eshopController::dodajVkosarico();
        } else {
            eshopController::artikel();
        }
    },
    "artikel/dodaj" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            prodajalecController::add();
        } else {
            prodajalecController::addForm();
        }
    },
    "uporabnik/registracija" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            strankaController::registracijaSubmit();
        } else {
            strankaController::registracijaForm();
        }
    },
    "uporabnik/vpis" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            strankaController::vpisSubmit();
        } else {
            strankaController::vpisForm();
        }
    },
    "artikel/uredi" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            prodajalecController::edit();
        } else {
            prodajalecController::editForm();
        }
    },
    "artikel/izbrisi" => function () {
        prodajalecController::deaktiviraj();
    },
    "artikel/aktiviraj" => function () {
        prodajalecController::aktiviraj();
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "trgovina");
    },
    "izpisi" => function () {
        eshopController::izpisi();
    },
    "profil" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            strankaController::editProfil();
        } else {
            strankaController::profil();
        }
    },
    "profil/posodobiNaslov" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            strankaController::editProfilNaslov();
        } else {
            strankaController::index();
        }
    },
    "izprazni" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            strankaController::dodajVkosarico();
        } else {
            strankaController::index();
        }
    },
    "zakljucekNakupa" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            strankaController::oddajNarocilo();
        } else {
            strankaController::zakljucekNakupa();
        }
    },
    "profil/narocila" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            strankaController::oddajNarocilo();
        } else {
            strankaController::mojaNarocila();
        }
    },
    "prodajalec/narocila" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            prodajalecController::prodajalecNarocilaEdit();
        } else {
            prodajalecController::prodajalecNarocila();
        }
    },
    "prodajalec/stranke" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            prodajalecController::prodajalecStrankeEdit();
        } else {
            prodajalecController::prodajalecStranke();
        }
    },
    "prodajalec/vpis" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            prodajalecController::prodajalecVpisSubmit();
        } else {
            prodajalecController::prodajalecVpis();
        }
    },
    "prodajalec/profil" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            prodajalecController::prodajalecProfilSubmit();
        } else {
            prodajalecController::prodajalecProfil();
        }
    },
    "prodajalec/urediStranko" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            prodajalecController::urediStrankoSubmit();
        } else {
            prodajalecController::urediStranko();
        }
    },
    "admin/prijava" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            adminController::adminPrijavaSubmit();
        } else {
            adminController::adminPrijavaForm();
        }
    },
    "admin/prodajalec/uredi" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            adminController::urediProdajalcaSubmit();
        } else {
            adminController::urediProdajalcaForm();
        }
    },
    "admin/prodajalec/ustvari" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            adminController::ustvariProdajalcaSubmit();
        } else {
            adminController::ustvariProdajalcaForm();
        }
    },
    "admin/prodajalci" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            adminController::seznamProdajalcevEdit();
        } else {
            adminController::seznamProdajalcev();
        }
    },
    "admin/spremeni-geslo" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            adminController::spremeniGesloSubmit();
        } else {
            adminController::spremeniGeslo();
        }
    }
];

try {
    if (isset($urls[$path])) {
        $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (InvalidArgumentException $e) {
    ViewHelper::error404();
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
} 

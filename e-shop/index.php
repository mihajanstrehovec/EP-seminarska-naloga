<?php

// enables sessions for the entire app
session_start();

require_once("controller/eshopController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

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
        eshopController::artikel();
    },
    "artikel/dodaj" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            eshopController::add();
        } else {
            eshopController::addForm();
        }
    },
    "uporabnik/registracija" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            eshopController::registracijaSubmit();
        } else {
            eshopController::registracijaForm();
        }
    },
    "uporabnik/vpis" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            eshopController::vpisSubmit();
        } else {
            eshopController::vpisForm();
        }
    },
    "artikel/uredi" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            eshopController::edit();
        } else {
            eshopController::editForm();
        }
    },
    "artikel/izbrisi" => function () {
        eshopController::delete();
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "trgovina");
    },
    "izpisi" => function () {
        eshopController::izpisi();
    },
    "profil" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            eshopController::editProfil();
        } else {
            eshopController::profil();
        }

        
    },
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

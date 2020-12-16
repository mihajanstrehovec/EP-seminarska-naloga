<?php
require_once("model/eshopDB.php");
require_once("view/restViewHelper.php");
class eShopRestControler {
    
    public static function index() {
            
        echo restViewHelper::renderJSON(eshopDB::getAll());
    }
}
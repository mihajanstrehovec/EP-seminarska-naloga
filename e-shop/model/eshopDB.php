<?php

// Kot db Artikel -> uzame form inpute in z njimi dela ukaze na db

require_once 'model/AbstractDB.php';

class eshopDB extends AbstractDB {

    public static function insert(array $params) {
        return parent::modify("INSERT INTO Artikel (imeArtikla, cenaArtikla, opisArtikla, kategorijaArtikla, zalogaArtikla) "
                        . " VALUES (:imeArtikla, :cenaArtikla, :opisArtikla, :kategorijaArtikla, :zalogaArtikla)", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE Artikel SET imeArtikla = :imeArtikla, cenaArtikla = :cenaArtikla, "
                        . "opisArtikla = :opisArtikla, zalogaArtikla = :zalogaArtikla, kategorijaArtikla = :kategorijaArtikla"
                        . " WHERE idArtikla = :idArtikla", $params); 
    }

    

    public static function delete(array $id) {
        return parent::modify("DELETE FROM Artikel WHERE idArtikla = :idArtikla", $id);
    }

    public static function get(array $id) {
        $books = parent::query("SELECT idArtikla, imeArtikla, cenaArtikla, opisArtikla, zalogaArtikla, kategorijaArtikla"
                        . " FROM Artikel"
                        . " WHERE idArtikla = :idArtikla", $id);
        
        if (count($books) == 1) {
            return $books[0];
        } else {
            throw new InvalidArgumentException("No such book");
        }
    }

    public static function getStranka(array $mailStranke) {
        
        $Stranka = parent::query("SELECT gesloStranke"
                        . " FROM Stranka"
                        . " WHERE mailStranke = :mailStranke", $mailStranke);
        
        return($Stranka);
    }


    public static function getAll() {
        return parent::query("SELECT idArtikla, imeArtikla, cenaArtikla, opisArtikla, kategorijaArtikla, zalogaArtikla"
                        . " FROM Artikel"
                        . " ORDER BY idArtikla DESC");
    }

    public static function getKategorija(array $kategorijaArtikla) {
        return parent::query("SELECT idArtikla, imeArtikla, cenaArtikla, opisArtikla, kategorijaArtikla, zalogaArtikla"
                        . " FROM Artikel"
                        . " WHERE kategorijaArtikla = :kategorijaArtikla", $kategorijaArtikla
                        . " ORDER BY idArtikla DESC");
    }

    public static function ustvariStranko(array $params) {
        return parent::modify("INSERT INTO Stranka (imeStranke, priimekStranke, mailStranke, gesloStranke) "
                        . " VALUES (:imeStranke, :priimekStranke, :mailStranke, :gesloStranke)", $params);
    }

}

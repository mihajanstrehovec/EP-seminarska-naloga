<?php

// Kot db Artikel -> uzame form inpute in z njimi dela ukaze na db

require_once 'model/AbstractDB.php';

class eshopDB extends AbstractDB {

    public static function insert(array $params) {
        return parent::modify("INSERT INTO Artikel (imeArtikla, cenaArtikla, opisArtikla, kategorijaArtikla, zalogaArtikla) "
                        . " VALUES (:imeArtikla, :cenaArtikla, :opisArtikla, :kategorijaArtikla, :zalogaArtikla)", $params);
    }

    public static function insertNarocilo(array $params) {
        return parent::modify("INSERT INTO Naročilo (idStranke, total, potrjeno) "
                        . " VALUES (:idStranke, :total, :potrjeno)", $params);
    }

    public static function insertNarociloArtikel(array $params) {
        return parent::modify("INSERT INTO Narocilo_artikli (idArtiklaForeign, idNarocilaForeign, kolicina) "
                        . " VALUES (:idArtiklaForeign, :idNarocilaForeign, :kolicina)", $params);
    }

    public static function getNarocila(array $idStranke) {
        
        $Narocila = parent::query("SELECT idNaročila, total, potrjeno"
                        . " FROM Naročilo"
                        . " WHERE idStranke = :idStranke", $idStranke);
        
        return($Narocila);
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

    public static function getStrankaID(array $mailStranke) {
        
        $Stranka = parent::query("SELECT idStranke"
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

    public static function urejanjeGesla(array $params) {
        return parent::modify("UPDATE Stranka SET gesloStranke = :gesloStranke"
                        . " WHERE mailStranke = :mailStranke", $params); 
    }

    public static function urejanjeMaila(array $params) {
        return parent::modify("UPDATE Stranka SET mailStranke = :noviMailStranke"
                        . " WHERE mailStranke = :mailStranke", $params); 
    }

    ##vse v zvezi s prodajalcem 
    #ustvari prasico prodajalsko
    public static function ustvariProdajalca(array $params) {
        return parent::modify("INSERT INTO Prodajalec (uporabniskoime, eMail,geslo)"
                        . " VALUES (:uporabniskoIme,:eMail,:geslo)", $params);
    }


}

<?php

// Kot db Artikel -> uzame form inpute in z njimi dela ukaze na db

require_once 'model/AbstractDB.php';

class eshopDB extends AbstractDB {

    public static function insert(array $params) {
        return parent::modify("INSERT INTO Artikel (imeArtikla, cenaArtikla, opisArtikla, zalogaArtikla) "
                        . " VALUES (:imeArtikla, :cenaArtikla, :opisArtikla, :zalogaArtikla)", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE book SET author = :author, title = :title, "
                        . "description = :description, price = :price, year = :year"
                        . " WHERE id = :id", $params); 
    }

    public static function delete(array $id) {
        return parent::modify("DELETE FROM book WHERE id = :id", $id);
    }

    public static function get(array $id) {
        $books = parent::query("SELECT id, author, title, description, price, year"
                        . " FROM book"
                        . " WHERE id = :id", $id);
        
        if (count($books) == 1) {
            return $books[0];
        } else {
            throw new InvalidArgumentException("No such book");
        }
    }

    public static function getAll() {
        return parent::query("SELECT idArtikla, imeArtikla, cenaArtikla, opisArtikla, zalogaArtikla"
                        . " FROM Artikel"
                        . " ORDER BY idArtikla ASC");
    }

}

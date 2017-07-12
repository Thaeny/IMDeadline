<?php
abstract class Db {

    private static $conn = NULL;

    public static function getInstance(){

        if(isset(self::$conn)) {
            //er is al connectie, geef terug
            return self::$conn;

        }
        else {
            //er is nog geen connectie, maak aan en geef terug
            self::$conn = new PDO('mysql:host=localhost;dbname=IMDeadline', "root", "root");
            return self::$conn;
        }
    }

}
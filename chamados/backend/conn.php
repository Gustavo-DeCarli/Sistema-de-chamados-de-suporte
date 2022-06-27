<?php

class DB {
    static $conn;

    static function getInstance () {
        if (DB::$conn) return DB::$conn;

        DB::$conn = new PDO("mysql:host=127.0.0.1;dbname=teste", "root", "");

        return DB::$conn;
    }
}

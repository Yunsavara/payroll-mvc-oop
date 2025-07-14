<?php

namespace Config {

    use PDO;
    use PDOException;

    class Database {

        public static function getConnection()
        {
            $host = "localhost";
            $port = 3306;
            $database = "db_penggajian_yuniko";
            $username = "root";
            $password = "";

            try {
                $connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Koneksi Berhasil!";
                return $connection;
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

    }
}
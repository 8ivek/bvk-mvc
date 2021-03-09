<?php

namespace Core;

use PDO;
use PDOException;
use App\Config;

abstract class Model
{
    protected static function getDB(): ?PDO
    {
        static $db = null;

        if ($db === null) {
            try {
                $db = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . Config::DB_NAME . ";charset=utf8", Config::DB_USER, Config::DB_PASSWORD);
                // Throw and exception when and error occurs
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $db;
    }
}
<?php

namespace Core;
use PDO;
use PDOException;

abstract class Model
{
    protected static function getDB(): ?PDO
    {
        static $db = null;

        if($db === null) {
            $host = $_ENV['DB_HOST'];
            $dbname = 'bvk_mvc';
            $username = 'root';
            $password = 'secret';

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $db;
    }
}
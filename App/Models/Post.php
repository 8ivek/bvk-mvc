<?php

namespace App\Models;

use PDO;
use PDOException;

class Post
{
    /**
     * @return array
     */
    public static function getAll(): array
    {
        $host = $_ENV['DB_HOST'];
        $dbname = 'bvk_mvc';
        $username = 'root';
        $password = 'secret';

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $statement = $db->query('SELECT `id`, `title`, `content` FROM `posts` ORDER BY `created_at`');
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
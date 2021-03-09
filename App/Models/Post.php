<?php

namespace App\Models;

use Core\Model;
use PDO;
use PDOException;

class Post extends Model
{
    /**
     * @return array
     */
    public static function getAll(): array
    {
        try {
            $db = self::getDB();
            $statement = $db->query('SELECT `id`, `title`, `content` FROM `posts` ORDER BY `created_at`');
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
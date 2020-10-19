<?php

namespace App\Models;
use App\Db;
use App\Model;

class Book extends Model
{
    public const TABLE = 'Books';
    public $bookID;
    public $title;

    public static function getById(Array $res)
    {
        $db = new Db;

        $ids = [];
        foreach ($res as $name) {
            $fields = get_object_vars($name);
            $ids[] = $fields['book_id'];
        }

        $sql = '
            SELECT * 
            FROM ' . static::TABLE . '
            WHERE bookID IN (' . implode(', ', $ids) . ')
        ';
        $resObj = $db->query(
            $sql,
            static::class,
            []
        );

        return implode(', ', array_column($resObj, 'title'));

    }

    public static function createTable()
    {
        $db = new Db;

        $sql = '
            CREATE TABLE ' . static::TABLE . ' (
                `bookID` INT(11) NOT NULL AUTO_INCREMENT,
                `title` VARCHAR(255) NULL
                    DEFAULT NULL COMMENT \'Название книги\',
                PRIMARY KEY (`bookID`)
            )
            COMMENT=\'Названия книг\'
            ENGINE=InnoDB;
        ';

        $db->execute($sql);
    }

    public static function setTable()
    {
        $db = new Db();

        $sql = '
            INSERT INTO ' . static::TABLE . ' VALUES
            (1, \'Капитанская дочка\'),
            (2, \'Мертвые души\'),
            (3, \'Братья Карамазовы\'),
            (4, \'Война и мир\'),
            (5, \'Вишневый сад\');
        ';

        $db->execute($sql);
    }
}
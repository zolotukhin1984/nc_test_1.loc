<?php

namespace App\Models;
use App\Db;
use App\Model;

class Author extends Model
{
    public const TABLE = 'Authors';
    public $authorID;
    public $name;
    public $surname;

    public static function createTable()
    {
        $db = new Db;

        $sql = '
            CREATE TABLE ' . static::TABLE . ' (
                `authorID` INT(11) NOT NULL AUTO_INCREMENT,
                `name` VARCHAR(255) NOT NULL
                    DEFAULT \'\' COMMENT \'Имя Автора\',
                `surname` VARCHAR(255) NULL
                    DEFAULT \'\' COMMENT \'Фамилия Автора\',
                PRIMARY KEY (`authorID`)
            )
            COMMENT=\'Список авторов\'
            ENGINE=InnoDB;
        ';

        $db->execute($sql);
    }

    public static function setTable()
    {
        $db = new Db;

        $sql = '
            INSERT INTO ' . static::TABLE . ' VALUES
            (1, \'Александр\', \'Пушкин\'),
            (2, \'Николай\', \'Гоголь\'),
            (3, \'Федор\', \'Достоевский\'),
            (4, \'Лев\', \'Толстой\'),
            (5, \'Антон\', \'Чехов\');
        ';

        $db->execute($sql);
    }

    public static function getById(array $data)
    {
        // TODO: Implement getById() method.
    }
}
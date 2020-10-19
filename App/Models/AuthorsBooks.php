<?php

namespace App\Models;
use App\Db;
use App\Model;

class AuthorsBooks extends Model
{
    public const TABLE = 'Authors_Books';
    public $author_id;
    public $book_id;
    public static $res;

    public static function getBookId($numAuthors)
    {
        $db = new Db();

        $sql = '
                SELECT * 
                FROM ' . static::TABLE . '
                GROUP BY book_id 
                HAVING COUNT(book_id) = :numAuthors;
         ';

         static::$res = $db->query(
            $sql,
            static::class,
            [':numAuthors' => $numAuthors]
        );
    }

    public static function createTable()
    {
        $db = new Db();

        $sql = '
            CREATE TABLE ' . static::TABLE . ' (
                `author_id` INT(11) NOT NULL,
                `book_id` INT(11) NOT NULL,
                PRIMARY KEY (`author_id`, `book_id`),
                INDEX `author_id` (`author_id`),
                INDEX `book_id` (`book_id`),
                CONSTRAINT `FK_Author` FOREIGN KEY (`author_id`) 
                    REFERENCES `Authors` (`authorID`) ON DELETE CASCADE,
                CONSTRAINT `FK_Book` FOREIGN KEY (`book_id`) 
                    REFERENCES `Books` (`bookID`) ON DELETE CASCADE
            )
            COMMENT=\'Таблица связи авторов и книг\'
            ENGINE=InnoDB;
        ';

        $db->execute($sql);
    }

    public static function setTable()
    {
        $sql_set_authors_books = '
            INSERT INTO ' . static::TABLE . ' VALUES
            (1, 1),
            (2, 2),
            (2, 3),
            (2, 4),
            (3, 2),
            (3, 5),
            (4, 4),
            (4, 5),
            (5, 5);
        ';
        $db = new Db();
        $db->execute($sql_set_authors_books);
    }

    public static function getById(Array $data)
    {
        // TODO: Implement getById() method.
    }
}
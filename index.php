<?php

require __DIR__ . '/App/autoload.php';

//Создать библиотеку книг в БД MySQL. Необходимо хранить названия книг
//и авторов. Предложите структуру таблиц. Написать на скрипт, который
//выведет список книг, где 2 соавтора.

//Need database with 'Library' name

\App\Models\Book::createTable();
\App\Models\Author::createTable();
\App\Models\AuthorsBooks::createTable();

\App\Models\Book::setTable();
\App\Models\Author::setTable();
\App\Models\AuthorsBooks::setTable();

\App\Models\AuthorsBooks::getBookId(2);
echo \App\Models\Book::getById(\App\Models\AuthorsBooks::$res);






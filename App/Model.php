<?php

namespace App;
use App\Db;

abstract class Model
{
    public const TABLE = '';

    abstract public static function getById(Array $data);
    abstract public static function createTable();
    abstract public static function setTable();

}
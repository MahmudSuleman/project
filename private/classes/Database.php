<?php
/**
 * Created by PhpStorm.
 * User: Mahmud Suleman Sheikh Wunname
 * Date: 12/26/2019
 * Time: 3:45 PM
 */

class Database {

    public static function connect()
    {
        $dsn  = "mysql:host=localhost;dbname=project";
//        $dsn = "sqlite:C:/xampp/htdocs/chamtooni/project/sqlite.db";
        return new PDO($dsn, "root","");
    }



} 
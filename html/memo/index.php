<?php

class Db
{
  static $pdo = null;
  static function getPdo()
  {
    $dsm = "mysql:dbname=mydb; host=mysql; charset=utf8;";
    $dbUsername = "root";
    $dbPassword = "root";
    if (null === self::$pdo) {
      try {
        self::$pdo = new PDO($dsm, $dbUsername, $dbPassword);
        p("pdoを生成しました");
      } catch (Exception $e) {
        p($e);
      }
    }
    return self::$pdo;
  }
}

function p($a = "")
{
  echo "<pre>";
  print_r($a);
  echo "</pre>";
}


p("トップページです");
Db::getPdo();
Db::getPdo();
Db::getPdo();

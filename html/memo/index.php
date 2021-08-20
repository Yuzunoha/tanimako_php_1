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

function insert()
{
  $pdo = Db::getPdo();

  $sql = 'insert into my_items set';
  $sql .= ' maker_id=1,';
  $sql .= ' item_name="もも",';
  $sql .= ' price=210,';
  $sql .= ' keyword="缶詰,ピンク,甘い",';
  $sql .= ' sales=0,';
  $sql .= ' created="2018-01-23"';

  $cnt = $pdo->exec($sql);
  p("$cnt 件のデータを挿入しました。");
}

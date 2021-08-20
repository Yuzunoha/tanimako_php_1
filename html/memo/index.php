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

function select()
{
  $db = Db::getPdo();
  $records = $db->query('SELECT * FROM my_items');
  $ret = $records->fetchAll(PDO::FETCH_ASSOC);
  p($ret);
}

function sub()
{
  $db = Db::getPdo();
  // $memo = $_POST['memo'];
  $memo = "てすと";
  $result = $db->exec('insert into memos set memo="' . $memo . '", created_at=NOW()');
  p($result);
}

sub();

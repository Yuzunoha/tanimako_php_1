<?php

function p($a = "")
{
  echo "<pre>";
  print_r($a);
  echo "</pre>";
}

p("トップページです");

$dsm = "mysql:dbname=mydb; host=mysql; charset=utf8;";
$dbUsername = "root";
$dbPassword = "root";

try {
  $db = new PDO($dsm, $dbUsername, $dbPassword);
  p($db);
} catch (Exception $e) {
  p($e);
}

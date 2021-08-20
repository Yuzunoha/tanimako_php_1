<?php

function p($a = "")
{
  echo "<pre>";
  print_r($a);
  echo "</pre>";
}

p("トップページです");

try {
  throw new Exception("ユズノハの例外です");
} catch (Exception $e) {
  p($e);
}

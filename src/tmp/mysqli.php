<?php

$link = mysqli_connect('db','book_log','pass','book_log');
if(!$link){
  echo 'error :';
  echo mysqli_connect_error() . PHP_EOL;
  exit;
}
echo 'データベースに接続不出来ました' . PHP_EOL;

$sql = <<<EOT
INSERT INTO companies (
  )
EOT;

mysqli_query($link,$sql);

mysqli_close($link);
echo 'データベースとの接続を切断しました。' . PHP_EOL;

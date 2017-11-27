<?php
header('Content-Type: text/html; charset=UTF-8');
$dsn = 'mysql:dbname=***;host=localhost';
$user = '***';
$password = '***';

try{
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql  = "CREATE TABLE news(".
  "id int not null auto_increment PRIMARY KEY,".
  "name varchar(16) not null,".
  "comment text,".
  "date datetime not null,".
  "image MEDIUMBLOB,".
  "imagetype text".
  ");";
    $pdo->exec($sql);
    print('接続に成功しました。<br>');
}catch (PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
$pdo = null;
echo 'テーブルの作成をしました';
?>

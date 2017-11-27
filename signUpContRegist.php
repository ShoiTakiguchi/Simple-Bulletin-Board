<?php
header('Content-Type: text/html; charset=UTF-8');
$name = $_POST['name'];
$password = $_POST['password'];
if($name!=null&&$password!=password){
try{
  $dsn = 'mysql:dbname=***;host=localhost';
  $user = '***';
  $pass = '***';
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo -> prepare("INSERT INTO user (id,name,password) VALUES (:id,:name,:password)");
  $stmt->bindValue(':id',0, PDO::PARAM_INT);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
  $stmt->execute();

  } catch (PDOException $e) {
    print ( 'Error:'. $e->getMessage() );
  }
  $pdo = null;
  echo "名前".$name."  パスワード".$password."で登録されました";
}else{
  echo "必要な情報を入力してください";
  if($name==null)
  echo "名前を入力してください";
  if($password==null)
  echo "パスワードは必須入力です";
}
 ?>

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
  $stmt = $pdo -> prepare("SELECT * FROM user where name= ?");
  $stmt->execute(array($name));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($password==$result['password']) {
    session_start();
    $_SESSION['UserID'] = $name;
    $pdo = null;
    header('Location: Top.php');
    exit();
  }else{
    $error = 'ユーザーIDあるいはパスワードに誤りがあります。';
  }
}catch (PDOException $e) {
  print ( 'Error:'. $e->getMessage() );
}
  $pdo = null;
}else{
  echo "必要な情報を入力してください";
  if($name==null)
  echo "名前を入力してください";
  if($password==null)
  echo "パスワードは必須入力です";
}
 ?>

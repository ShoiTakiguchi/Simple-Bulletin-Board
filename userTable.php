<?php
header("Content-type: text/html; charset=utf-8");

$dsn = 'mysql:host=localhost;dbname=***;charset=utf8';
$user = '***';
$password = '***';

try{
	$pdo = new PDO($dsn, $user, $password);
	echo "接続成功";
	$sql = 'SELECT * FROM user';
	$statement = $pdo -> query($sql);
	//レコード件数取得
	$row_count = $statement->rowCount();
	while($row = $statement->fetch()){
		$rows[] = $row;
	}
	foreach ($statement as $row) {
		$rows[] = $row;
	}
	//データベース接続切断
	$pdo = null;
}catch (PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>テーブル:user表示</title>
<meta charset="utf-8">
</head>
<body>
<h1>テーブル:user表示</h1>
レコード件数：<?php echo $row_count; ?>
<table border='1'>
<tr><td>id</td><td>name</td><td>password</td></tr>
<?php
foreach($rows as $row){
?>
<tr>
	<td><?php echo $row['id']; ?></td>
	<td><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['password'],ENT_QUOTES,'UTF-8'); ?></td>
</tr>
<?php
}
?>
</table>
</body>
</html>

<?php
header("Content-type: text/html; charset=utf-8");

$dsn = 'mysql:host=localhost;dbname=***;charset=utf8';
$user = '***';
$password = '***';

try{
	$pdo = new PDO($dsn, $user, $password);
	echo "接続成功";

	$sql = 'SELECT * FROM news';
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
<title>テーブル:news表示</title>
<meta charset="utf-8">
</head>
<body>
<h1>テーブル:news表示</h1>

レコード件数：<?php echo $row_count; ?>

<table border='1'>
<tr><td>id</td><td>name</td><td>comment</td><td>date</td><td>image</td><td>imagetype</td></tr>

<?php
$image_type = array(
     'jpg'  => 'image/jpeg',
     'jpeg' => 'image/jpeg',
     'png'  => 'image/png',
     'gif'  => 'image/gif',
     'bmp'  => 'image/bmp',
 );
foreach($rows as $row){
?>
<tr>
	<td><?php echo $row['id']; ?></td>
	<td><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['comment'],ENT_QUOTES,'UTF-8'); ?></td>
	<td><?php echo htmlspecialchars($row['date'],ENT_QUOTES,'UTF-8'); ?></td>
	<td>
			<p>
				<a href="file_display.php?id=<?php  echo $row['id'];?>&imagetype=<?php echo  $row['imagetype'];?>"><?php echo $row['image'];?></a>
		  </p>
	</td>

	<td><?php echo htmlspecialchars($row['imagetype'],ENT_QUOTES,'UTF-8'); ?></td>

</tr>
</tr>
<?php
}
?>

</table>

</body>
</html>

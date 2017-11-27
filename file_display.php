<?php
 $id = $_REQUEST["id"];
 $dsn = 'mysql:dbname=***;host=localhost';
 $user = '***';
 $password = '***';
 $pdo = new PDO($dsn, $user, $password);
 try{
   $sql = "SELECT * FROM news where id = $id";
   $stmt = $pdo->query($sql);
   foreach($stmt as $row){
     $image=$row['image'];
   }
 }
   catch (PDOException $e){
 }
 $pdo = null;
 function deleteBom($image)
 {
     if (($image== NULL) || (mb_strlen($image) == 0)) {
         return $image;
     }
     if (ord($image{0}) == 0xef && ord($image{1}) == 0xbb && ord($image{2}) == 0xbf) {
         $image = substr($image, 3);
     }
     return $image;
 }
header('Content-type: image/png');
echo $image;
?>

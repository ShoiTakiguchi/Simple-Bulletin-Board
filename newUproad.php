<?php
header('Content-Type: text/html; charset=UTF-8');
$name = $_POST['name'];
$comment = $_POST['comment'];
$date = new DateTime();
$date = $date->format('Y-m-d H:i:s');
echo $name;
echo $comment;
echo $date;
echo $image;
$image = $_POST['image'];
$file=pathinfo($image);
if(strcasecmp("jpg",$file["extension"])==0)
{
     echo "jpg画像です。";
     $imagetype = "jpg";
}
if(strcasecmp("png",$file["extension"])==0)
{
     echo "png画像です。";
     $imagetype = "png";
}
if(strcasecmp("jpeg",$file["extension"])==0)
{
     echo "jpeg画像です。";
     $imagetype = "jpeg";
}
if(strcasecmp("bmp",$file["extension"])==0)
{
     echo "bmp画像です。";
     $imagetype = "bmp";
}
if(strcasecmp("gif",$file["extension"])==0)
{
     echo "gif画像です。";
     $imagetype = "gif";
}
if(strcasecmp("mp4",$file["extension"])==0)
{
     echo "mp4動画です。";
     $imagetype = "mp4";
}
if(strcasecmp("txt",$file["extension"])==0)
{
     echo "テキストです。";
     $imagetype = "txt";
}
echo $imagetype;
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
try{
  $dsn = 'mysql:dbname=co_596_it_3919_com;host=localhost';
  $user = 'co-596.it.3919.c';
  $pass = 'Jjdgui7h';
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo -> prepare("INSERT INTO news (id,name,comment,date,image,imagetype) VALUES (:id,:name,:comment,:date,:image,:imagetype)");
  $stmt->bindValue(':id',0, PDO::PARAM_INT);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
  //$stmt->bindValue(':date', $date->format('Y-m-d-H-i-s'), PDO::PARAM_STR);
  $stmt->bindValue(':date', $date, PDO::PARAM_STR);
  $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
  $stmt->bindParam(':imagetype', $imagetype, PDO::PARAM_STR);
  $stmt->execute();

  } catch (PDOException $e) {
    print ( 'Error:'. $e->getMessage() );
  }
  $pdo = null;
//header('Location: http://co-596.99sv-coco.com/work3/Top.php');

 ?>

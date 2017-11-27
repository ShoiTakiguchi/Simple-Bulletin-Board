<?php
session_start();
// ログインしていない場合にはログインページに遷移
if ($_SESSION["UserID"]==null) {
 header('Location:http://co-596.99sv-coco.com/work3/login.php');
}
 ?>
 <html>
 <head>
   <title>掲示板トップページ</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 </head>
 <style type="text/css">
    a.right{
      display : block; width : 100%; text-align : right;
    }
  </style>
  <a href="http://co-596.99sv-coco.com/work3/logout.php" class="right">ログアウト</a>
  <p align="center" valign="top">掲示板TOP</p><br>
  <br>
  <form action ="newUproad.php" method = "post">
  投稿者名<br>
    <input type ="text" name ="name" value = <?php echo $_SESSION["UserID"];?>><br/>
  コメント<br>
    <input type="text" style="width:200px;height:50px;" name ="comment" size = "10"/><br/>
  <div>
  <label>全般(これ！) : </label>
    <input type='file' name="image" />
     <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
  </div>
  <div>
    <label>image : </label>
    <input type='file' accept='image/*' />
  </div>
  <div>
    <label>audio : </label>
  <input type='file' accept='audio/*' />
  </div>
  <div>
    <label>video : </label>
    <input type='file' accept='video/*' />
  </div>
  <input type="hidden" name="time" value="<?php echo date("Y-m-d-H-i-s"); ?>" />
  <input type ="submit" value = "投稿する"/><br/>
 </form>
 <body>
</html>

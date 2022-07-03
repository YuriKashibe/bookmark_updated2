<?php
//１．PHP
//select.phpの[PHPコードだけ！]をマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET["id"];

include("funcs.php");

//1.  DB接続します
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
    $row = $stmt->fetch(); // 1つのデータを取り出して $rowに格納
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link rel="stylesheet" href="css/style.css">
  <style>div{font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">Keep Track of Your Favorite Books!</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend style="font-size: 25px">Enter details below...</legend>
     <label>Book Title<div style="color: red; font-size: 12px; display: inline-block">(*)</div>：<br><input type="text" name="name" style="margin: 10px 0; width: 299px" value="<?=$row["name"]?>" required></label><br>
     <label>URL<div style="color: red; font-size: 12px; display: inline-block">(*)</div>：<br><textArea name="url" rows="2" cols="40" required><?=$row["URL"]?></textArea></label><br>
     <label>Comment<div style="color: red; font-size: 12px; display: inline-block">(*)</div>：<br><textArea name="comment" rows="4" cols="40" required><?=$row["comment"]?></textArea></label><br>
     <div style="color: red; font-size: 12px; display: inline-block">(*)：required</div><br>
    <!-- idを隠して送信 -->
    <input type="hidden" name="id" value="<?=$row["id"]?>">
    <!-- idを隠して送信 -->
    <input type="submit" value="Send" style="margin: 20px 0">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>





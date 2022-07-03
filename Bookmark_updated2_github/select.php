<?php

session_start();

include("funcs.php");

sschk();

//1.  DB接続します
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  sql_error($stmt);
}else if($_SESSION["kanri_flg"] == 1){
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= `<p class = "result">`;
    // $view .= $res["id"]."<br>".$res["name"]."<br>".$res["URL"]."<br>".$res["comment"]."<br>".$res["date"];
    $view .= '<a href="detail.php?id='.h($res["id"]).'"><br>';
    $view .= h($res["id"])."<br>".h($res["name"])."<br>".h($res["URL"])."<br>".h($res["comment"])."<br>".h($res["date"]);
    $view .= '</a><br>';
    $view .= '<a href="delete.php?id='.h($res["id"]).'">';
    $view .= "[delete]<br>";
    $view .= '</a>';
    $view .= "</p>";
  }
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= `<p class = "result">`;
    // $view .= $res["id"]."<br>".$res["name"]."<br>".$res["URL"]."<br>".$res["comment"]."<br>".$res["date"];
    $view .= h($res["id"])."<br>".h($res["name"])."<br>".h($res["URL"])."<br>".h($res["comment"])."<br>".h($res["date"]);
    $view .= "</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Your Favorites</title>
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Your Favorites</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>

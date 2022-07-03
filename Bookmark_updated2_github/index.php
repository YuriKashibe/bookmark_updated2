<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link rel="stylesheet" href="css/style.css">
  <style>div{font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">Keep Track of Your Favorite Books!<br><div style="font-size: 16px;">(click here to see results)</div></a></div>
    <div style="font-size: 16px; text-align: right;"><a href="login.php" style="text-decoration: none; color: #ffffff;">Login</a></div>
    <div style="font-size: 16px; text-align: right;"><a href="logout.php" style="text-decoration: none; color: #ffffff;">Logout</a></div>

    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend style="font-size: 25px">Enter details below...</legend>
     <label>Book Title<div style="color: red; font-size: 12px; display: inline-block">(*)</div>：<br><input type="text" name="name" style="margin: 10px 0; width: 299px" required></label><br>
     <label>URL<div style="color: red; font-size: 12px; display: inline-block">(*)</div>：<br><textArea name="url" rows="2" cols="40" required></textArea></label><br>
     <label>Comment<div style="color: red; font-size: 12px; display: inline-block">(*)</div>：<br><textArea name="comment" rows="4" cols="40" required></textArea></label><br>
     <div style="color: red; font-size: 12px; display: inline-block">(*)：required</div><br>
     <input type="submit" value="Send" style="margin: 20px 0">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

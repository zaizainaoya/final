<?php session_start(); ?>
<?php require 'db-connect.php';?>
<form action="touroku1-output.php" method="post">
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>soccer-team</title>
</head>
<body>
<h2>マネージャー情報を追加</h2>
監督名:<input type="text" name="manager_name">
<br>
<a href="menu.php">メニューに戻る</a>
<hr>
<form action="" method="post">
    <button type="submit" name="action" value="send">登録</button>
</form>
</body>
</html>
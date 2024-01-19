<?php session_start(); ?>
<?php require 'db-connect.php';?>
<form action="touroku-output.php" method="post">
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>soccer-team</title>
</head>
<body>
<h2>チームを追加</h2>
<a href="menu.php">メニューに戻る</a>
<hr>
マネージャーID:<select name="manager_id">
<?php
$pdo=new PDO($connect,USER,PASS);
foreach($pdo->query('select * from Manager')as $row){
    echo'<option value="',$row['manager_id'],'">',$row['manager_name'],'</option>';
}
?>
</select>
    <br>
    チーム名：<input type="text" name="team_name">
    <br>
    所在地：<input type="text" name="location_name">
    <br>
    <button type="submit" name="action" value="send">登録</button>
    <br>
</form>
</body>
</html>

<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('insert into Team values(null,?,?,?)');
if($sql->execute([$_POST['manager_id'],$_POST['team_name'],$_POST['location_name']])){
    echo'追加に成功しました。';
}else{
    echo'追加に失敗しました。';
}
?>
<br>
<a href="menu.php">メニューに戻る</a>
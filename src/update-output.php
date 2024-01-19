<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('update  Team set team_name=? where team_id = ? ');
if(empty($_POST['team_name'])){
    echo 'チーム名を入力してください。';

}else{
    if($sql->execute(
        [htmlspecialchars($_POST['team_name']),$_POST['team_id']],
    )){
        echo '更新に成功しました。';
    }else{
        echo '更新に失敗しました。';
    }
}
?>
<br>
<a href="menu.php">メニューに戻る</a>
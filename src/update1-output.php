<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('update  Manager set manager_name=? where manager_id = ? ');
if(empty($_POST['manager_name'])){
    echo '監督名を入力してください。';

}else{
    if($sql->execute(
        [htmlspecialchars($_POST['manager_name']),$_POST['manager_id']]
    )){
        echo '更新に成功しました。';
    }else{
        echo '更新に失敗しました。';
    }
}
?>
<br>
<a href="menu.php">メニューに戻る</a>
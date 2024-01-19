<?php require 'db-connect.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>削除完了</title>
<?php
$pdo=new PDO($connect,USER,PASS);

$sql=$pdo->prepare('delete from Team where team_id=?');
if($sql->execute([$_GET['team_id']])){
    echo'削除に成功しました';
}else{
    echo'削除に失敗しました。';
}
?>
</body>
</html>
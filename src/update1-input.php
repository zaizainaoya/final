<?php session_start();?>
<?php require 'db-connect.php';?>
<table>
<tr><th>マネージャーID</th><th>監督名</th></th></tr>
<?php
$pdo=new PDO($connect,USER,PASS);
foreach($pdo->query('select * from  Manager')as $row){
    echo'<tr>';
    echo '<form action="update1-output.php" method="POST">';
    echo'<td>',$row['manager_id'],'<input type="hidden" name="manager_id" value="',$row['manager_id'],'"></td>';
    echo'<td><input type="text" name="manager_name" value="',$row['manager_name'],'"></td>';
    echo'<td><input type="submit" value="更新">';
    echo'</td>';
    echo '</form>';
    echo'</tr>';
}
?>
</table>

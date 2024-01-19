<?php session_start();?>
<?php require 'db-connect.php';?>
<table>
<tr><th>チームID</th><th>マネージャーID</th><th>チーム名</th><th>所在地</th><th></th></tr>
<?php
$pdo=new PDO($connect,USER,PASS);
foreach($pdo->query('select * from Team')as $row){
    echo'<tr>';
    echo'<td>',$row['team_id'],'</td>';
    echo'<td>',$row['manager_id'],'</td>';
    echo'<td>',$row['team_name'],'</td>';
    echo'<td>',$row['location_name'],'</td>';
   echo'<td>';
   echo'<a href="delete-output.php? team_id=',$row['team_id'],'">削除</a>';
   echo'</td>';
   echo'</tr>';
   echo"\n";
}
?>
</table>

<?php session_start();?>
<?php require 'db-connect.php';?>
<table>
<tr><th>チームID<th>マネージャーID<th>チーム名<th>監督名<th>所在地</th></th><th></th></tr>
<?php
$pdo=new PDO($connect,USER,PASS);
foreach($pdo->query('select * from Team INNER JOIN Manager ON Team.manager_id =Manager.manager_id')as $row){
    echo'<tr>';
    echo'<td>',$row['team_id'],'</td>';
    echo'<td>',$row['manager_id'],'</td>';
    echo'<td>',$row['team_name'],'</td>';
    echo'<td>',$row['manager_name'],'</td>';
    echo'<td>',$row['location_name'],'</td>';
   echo'<td>';
   echo'</td>';
   echo'</tr>';
}
?>
</table>

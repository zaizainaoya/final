<?php session_start();?>
<?php require 'db-connect.php';?>
<table>
<tr><th>チームID</th><th>チーム名</th><th>所在地</th><th></th></tr>
<?php
$pdo=new PDO($connect,USER,PASS);
foreach($pdo->query('select * from  Team')as $row){
    echo'<tr>';
    echo '<form action="update-output.php" method="POST">';
    echo'<td>',$row['team_id'],'<input type="hidden" name="team_id" value="',$row['team_id'],'"></td>';
    echo'<td><input type="text" name="team_name" value="',$row['team_name'],'"></td>';
    echo'<td><input type="text" name="location_name" value="',$row['location_name'],'"></td>';
    echo'<td><input type="submit" value="更新">';
    echo'</td>';
    echo '</form>';
    echo'</tr>';
}
?>
</table>

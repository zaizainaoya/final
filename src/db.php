<?php require 'db-connect.php'; ?>
<?php
try {
   // PDOインスタンスの生成
   $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // チーム一覧表示
   $teamsQuery = $pdo->query("SELECT * FROM Manager");
   $teams = $teamsQuery->fetchAll(PDO::FETCH_ASSOC);
   // マネージャー一覧表示
   $managersQuery = $pdo->query("SELECT * FROM ManagerDetails");
   $managers = $managersQuery->fetchAll(PDO::FETCH_ASSOC);
   // チーム登録
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['team_id'], $_POST['manager_id'])) {
       $team_id = $_POST['team_id'];
       $manager_id = $_POST['manager_id'];
       $insertQuery = $pdo->prepare("INSERT INTO Manager(team_id, manager_id) VALUES (?, ?)");
       $insertQuery->execute([$team_id, $manager_id]);
   }
   // チーム更新
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_team_id'], $_POST['update_manager_id'])) {
       $update_team_id = $_POST['update_team_id'];
       $update_manager_id = $_POST['update_manager_id'];
       $updateQuery = $pdo->prepare("UPDATE Manager SET manager_id = ? WHERE team_id = ?");
       $updateQuery->execute([$update_manager_id, $update_team_id]);
   }
   // チーム削除
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_team_id'])) {
       $delete_team_id = $_POST['delete_team_id'];
       $deleteQuery = $pdo->prepare("DELETE FROM Manager WHERE team_id = ?");
       $deleteQuery->execute([$delete_team_id]);
   }
} catch (PDOException $e) {
   echo "データベースエラー: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Soccer Team Management</title>
</head>
<body>
<h2>チーム一覧</h2>
<ul>
<?php foreach ($teams as $team) : ?>
<li><?php echo "チームID: " . $team['team_id'] . ", マネージャーID: " . $team['manager_id']; ?></li>
<?php endforeach; ?>
</ul>
<h2>マネージャー一覧</h2>
<ul>
<?php foreach ($managers as $manager) : ?>
<li><?php echo "マネージャーID: " . $manager['manager_id'] . ", マネージャー名: " . $manager['manager_name']; ?></li>
<?php endforeach; ?>
</ul>
<h2>チーム登録</h2>
<form method="post">
       チームID: <input type="text" name="team_id" required>
       マネージャーID: <input type="text" name="manager_id" required>
<input type="submit" value="登録">
</form>
<h2>チーム更新</h2>
<form method="post">
       チームID: <input type="text" name="update_team_id" required>
       新しいマネージャーID: <input type="text" name="update_manager_id" required>
<input type="submit" value="更新">
</form>
<h2>チーム削除</h2>
<form method="post">
       チームID: <input type="text" name="delete_team_id" required>
<input type="submit" value="削除">
</form>
</body>
</html>
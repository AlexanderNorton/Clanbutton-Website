 <?php

$pdo = connect(); //Connect function removed to protect DB info.
$sql = "SELECT * FROM users";
$result = $pdo->query($sql)->fetchAll();
foreach($result as $row) {
	$currentsearch = $row['game'];
	$currentuser = $row['username'];
	echo $currentsearch;
	echo '<br>';
	echo $currentuser;
	echo '<br>';
}
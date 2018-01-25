<?php
error_reporting(0);

$pdo = connect(); //Connect function removed to protect DB info.

$ip = $_SERVER['REMOTE_ADDR'];

if ($_POST['counter'] == "counter"){
	$gameid=$_POST['gameinput'];
	$insertion = "INSERT INTO users (ipaddress, game)
	VALUES ('$ip', '$gameid')"; 
	$pdo->query($insertion) === TRUE; 
}


$item ="SELECT * FROM `users` WHERE game LIKE '$gameid'";
$gamertag=$_POST['username'];
$platformid=$_POST['platform'];
$result = $pdo->query($item)->fetchAll();
$ipaddresses = "SELECT * FROM users WHERE ipaddress LIKE '$ip'";
$getips = $pdo->query($ipaddresses)->fetchAll();
$insertion = "INSERT INTO users (ipaddress, game, username, platform)
VALUES ('$ip', '$gameid', '$gamertag', '$platformid')";

if (count($getips) > 0){
	$deletion = "DELETE FROM users WHERE ipaddress LIKE '$ip'";
	$pdo->query($deletion) === TRUE;
	$pdo->query($insertion) === TRUE;
}

if (count($result) >= 1) {
	foreach ($result as $row) {
		$userlist = $row['username'];
		$platform = $row['platform'];
		if ($platform == 'steam'){
			echo "$userlist";
			echo '<img class = "platform" src = "./images/steam_logo.png" alt = "Steam logo"><br>';

		}
		elseif ($platform == 'origin'){
			echo "$userlist";
			echo '<img class = "platform" src = "./images/origin_logo.png" alt = "Origin logo"><br>';

		}
		elseif ($platform == 'uplay'){
			echo "$userlist";
			echo '<img class = "platform" src = "./images/uplay_logo.ico" alt = "uPlay logo"><br>';

		}
	}
} else {
echo "Searching..";
}
if ($_POST['ready'] == 'true'){
	$deletion = "DELETE FROM users WHERE ipaddress LIKE '$ip'";
	$pdo->query($deletion) === TRUE;
}

?>
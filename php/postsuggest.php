 <?php
error_reporting(0);

$pdo = connect(); //Connect function removed to protect DB info.
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM games WHERE gameName LIKE (:keyword) ORDER BY id ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();

foreach ($list as $rs) {
	$gameName = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['gameName']);
	$gameslist = '<li onclick="set_item(\''.str_replace("'", "\'", $rs['gameName']).'\')">'.$gameName.'</li>';
	if (strlen($_POST['keyword']) > 0){
		echo $gameslist;
	}
}
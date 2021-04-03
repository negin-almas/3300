<!DOCTYPE html>
<html>
<head lang="fa">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible"
	      content="IE=edge">
	<meta name="viewport"
	      content="width=device-width, initial-scale=1">
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Torbatian
 * Date: 3/18/2015
 * Time: 10:43 AM
 */
try {
	$conn = new PDO('mysql:host=localhost;dbname=new3300;charset=utf8', 'new3300', 'New33ooglm', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
//$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$stat = $conn->prepare('SELECT *  FROM `article` WHERE `tree_id` IN (SELECT `id` FROM `article_tree` WHERE `parent` = 1)');
	$stat->execute();
	$data = $stat->fetchAll(PDO::FETCH_OBJ);
	foreach ($data as $row) {
		echo htmlspecialchars_decode($row->short);
		echo '<br>';
		echo '<hr><br>';
	}
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
?>
</body>
</html>
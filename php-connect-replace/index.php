<?php
$articleNumber = "5";
$imageCSS1 = "pull-right";

try {
	$db = new PDO('mysql:host=localhost;dbname=articlebank', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare("SELECT Article FROM articles WHERE ID = ?");
$query->execute(array("$articleNumber"));

while($row = $query->fetch(PDO::FETCH_OBJ)) {
	print_r(str_replace("%imagecss%", "$imageCSS1", "$row->Article"));
}

} catch(PDOException $e) {
	echo $e->getMessage();
}
$db = null;

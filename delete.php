<?php
include 'db/db.php';
include 'debug/debug.php';
$image = $pdo->query('SELECT * FROM image WHERE id='.$pdo->quote($_GET['id'], PDO::PARAM_STR));
$img = $image->fetch();
unlink('img/'.$img->image);
$db = $pdo->prepare('DELETE FROM post WHERE id='.$pdo->quote($_GET['id'], PDO::PARAM_STR));
$db->execute();
header("Location: admin.php");
die();
?>
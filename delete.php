<?php
include 'db/db.php';
$image = $pdo->query('SELECT * FROM image WHERE post_id='.$pdo->quote($_GET['id'], PDO::PARAM_STR));
$img = $image->fetch();
unlink('img/'.$img->name);
$db = $pdo->prepare('DELETE FROM post WHERE id='.$pdo->quote($_GET['id'], PDO::PARAM_STR));
$db->execute();
$_SESSION['flash']['danger'] = "Votre post est supprimé";
header("Location: admin.php");
die();
?>
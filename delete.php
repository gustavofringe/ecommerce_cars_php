<?php
include 'db/db.php';
$image = $pdo->query('SELECT * FROM image WHERE post_id='.$pdo->quote($_GET['id'], PDO::PARAM_INT));
$img = $image->fetch();
unlink('img/'.$img->name);
$db = $pdo->prepare('DELETE FROM post WHERE id= ?');
$db->execute([$pdo->quote($_GET['id'], PDO::PARAM_INT)]);
$_SESSION['flash']['danger'] = "Votre post est supprimé";
header("Location: admin.php");
die();
?>
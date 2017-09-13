<?php
include '../library/includes.php';
$image = $pdo->query('SELECT * FROM image WHERE post_id='.$pdo->quote($_GET['id'], PDO::PARAM_INT));
$img = $image->fetch();
unlink('../img/'.$img->name);
$db = $pdo->prepare('DELETE FROM post WHERE id= ?');
$db->execute([$_GET['id']]);
$_SESSION['flash']['danger'] = "Votre post est supprimé";
header("Location: admin.php");
die();
?>
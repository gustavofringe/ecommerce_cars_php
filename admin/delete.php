<?php
include '../library/includes.php';
$image = $pdo->query('SELECT * FROM image WHERE post_id='.$pdo->quote($_GET['id'], PDO::PARAM_INT));
$img = $image->fetch();
unlink('../img/'.$img->name);
$db = $pdo->prepare('DELETE FROM post WHERE id= ?');
$db->execute([$_GET['id']]);
setFlash("Votre post est supprimé", 'danger');
header("Location: admin.php");
die();
?>
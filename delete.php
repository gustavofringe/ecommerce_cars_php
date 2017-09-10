<?php
include 'db/db.php';
include 'debug/debug.php';
$db = $pdo->prepare('DELETE FROM test WHERE id='.$pdo->quote($_GET['id'], PDO::PARAM_STR));
$new = $db->execute();
header("Location: index.php");

?>
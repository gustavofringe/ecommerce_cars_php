<?php
function logged_only(){
if(session_status() == PHP_SESSION_NONE){
session_start();
}
if(!isset($_SESSION['auth'])){
$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'être sur cette page";
header('Location: login.php');
exit();
}
}
<?php
include 'db/db.php';
$db = $pdo->query('SELECT * FROM news WHERE id='.$_GET['id']);
$new = $db->fetch();
?>
<div class="card" style="width: 20rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title"><?= $new->title?></h4>
        <p class="card-text"><?=$new->content;?></p>
        <p class="card-text"><?=$new->autor;?></p>
        <a href="<?= BASE_URL; ?>" class="btn btn-primary">Go back</a>
    </div>
</div>
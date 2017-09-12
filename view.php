<?php
include 'db/db.php';
include 'library/includes.php';
$db = $pdo->query('SELECT * FROM post WHERE title='.$pdo->quote($_GET['title'], PDO::PARAM_STR));
$new = $db->fetch();
?>
<?php include 'partials/header.php'; ?>
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="img/<?= $new->image ?>" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title"><?= $new->title ?></h4>
                <p class="card-text"><?= $new->content; ?></p>
                <p class="card-text"><?= $new->autor; ?></p>
                <p class="card-text"><?= $new->created_at; ?></p>
                <a href="<?= BASE_URL; ?>" class="btn btn-primary">Go back</a>
            </div>
        </div>
<?php include 'partials/footer.php'; ?>
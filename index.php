<?php
include 'db/db.php';

$db = $pdo->query('SELECT * FROM test');
$value = $db->fetchAll();
?>
<?php include 'partials/header.php'; ?>
    <div class="container">
        <div class="row">

            <?php foreach ($value as $k => $v): ?>
                <div class="col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="img/<?= $v->image; ?>" alt="<?= $v->title; ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?= $v->title; ?></h4>
                            <p class="card-text">Sold by: <?= $v->autor; ?></p>
                            <a href="view.php?id=<?= $v->id; ?>" class="btn btn-primary">See more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

<?php include 'partials/footer.php'; ?>
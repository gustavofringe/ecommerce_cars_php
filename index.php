<?php
//import library
include 'library/includes.php';
//title page
$title_page = "Accueil";
//request for view all cars
$db = $pdo->query('SELECT * FROM post LEFT JOIN image ON post.id=image.post_id');
$value = $db->fetchAll();
?>
<?php include 'partials/header.php'; ?>
        <div class="row">

            <?php foreach ($value as $k => $v): ?>
                <div class="col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="img/<?= $v->name; ?>" alt="<?= $v->title; ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?= $v->title; ?></h4>
                            <p class="card-text">Sold by: <?= $v->autor; ?></p>
                            <a href="view.php?title=<?= $v->title; ?>" class="btn btn-primary">See more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

<?php include 'partials/footer.php'; ?>
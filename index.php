<?php
include 'db/db.php';

$db = $pdo->query('SELECT * FROM test');
$value = $db->fetchAll();
?>
<?php include 'partials/header.php'; ?>
    <div class="container">
        <table class="table table-inverse">

            <tr>
                <th>#</th>
                <th>title</th>
                <th>content</th>
                <th>autor</th>
                <th>created at</th>
                <th>image</th>
                <th>action</th>
            </tr>
            <?php foreach ($value as $k => $v): ?>
                <tr>
                    <td><?= $v->id; ?></td>
                    <td><?= $v->title; ?></td>
                    <td><?= $v->content; ?></td>
                    <td><?= $v->autor; ?></td>
                    <td><?= $v->created_at; ?></td>
                    <td><img src="img/<?= $v->image; ?>" alt="" style="height: 75px; width: 75px"></td>
                    <td><a href="view.php?id=<?= $v->id; ?>">See more</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<?php include 'partials/footer.php'; ?>
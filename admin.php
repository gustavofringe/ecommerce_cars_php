<?php
include 'db/db.php';
include 'function/logged.php';
logged_only();

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
                    <td><img src="img/<?= $v->image; ?>" alt=""></td>
                    <td>
                        <a class="btn btn-danger" href="delete.php?id=<?= $v->id; ?>">Delete</a>
                        <a class="btn btn-info" href="edit.php?id=<?= $v->id; ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<?php include 'partials/footer.php'; ?>
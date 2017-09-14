<?php
include '../library/includes.php';
$title_page = "Accueil admin";
logged_only();

$db = $pdo->query('SELECT * FROM post LEFT JOIN image ON post.id=image.post_id');
$value = $db->fetchAll();
?>
<?php include '../partials/header.php'; ?>

    <table class="table table-inverse">
        <tr>
            <th>#</th>
            <th>title</th>
            <th>content</th>
            <th>autor</th>
            <th>created</th>
            <th>image</th>
            <th>action</th>
            <th>updated</th>
        </tr>
        <?php foreach ($value as $k => $v): ?>
            <tr>
                <td><?= $v->id; ?></td>
                <td><?= $v->title; ?></td>
                <td><?= $v->content; ?></td>
                <td><?= $v->autor; ?></td>
                <td><?= date('d/m/Y', strtotime($v->created_at)); ?></td>
                <td><img src="../img/<?= $v->name; ?>" alt=""></td>
                <td>
                    <a class="btn btn-danger" href="delete.php?id=<?= $v->post_id; ?> onclick="return confirm('En ête vous sûr ?');">Delete</a>
                    <a class="btn btn-info" href="edit.php?title=<?= $v->title; ?>">Edit</a>
                </td>
                <?php if ($v->updated_at > 0): ?>
                    <td><?= date('d/m/Y', strtotime($v->updated_at)); ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>

<?php include '../partials/footer.php'; ?>
<?php
include 'db/db.php';
include 'function/logged.php';
logged_only();
$db = $pdo->query('SELECT * FROM test WHERE id='.$pdo->quote($_GET['id'], PDO::PARAM_STR));
$new = $db->fetch();
if(!empty($_POST)){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $autor = $_POST['autor'];
    $update = $pdo->prepare("UPDATE test SET title = ?, content = ?, autor = ? WHERE id=".$pdo->quote($_GET['id'], PDO::PARAM_STR));
    $update->execute($title,$content,$autor);
    $_SESSION['flash']['success'] = "Votre article est mis a jour";
    //header('Location: admin.php');
    //die();
}
?>
<?php include 'partials/header.php'; ?>
<form action="" method="post">
    <div class="form-group">
        <label class="form-control-label" for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $new->title; ?>">
    </div>
    <div class="form-group">
        <label class="form-control-label" for="content">Content</label>
        <textarea type="text" class="form-control" id="content" name="content"><?= $new->content; ?></textarea>
    </div>
    <div class="form-group">
        <label class="form-control-label" for="autor">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor" value="<?= $new->autor; ?>">
    </div>
    <button class="btn btn-primary">Update</button>
</form>

<?php include 'partials/footer.php'; ?>

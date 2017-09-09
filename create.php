<?php
include 'debug/debug.php';
if (!empty($_POST)) {
    require_once 'db/db.php';
    if (empty($_POST['title']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['title'])) {
        $errors['title'] = "Vous n'avez pas entrer un titre valide";
    }
    if(empty($_POST['content'])){
        $errors['content'] = "Vous devez ecrire qqe chose";
    }
    if (empty($_POST['autor']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['autor'])) {
        $errors['autor'] = "Vous n'avez pas entrer un auteur valide";
    }
    if(empty($errors)){
        $req=$pdo->prepare("INSERT INTO test SET title = ?, content = ?, autor = ?, image = ?, created_at = NOW()");
        $content = htmlspecialchars($_POST['content']);
        $img = $_FILES['image'];
        $ext = strtolower(substr($img['name'], -3));
        $auto_ext = ['jpg', 'png', 'gif', 'svg'];
        if(in_array($ext, $auto_ext)){
            move_uploaded_file($img['tmp_name'], 'img/'.$img['name']);
        }else{
            $errors['image'] = "l'image n'est pas au bon format";
        }
        $req->execute([$_POST['title'], $content, $_POST['autor'], $img['name']]);
        header('Location: index.php');
        die();
    }
}
?>

<?php
include 'partials/header.php';
?>
    <h1>Create new car</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>
                    <?= $error; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                   placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" placeholder="Content"></textarea>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" placeholder="autor">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button class="btn btn-primary">Send</button>
    </form>
<?php
include 'partials/footer.php';
?>
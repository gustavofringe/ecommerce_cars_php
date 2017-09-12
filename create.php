<?php
include 'library/includes.php';
logged_only();
if (!empty($_POST)) {
    require_once 'db/db.php';
    if (empty($_POST['title']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['title'])) {
        $errors['title'] = "Vous n'avez pas entrer un titre valide";
    }
    if(empty($_POST['content'])){
        $errors['content'] = "Votre contenu est incorrect";
    }
    if (empty($_POST['autor']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['autor'])) {
        $errors['autor'] = "Vous n'avez pas entrer un auteur valide";
    }
    if(empty($errors)){
        $title = $pdo->quote($_POST['title']);
        $content = $pdo->quote($_POST['content']);
        $autor = $pdo->quote($_POST['autor']);
        $pdo->query("INSERT INTO post SET title=$title, content=$content, autor=$autor, created_at=NOW()");
        $post_id = $pdo->lastInsertId();
        $img = $_FILES['image'];
        $size = $pdo->quote($img['size']);
        $type = $pdo->quote($img['type']);
        $ext = strtolower(substr($img['name'], -3));
        $auto_ext = ['jpg', 'png', 'gif', 'svg'];
        if(in_array($ext, $auto_ext)){
            $filename = $img['name'];
            move_uploaded_file($img['tmp_name'], 'img/'.$img['name']);
            $file = 'img/'. $img['name'];
            $resizedFile =  'img/' . $filename;
            Img::smart_resize_image($file , null, 318 , 180 , false , $resizedFile , false , false ,100 );
            $pdo->query("INSERT INTO image SET name='$filename', size=$size, type=$type, post_id=$post_id");
        }else{
            $errors['image'] = "l'image n'est pas au bon format";
        }
        $_SESSION['flash']['success'] = "Votre post est envoyé";
        header('Location: admin.php');
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
                <label for="exampleInputFile">File input</label>
                <input type="file" class="form-control-file" name="image" id="exampleInputFile"
                       aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the
                    above input. It's a bit lighter and easily wraps to a new line.
                </small>
            </div>
            <button class="btn btn-primary">Send</button>
        </form>
<?php
include 'partials/footer.php';
?>
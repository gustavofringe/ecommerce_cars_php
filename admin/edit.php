<?php
include '../class/Form.php';
include '../library/includes.php';
logged_only();
$title_page = "Editer";
$db = $pdo->query('SELECT * FROM post WHERE title='.$pdo->quote($_GET['title'], PDO::PARAM_STR));
$new = $db->fetch();
if(!empty($_POST)){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $autor = $_POST['autor'];
    $check = $_POST['check'];
    $get_title = $_GET['title'];
    $update = $pdo->prepare("UPDATE post SET title= ?, content= ?, autor= ?, online = ?, updated_at=NOW() WHERE title= ?");
    $update->execute([$title, $content, $autor, $check, $get_title]);
    setFlash("Votre article est mis a jour");
    header('Location: admin.php');
    die();
}
?>
<?php include '../partials/header.php'; ?>
<?php
Form::open('post');
Form::input('title', 'form-class-label', 'Title', 'text', 'title', 'form-control', $new->title, 'title');
Form::textarea('content', 'Content', 'form-control', 'content', 'content', $new->content);
Form::input('autor', 'form-class-label', 'Autor', 'text', 'autor', 'form-control', $new->autor, 'autor');
Form::checkbox();
Form::button('btn btn-primary', 'Update');
Form::close();
?>

<?php include '../partials/footer.php'; ?>

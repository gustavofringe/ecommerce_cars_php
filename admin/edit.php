<?php
include '../class/Form.php';
include '../library/includes.php';
logged_only();
$db = $pdo->query('SELECT * FROM post WHERE title='.$pdo->quote($_GET['title'], PDO::PARAM_STR));
$new = $db->fetch();
if(!empty($_POST)){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $autor = $_POST['autor'];
    $get_title = $_GET['title'];
    $update = $pdo->prepare("UPDATE post SET title= ?, content= ?, autor= ?, updated_at=NOW() WHERE title= ?");
    $update->execute([$title, $content, $autor, $get_title]);
    $_SESSION['flash']['success'] = "Votre article est mis a jour";
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

?>
<legend>Radio buttons</legend>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
Option one is this and that&mdash;be sure to include why it's great
      </label>
    </div>
<?php
Form::button('btn btn-primary', 'Update');
Form::close();
?>

<?php include '../partials/footer.php'; ?>

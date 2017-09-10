<?php
if(isset($_SESSION['auth'])){
    header('Location: admin.php');
    exit();
}
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'db/db.php';
    $req=$pdo->prepare('SELECT * FROM users WHERE (username = :username)');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password)){
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = "Vous êtes maintenant connecté";
        header('Location: admin.php');
        die();
    }else{
        $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrect";
    }
}
?>
<?php require 'partials/header.php'; ?>

    <h1>Se connecter</h1>

    <form action="" method="POST">
        <div class="form-group">
            <label for="">Pseudo</label>
            <input type="text" name="username" class="form-control" required/>
        </div>
        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" name="password" class="form-control" required/>
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>

<?php require 'partials/footer.php'; ?>
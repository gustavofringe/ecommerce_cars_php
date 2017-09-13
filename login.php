<?php
include 'library/includes.php';
session_start();
// if admin as login redirect admin.php
if(isset($_SESSION['auth'])){
    header('Location: admin.php');
    die();
}
if(isset($_POST['username']) && isset($_POST['password'])){
    require_once 'db/db.php';
    $username = $pdo->quote($_POST['username'], PDO::PARAM_STR);
    $password = sha1($_POST['password']);
    $req = $pdo->query("SELECT * FROM admin WHERE username= $username AND password= '$password'");
    $user = $req->fetch();
    if($password == $user->password){
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
<?php
require_once('header.php');
require_once('connect.php');
use MyClass\Auth;
?>

<?php
if (isset($_POST['username'], $_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $auth = new Auth();
    $user = $auth->login($username, $password);
    if ($user){
        header("Location: index.php");
    }
    else{
        echo "<h1>Failed!</h1>";
    }
}
?>


<div class="d-flex justify-content-center">
    <form class="col-6 mt-5" action="" method="post">
        <input class="form-control m-2" type="text" name="username" placeholder="Identifiant">
        <input class="form-control m-2" type="text" name="password" placeholder="Mot de passe">
        <button class="btn btn-warning"type="submit">Login</button>
    </form>
</div>




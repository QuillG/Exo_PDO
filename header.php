<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php require __DIR__ . '/vendor/autoload.php';?>
    <title>Document</title>
</head>

<?php
     use MyClass\Auth;
    session_start();
    $auth = new Auth();
    $user = $auth->isConnected();
?>
<body class="">
    <nav class="navbar bg-dark">
    <div class="justify-content-start m-3">
        <a class="navbar-brand text-white" href="#">Navbar</a>
    </div>
    <div class="justify-content-end m-3">
        <?php if ($user != null) :?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $user->getUserName();?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
                </div>
        <?php else :?>    
            <a href="login.php"><button class="btn btn-warning">Login</button></a>
        <?php endif;?>
    </div>
    </nav>


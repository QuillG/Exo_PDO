<?php
use MyClass\MyPdo;
use MyClass\User;

try {
    $user = null;
    $mdp = null;
    $dns = 'sqlite:data.db';
    $myPdo = new MyPdo($dns, $user, $mdp);
    $pdo = $myPdo->Connect();

    

} catch(PDOException $e) {
    echo 'PDO exception thrown : '.$e->getMessage();
}

?>

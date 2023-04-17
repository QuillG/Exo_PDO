<?php
require_once('header.php');
require_once('connect.php');
use MyClass\Expe;
?>


<?php 
$query = $pdo->query('SELECT * FROM expe');
if($query ===false){
    var_dump($pdo->errorInfo());
    die();
}
$expe = $query->fetchAll(PDO::FETCH_CLASS, Expe::class);
// echo "<pre>";
//print_r($expe);
// echo "</pre>";



?>


<div>
    <?php foreach ($expe as $e) : ?>
    <div class="m-5">
        <?php if (isset($_SESSION['id'])) :?>
            <a href="edit.php?id=<?php echo "$e->id" ?>"><h1>Nom : <?php echo "$e->name" ?></h1></a>
        <?php else :?>
            <a><h1>Nom : <?php echo "$e->name" ?></h1></a> 
        <?php endif;?>
        <h1>Contenu :  <?php echo $e->getResume(); ?></h1>
        <h1>date :  <?php echo $e->getDate() ?>;</h1>
        <?php echo $e->getReadTime();?>
    </div>
</div>






<?php endforeach;


?>


<?php require_once('footer.php');?>








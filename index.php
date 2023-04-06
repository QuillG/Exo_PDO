<?php require_once('header.php');?>
<?php require_once('MyClass/Expe.php');?>
<?php require_once('connect.php');?>

<?php 
$query = $pdo->query('SELECT * FROM expe');
if($query === false){
    var_dump($pdo->errorInfo());
    die();
}
$expe = $query->fetchAll(PDO::FETCH_CLASS, "Expe");
// echo "<pre>";
print_r($expe);
// echo "</pre>";

?>

<?php foreach ($expe as $e) : ?>
    <a href="edit.php?id=<?php echo "$e->id" ?>">
<h1>Nom : <?php echo "$e->name" ?></h1></a>
<h1>Contenu :  <?php echo $e->getResume(); ?></h1>
<h1>date :  <?php echo $e->getDate() ?>;</h1>



<?php endforeach;


?>








<?php require_once('footer.php');?>








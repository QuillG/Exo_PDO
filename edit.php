<?php require_once('header.php');?>
<?php require_once('connect.php');?>
<?php require_once('MyClass/Expe.php');?>

<?php 
$error = null;


    $id = $pdo->quote($_GET['id']);
    if (isset($_POST['name'], $_POST['content'])){
        $query = $pdo->prepare('UPDATE expe SET name=:name , content=:content WHERE id=:id');
        $query->bindValue('name', $_POST['name'] , PDO::PARAM_STR);
        $query->bindValue('content', $_POST['content'], PDO::PARAM_STR);
        $query->bindValue('id', $_GET['id'] , PDO::PARAM_INT);
        $query->execute();
        //$query->execute(['name' => $_POST['name'], 'content'=> $_POST['content'], 'id'=> $_GET['id']]);
        //$count = $pdo->exec($query);

    }
    $query = $pdo->prepare('SELECT * FROM expe Where id=:id');
    $query->bindValue('id', $_GET['id'] , PDO::PARAM_INT);
    $query->execute();
    if($query === false){
        var_dump($pdo->errorInfo());
        die();
    }

    $query->setFetchMode(PDO::FETCH_CLASS, "Expe");
    $expe = $query->fetch();





?>
<?php if ($error) : ?>
<?php echo $error; ?>


<?php else : ?>
<form action="" method="post">
    <input type="text" name="name" value="<?php echo htmlentities($expe->name);?>">
    <textarea name="content" id="content" cols="30" row="10"><?php echo htmlentities($expe->content);?></textarea>
    <button type="submit">Go !</button>
</form>

<?php endif; ?>


<?php require_once('footer.php');?>

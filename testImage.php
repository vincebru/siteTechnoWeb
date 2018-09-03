<?php 

//http://www.mysqltutorial.org/php-mysql-blob/
//https://www.w3schools.com/php/php_file_upload.asp

var_dump($_FILES);
include 'utils/Database.php';
if (isset($_POST['submit'])){
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    var_dump($check );
    $bdd = Database::getDb();
    $req = $bdd->prepare(
        "insert into test_image(mime,file) values (:mime,:file)");
    
    var_dump($req );
    
    var_dump($check["mime"]);
    var_dump($_FILES["pic"]["tmp_name"]);
    
    $req->bindParam(':mime', $check["mime"]);
    $req->bindParam(':file', $_FILES["pic"]["tmp_name"], PDO::PARAM_LOB);
    
    $req->execute();
    $userId=$bdd->lastInsertId();
    echo('coucou');
    var_dump($userId);
}


?>

<form action='test.php' method='post' enctype="multipart/form-data">
	<input type="file" name="pic"/>
	<input type="submit" name="submit" />
</form>
<?php 

//http://www.mysqltutorial.org/php-mysql-blob/
//https://www.w3schools.com/php/php_file_upload.asp

/*include 'utils/Database.php';
if (isset($_POST['submit'])){
    try{
    $bdd = Database::getDb();
    $req = $bdd->prepare(
        "insert into test_image(mime,file) values (:mime,:file)");
    
    $mime=mime_content_type($_FILES["pic"]["tmp_name"]);//'application/pdf';
    $file=fopen($_FILES["pic"]["tmp_name"], 'rb');
    
    $req->bindParam('mime', $mime);
    $req->bindParam('file', $file, PDO::PARAM_LOB);
    
    $req->execute();
    $id=$bdd->lastInsertId();
    } catch (Exception $e) {
        echo($e->getMessage());
        var_dump($e->getTrace());
    }
}
*/

?>

<form action='ajax.php' method='post' enctype="multipart/form-data">

	type:<input type="text" name="object" value="Image"/><br>
	content<input type="text" name="content"/><br>
	rank:<input type="number" name="rank"/><br>
	parent_id:<input type="number" name="parent_id"/><br>
	width(px):<input type="text" name="width"/><br>
	height(px):<input type="text" name="height"/><br>
	file:<input type="file" name="file"/><br>
	<input type="submit" name="submit" />
</form>

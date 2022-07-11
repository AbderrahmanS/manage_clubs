<?php
$id = $_GET['id'];
try {
  $con = new PDO("mysql:host=localhost;dbname=club", 'root', '');


  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM joueur WHERE id=$id";
  $con->exec($sql);
  
  header("location: form.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}


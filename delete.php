<?php
$id = $_GET['id'];
try {
  $con = new PDO("mysql:host=localhost;dbname=club", 'root', '');


  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql1 = "DELETE FROM joueur WHERE idClub=$id";
  $con->exec($sql1);
  $sql = "DELETE FROM club_man WHERE id=$id";
  $con->exec($sql);
  header("location: form.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}



    
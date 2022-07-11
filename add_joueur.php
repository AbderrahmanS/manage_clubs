<?php
$con = new PDO("mysql:host=localhost;dbname=club", 'root', '');
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $nom_j = $_POST['nomjoueur'];
    $position = $_POST['position'];
    $date_n = $_POST['date_n'];
    $date_a = $_POST['date_a'];
    $photo = addslashes(file_get_contents($_FILES['photo']["tmp_name"]));
    $sql = "INSERT INTO joueur(nom,position,date_Naissance,dateAffectation,idClub,photo) VALUES ('$nom_j','$position','$date_n','$date_a','$id','$photo')";
    $con->exec($sql);
    header("location: joueur.php?id=$id");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<div class="card">
         <div class="card">
         <div class="card-text">
         <div class="portada">
        
         </div>
         <form id="register-form" method="POST" class="text-left" enctype="multipart/form-data" >
         <div class="title-total">
             
         <div class="desc"><input name="nomjoueur" type="text" class="form-control" id="reg_username" placeholder="Nom de Joueur"> <br> </div>
         <div class="desc"><input name="position" type="text" class="form-control" id="reg_username" placeholder="Position"> <br> </div>
          <div class="desc"><input name="date_n" type="date" class="form-control" id="reg_username" placeholder="Date de Naissance"> <br> </div>
          <div class="desc"><input name="date_a" type="date" class="form-control" id="reg_username" placeholder="Date d'Affectation"><br> </div>
          <div ><input name="photo" type="file" class="form-control" id="reg_username" placeholder="nom club"> <br> </div>
          </div>
				<button name="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>

</form>
        </div>
         </div>
         </div>
        </div>

    
  </div>
 
</body>
</html>
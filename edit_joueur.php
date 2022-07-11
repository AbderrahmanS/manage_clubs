<?php
$con = new PDO("mysql:host=localhost;dbname=club", 'root', '');
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $nom_j = $_POST['nomjoueur'];
    $position = $_POST['position'];
    $date_n = $_POST['date_n'];
    $date_a = $_POST['date_a'];
    $photo = addslashes(file_get_contents($_FILES['photo']["tmp_name"]));
    $sql = "update joueur SET nom='$nom_j' , position='$position' , date_Naissance='$date_n' , dateAffectation='$date_a' , photo='$photo' WHERE id=$id ";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    header("location: form.php");
}

$sql1 = $con->prepare("SELECT * FROM joueur where id='$id' ");
$sql1->execute();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
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
         
         <div class="title-total">
         <form id="register-form" method="POST" class="text-left" enctype="multipart/form-data" >
         <?php
            while($row = $sql1->fetch(PDO::FETCH_ASSOC)){    
         echo '<div class="desc"><input name="nomjoueur" type="text" class="form-control" required="" value="'.$row['nom'].'"> <br> </div>';
         echo '<div class="desc"><input name="position" type="text" class="form-control" required="" value="'.$row['position'].'"> <br> </div>';
         echo '<div class="desc"><input name="date_n" type="date" class="form-control" required="" value="'.$row['date_Naissance'].'"> <br> </div>';
         echo '<div class="desc"><input name="date_a" type="date" class="form-control" required="" value="'.$row['dateAffectation'].'"><br> </div>';
         echo '<div ><input name="photo" type="file" class="form-control"  > <br> </div>';
            }
            ?>
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
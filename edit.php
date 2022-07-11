<?php
$con = new PDO("mysql:host=localhost;dbname=club", 'root', '');
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $nomc = $_POST['nomclub'];
    $sigle = $_POST['sigle'];
    $datec = $_POST['datecreation'];
    $file = addslashes(file_get_contents($_FILES['logo']["tmp_name"]));
    $sql = "update club_man SET nom_c='$nomc' , sigle='$sigle' , logo='$file' , date_cr='$datec'  WHERE id=$id ";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    header("location: form.php");
}

$sql1 = $con->prepare("SELECT * FROM club_man where id='$id' ");
$sql1->execute();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styleform.css" />
</head>
<body>


<?php
    while($row = $sql1->fetch(PDO::FETCH_ASSOC)){
        echo  '<div >
            <div class="modal-dialog">
            <div class="modal-content">
             <form method="POST" enctype="multipart/form-data">
              <div class="modal-header">      
               <h4 class="modal-title">Edit CLUB</h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">     
               <div class="form-group">
                <label>Name</label>
                <input type="text" name="nomclub" class="form-control" required value="'.$row['nom_c'].'">
               </div>
               <div class="form-group">
                <label>Sigle</label>
                <input type="text" name="sigle" class="form-control" required value="'.$row['sigle'].'">
               </div>
               <div class="form-group">
                <label>Date de création</label>
                <input type="date" name="datecreation"  required value="'.$row['date_cr'].'">
               </div>';                
           }
?>
					
                 <div class="form-group">
                 <label>Logo</label>
                   <input type="file" name="logo" class="form-control" required >
                    </div>     
                    </div>
                    <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                     <input type="submit" name="submit" class="btn btn-info" value="Save">
                       </div>
                        </form>
                        </div>
                      </div>
                        </div>               
						
						
					
					
					
</body>
</html>
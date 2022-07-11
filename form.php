<?php
session_start();
$user = $_SESSION['user'];
if(empty($user)){
  header('location:login.php');
}
$con = new PDO("mysql:host=localhost;dbname=club", 'root', '');

$sql1 = "SELECT * FROM club_man";
$result = $con->query($sql1);
if(isset($_POST['submit'])){
    $nomc = $_POST['nomclub'];
    $sigle = $_POST['sigle'];
    $datec = $_POST['datecreation'];
    $file = addslashes(file_get_contents($_FILES['logo']["tmp_name"]));
    $sql = "INSERT INTO club_man(nom_c,sigle,logo,date_cr) VALUES ('$nomc','$sigle','$file','$datec')";
    $con->exec($sql);
    header("location: form.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styleform.css" />

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>Manage <b>Clubs</b></h2>
     </div>
     <div class="col-sm-6">
      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Club</span></a>
     </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Sigle</th>
                        <th>Date creation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>
                            <td><div class="bg-light d-inline-flex justify-content-center align-items-center align-top"
                            style="width: 35px; height: 35px; border-radius: 3px;"><img width="40" height="40" src="data:image/png;base64 ,' . base64_encode($row['logo']) . '" alt=""></div>
                              </td>
                            <td>'.$row['nom_c'].'</td>
                            <td>'.$row['sigle'].'</td>
                            <td>'.$row['date_cr'].'</td>
                            <td>
                            <a href="joueur.php?id='.$row['id'].'" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="edit.php?id='.$row['id'].'"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="delete.php?id='.$row['id'].'"  class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr> ';
                    }
                    ?>
                </tbody>
            </table>
   
 <!-- add Modal HTML -->
 <div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form method="POST"  enctype="multipart/form-data">
     <div class="modal-header">      
      <h4 class="modal-title">Add New CLUB</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
      <div class="form-group">
       <label>Name</label>
       <input type="text" name="nomclub" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Sigle</label>
       <input type="text" name="sigle" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Date de création </label>
       <input type="date" name="datecreation" class="form-control" required>
      </div>
      <div class="form-group">
       <label>logo</label>
       <input type="file" name="logo">
      </div>     
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" name="submit" class="btn btn-success" value="Add">
     </div>
    </form>
   </div>
  </div>
 </div>
 



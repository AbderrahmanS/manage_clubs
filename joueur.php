<?php
    $con = new PDO("mysql:host=localhost;dbname=club", 'root', '');
    $id = $_GET['id'];
    $sql = $con->prepare("SELECT * FROM club_man where id=$id ");
    $sql->execute();
    $sql1 = $con->prepare("SELECT * FROM joueur where idClub=$id ");
    $sql1->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,600i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylejoueur.css" />
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>


</head>  
<body>

<?php
    while($row= $sql->fetch(PDO::FETCH_ASSOC)){
        echo '<header>';
        echo '<nobr>'.'<h2>'.$row['nom_c'].'</h2>'.'</nobr>';
        echo '</header>';  
    }
      ?>
           
         
<?php
    while($row1= $sql1->fetch(PDO::FETCH_ASSOC)){
        echo '<div class="infocardContainer">';
        echo '<div id="main">';
        echo '<img src="data:image/png;base64 ,' . base64_encode($row1['photo']) . '"></img>';
        echo '</div>';
        echo '<div id="textbois">';
        echo '<h2>'.$row1['nom'].'</h2>';
        echo '<h3>'.'Position : '.$row1['position'].'</h3>';
        echo '<h3>'."date d'Affectation : ".$row1['date_Naissance'].'</h3>';
        echo '<h3>'.'date de Naissance : '.$row1['dateAffectation'].'</h3>';
        echo '<div id="hotlinks">';
        echo '<a href="delete_joueur.php?id='.$row1['id'].'"><button class="btn btn-sm btn-outline-secondary badge" type="button"><i
        class="fa fa-trash-alt"></i></button></a>';
        echo '<a href="edit_joueur.php?id='.$row1['id'].'">';
        echo '<button class="btn btn-sm btn-outline-secondary badge" type="button" data-toggle="modal"
        data-target="#user-form-modal"><i class="fas fa-edit"></i></button>'; 
        echo '</a>'; 
        echo '</div>'; 
        echo '</div>';  
        echo '</div>';   
  }
  ?>      
            <footer>
            <div class="text-center px-xl-3">
                
            <center> <a href="add_joueur.php?id=<?php echo $id ?>" >
                <button class="btn transparent" id="sign-in-btn">Add New Joueur</button> </a>
             </center>
                </div>         
        
       </footer>
       
</body>
     
</html>
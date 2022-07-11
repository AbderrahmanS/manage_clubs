<?php
session_start();
$con = new PDO("mysql:host=localhost;dbname=club", 'root', '');
$err = '';
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $str = "SELECT user, pass FROM admin_c where user='$user' and pass='$pass' " ;
    $result = $con->query($str);
    $test = $result->fetchAll() ;
    if ($test) {
        header('location:form.php');
        $_SESSION['user'] = $user ;
    }
    else{
        $err = 'invalid login';
    }
}
if(isset($_POST['submit1'])){
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $photo = addslashes(file_get_contents($_FILES['photo']["tmp_name"]));
  $sql = "INSERT INTO admin_c(user,pass,photo) VALUES ('$user','$pass','$photo')";
  $con->exec($sql);

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style0.css" />
    <title>Sign in & Sign up Form</title>
    <style>
      #display-image{
    width: 100px;
    height: 100px;
    border-radius: 100%;
    background-position: center;
    background-size: cover;
  }
  </style>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form" method='post'>
            <h2 class="title">S'identifier</h2>
            <h3><?php echo $err ?></h3>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="user" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="pass" placeholder="Password" />
            </div>
            <input type="submit" value="Connexion" name="submit" class="btn solid" />
           
          </form>
          <form action="#" class="sign-up-form"  method='post' enctype="multipart/form-data">
            <h2 class="title">S'inscrire</h2>

<div id="display-image"></div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="user" placeholder="Username" required/>
            </div>
           
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="pass" placeholder="Password" required/>
            </div>
            
              <input type="file" name="photo" id="image-input" accept="image/jpeg, image/png, image/jpg" required/>
           
            <input type="submit" class="btn" name="submit1" value="Inscription" />
          
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Nouveau ici ?</h3>
            <p>
              Entrez vos données personnelles et commencez à gérer votre équipe 
            </p>
            <button class="btn transparent" id="sign-up-btn">
              S'inscrire
            </button>
          </div>
          <img src="football1.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Tu as un compte ?</h3>
            <p>
              Connectez vous facilement en saisissant vos données personnel
            </p>
            <button class="btn transparent" id="sign-in-btn">
              S'identifier
            </button>
          </div>
          <img src="football1.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
    <script >
      const image_input = document.querySelector("#image-input");

image_input.addEventListener("change", function() {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
    document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
  });

  reader.readAsDataURL(this.files[0]);
  document.getElementById("image-input").style.display="none";
});

    </script>
  </body>
</html>

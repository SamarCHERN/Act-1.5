<?php
  include "header.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      <h1>Connexion</h1>
  <div class="container">
  <div class="row">
  <div class="col-3"></div>
    <div class="col-6">
  <form action="" method="post">

  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Email address" value="<?php echo $_COOKIE['email']?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" name="pw" placeholder="Password" value="<?php echo $_COOKIE['mp']?>" >
  </div>
  <button type="submit" class="btn btn-primary" name="connexion">Login</button>
</form>
</div>
</div>
</div>
  </body>
</html>

<?php 
include "connexionDB.php";
if ( isset($_POST['connexion'])) {   
$email= $_POST['email'];
$pw=$_POST['pw'];
$hashePass=sha1($pw);

$stm=$db->prepare('SELECT * FROM utilisateur WHERE email=? AND pw=?');
$stm->execute(array($email, $hashePass));
// $count=$stm->rowCount();
$tab=$stm->fetchAll();

if (count($tab)==0){ echo "Email don't exist" ;
}else{

  $_SESSION['fname']=$tab[0]['fname'];
  $_SESSION["autoriser"]="oui";
  setcookie("mp",$_POST['pw'], time() + (86400*30),"localhost",true);
  setcookie("email",$_POST['email'], time() + (86400*30),"localhost" ,true,);
  header('Location: index.php');

}
}
?>




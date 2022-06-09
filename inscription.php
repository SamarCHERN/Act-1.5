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
      <h1>Inscription</h1>
  <div class="container">
  <div class="row">
  <div class="col-3"></div>
    <div class="col-6">
  <form action="inscription.php" method="post">
  <div class="mb-3">
    <label class="form-label">First name</label>
    <input type="text" class="form-control" name="fname" placeholder="First name" value="">
  </div>
  <div class="mb-3">
    <label class="form-label">Last name</label>
    <input type="text" class="form-control" name="lname" placeholder="Last name" value="">
  </div>
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Email address" value="">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" name="pw" placeholder="Password" value="">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Inscription</button>
</form>
</div>
</div>
</div>
  </body>
</html>
<?php 
include_once "connexionDB.php";
if ( isset($_POST['submit'])) {
    
    $sqlQuery = 'INSERT INTO utilisateur(fname, lname, email, pw) VALUES (:fname, :lname, :email, sha1(:pw))';
    
    $insertArticle = $db->prepare($sqlQuery);
    
    $insertArticle->execute([
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email'],
        'pw' => $_POST['pw'], 
    ]);
}
    ?>
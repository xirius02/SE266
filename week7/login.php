<?php
include '..\functions.php';
include '..\dbconnect.php';

if (isPostRequest()) {
    try
    {
    $db = getDatabase();
    $message = "";
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $stmt = $db->prepare("select username, password from users where username = :username and password = :password");
    $results = array();
    $binds = array(
        ":username" => $username,
        ":password" => $password
    );
    if ($stmt->execute($binds)) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    if (count($results) < 1) {
        $message = "invalid Username or Password";
        
    }else if ($username == $results[0]['username'] && $password == $results[0]['password']) 
                    {
        session_start();
        $_SESSION['username'] = $results[0]['username'];
        header('location: index.php');
                    }
    /*if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'User Created';
            }
    }*/}
    catch (Exception $ex)
    {
         echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
}
?>

<head>
    <link rel="stylesheet" type="text/css" href="style/style.css">
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="login.php">Login<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="createuser.php">Create<span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
            </nav>
    </head>
<link rel="stylesheet" type="text/css" href="style.css" href="style.css">
<html>
    <div class="login-page">
  <div class="form">
      <form class="login-form" method="post">
          <div>
              <?php 
              if (!empty($message)) {
              ?>
              <div>
                  <?php 
                  echo $message;
                  ?>
              </div>
              <?php
              }
              ?>
          </div>
      <input id="username" name="username" type="text" placeholder="username"/>
      <input id="password" name="password" type="password" placeholder="password"/>
      <button id="sub">login</button>
      <p class="message">Not registered? <a href="createuser.php">Create an account</a></p>
    </form>
  </div>
</div>
</html>

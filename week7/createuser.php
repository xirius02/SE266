<?php
include '..\functions.php';
include '..\dbconnect.php';
if (isPostRequestget()) {
    try
    {
    $db = getDatabase();
    $stmt = $db->prepare("INSERT INTO users SET username = :username, password = :password");
    
    $username = filter_input(INPUT_GET, 'username');
    
    $password = filter_input(INPUT_GET, 'password');
    
    $binds = array(
        ":username" => $username,
        ":password" => $password
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'User Created';
            }
    }
    catch (Exception $ex)
    {
         echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
     
 }
?>
<head>
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
  <div class="form" method="get">
    <form class="login-form">
        <input id="username" name="username" type="text" placeholder="username"/>
        <input id="password" name="password" type="password" placeholder="password"/>
      <button>Create User</button>
      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </form>
  </div>
</div>
</html>

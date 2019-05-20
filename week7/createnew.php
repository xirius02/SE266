<?php
session_start();
include '..\functions.php';
include '..\dbconnect.php';


$usr= "";

$usr = $_SESSION['username'];
    if (!isset($usr)) 
    {
      header('Location: login.php');
    }
    
    if (isPostRequest()) 
    {
    if (isset($_POST['sub'])) 
        {
        $db = getDatabase();
        
            if ($_POST["name"] == '' || $_POST['grouplead'] == '')
            {
                        $go = "All of the Fields Are Required";
            }else
            {
                /*$stmt = $db->prepare("INSERT INTO newproject SET name = :name, grouplead = :grouplead, date = now()");
                $binds = array(
                    ":name" => $name,
                    ":grouplead" => $lead
                );*/
                
                
                try
                { 
                    $name = filter_input(INPUT_POST, 'name');
                    $lead = filter_input(INPUT_POST, 'grouplead');
                    $date = date("m/d/y "."h:m:s", time());
                    
                       $stmt2 = $db->query("insert into newproject(name, grouplead, creationdate, workedtime, checkin, checkout, checkstat) values('$name','$lead',now(),now(),now(),now(),0)");
                    
                    
                } catch (Exception $ex) 
                {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
                   
                    
                $go = 'New Project Created';
            }
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
                        <a class="nav-item nav-link"><?php echo 'Hello '.$_SESSION['username']; ?><span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="logout.php">logout<span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
            </nav>
    </head>
<link rel="stylesheet" type="text/css" href="style.css" href="style.css">
<html>
    <form name="form1" id="form1" class="login-form" method="post">
        <div>
            <br />
          <div style="text-align: center">
              <a href="index.php"></a>
              <button id="in" class="btn btn-warning" type="button" onclick="window.location.href='index.php'">Index</button>
          </div>
            <br />
        </div>
    <div class="form">
        <label><?php if (isset($_POST['sub'])) {
                            echo $go;
                        } ?></label>
      <input id="name" name="name" type="text" placeholder="Project Name"/>
      <input id="leader" name="grouplead" placeholder="Group Leader"/>
      <input id="date" name="date" type="" disabled="" placeholder="<?php echo date("m/d/y "."h:m:s", time()); ?>"/>
      <button id="sub" name="sub">Create New project</button>
    </form>
</html>

<?php
session_start();
include '..\functions.php';
include '..\dbconnect.php';
$usr= "";

$usr = $_SESSION['username'];
    /*if (!isset($usr)) 
    {
      header('Location: login.php');
    }*/
    
    
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
                        <p class="nav-item" style="margin-top: 8px;" >Hello <?php echo $usr ?><span class="sr-only"></span></p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="login.php" >index<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="fileread.php" onclick="document.forms['form1'].submit();">view<span class="sr-only"></span></a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" name="destroy" id="destroy" href=""  onclick="<?php 
                        //session_destroy();
                        //header('Location: login.php');
                        ?>">Log Out<span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
            </nav>
    </head>
<?php
 if (isset($_POST['sub'])) 
    {
     $name="";
     $city="";
     $state="";
//$_SESSION['username'] = $usr;
    if (isset ($_FILES['file1'])) 
        {
        try
        {
            $db = getDatabase();
        $tmp_name = $_FILES['file1']['tmp_name'];
        $path = getcwd() .DIRECTORY_SEPARATOR . 'uploads';
        $new_name = $path . DIRECTORY_SEPARATOR . $_FILES['file1']['name'];
        move_uploaded_file($tmp_name, $new_name);
        $stmt = $db->query("delete from schools");
      /*working but only 1000 records
        $stmt = $db->query("drop table schools");
        $stmt3 = $db->query("CREATE TABLE `se266_008003477`.`schools` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `state` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`));");*/
        $file = fopen ('schools.csv', 'rb');
        /*$back = dbcon();
        echo $back;*/
    while (!feof($file)) {
       $school = fgetcsv($file);
       
        /*$stmt2 = $db->prepare("INSERT INTO schools SET name = :name, city = :city, state = :state");
        
        $binds = array
        (
            ":name" => $school[0],
            ":city" => $school[1],
            ":state" => $school[2]
        );*/
       //$stmt = $db->query("insert into schools(name, city, state) values(".schools[0].','.schools[1].','.schools[2].")");
       $stmt2 = $db->query("insert into schools(name, city, state) values('$school[0]','$school[1]','$school[2]')");
    }
        
        echo 'File Uploaded.';
            
        } catch (Exception $ex) 
            {
            echo $ex->getMessage();
            }
        
        }
    }

?>
    <style>
        div.form {
            border-style: solid;
            border-width: 3px;
            border-color: black;
            width: 500px;
            margin-top: 25px;
            
        }
    </style>
<form name="form1" action="upload.php" method="post" enctype="multipart/form-data">
    
    
    <body class="table table-dark">
    <div class="form" id="di" >
    <input type="file" name="file1">
    <input type="submit" name="sub" value="Upload">
    <br>
    <a>Select The desired file</a>
    </div>
    </body>

</form>
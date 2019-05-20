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
?>
<!DOCTYPE html>
<html>
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
                        <a class="nav-item nav-link"><?php echo 'Hello '.$_SESSION['username']; ?><span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="logout.php">logout<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="index.php">Index<span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
            </nav>
    </head>
    <body>
        <div style="width: 30%; margin-left: 30%;">
        <?php
        
            
            $db = getDatabase();
            
            $name = '';
            $grouplead = '';
            $id = '';
            
            $result = '';
            if (isPostRequest()) {
                
                $id = filter_input(INPUT_POST, 'id');
                $name = filter_input(INPUT_POST, 'name');
                $grouplead = filter_input(INPUT_POST, 'grouplead');
                
      if ($name == '' || $grouplead == '') 
            {
                $result = "All of the Fields Are Required";
                header('refresh:0; url=index.php');
                exit;
                }
                $stmt = $db->prepare("UPDATE newproject set name = :name, grouplead = :grouplead where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":grouplead" => $grouplead,
                    ":name" => $name,
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                } 
            } else {
                // Update.php?id=1
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM newproject where id = :id");
                $binds = array(
                    ":id" => $id,
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    //if ($stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                    $id = $results['ID'];
                    $grouplead = $results['grouplead'];
                    $name = $results['name'];
                    //} else {
                    
                    //}
                }
                else 
                {
                  echo 'Record not found';  
                }
                
            }
        ?>
        
        <h1><?php echo $result; ?></h1>

        <form method="post" action="#">
            <label for="email">id</label>
            <input type="text" class="form-control" readonly value="<?php echo $id; ?>" name="id" />
            <br />
            <label for="email">Name</label>
            <input type="text" class="form-control" value="<?php echo $name; ?>" name="name" />
            <br />
            <label for="email">Group Lead</label>
            <input type="text" class="form-control" value="<?php echo $grouplead; ?>" name="grouplead" />
            <br />
            <input type="submit" name="sub" id="sub" class="btn btn-primary" value="Update" />
        </form>
        </form>
    </div>
    </body>
</html>
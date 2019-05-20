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
    
    $back = wholebaseprojects();
?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top;}
.tg .tg-0lax{text-align:left;vertical-align:top;}
.tg td{border-radius: 25px;}
</style>



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
                </ul>
            </div>
            </nav>
    </head>
<link rel="stylesheet" type="text/css" href="style.css" href="style.css">
<html>
    <form name="form1" method="get">
        <div class="">
        <div>
          <div style="text-align: center">
              <a href="createnew.php">Create New Project</a>
          </div>
        </div>
            <div>
                <table class="tg">
                <thead>
                    <tr>
                      <th class="tg-0pky">ID</th>
                      <th class="tg-0pky">Project Name</th>
                      <th class="tg-0lax">Group Leader</th>
                      <th class="tg-0lax">Creation Date</th>
                      <th class="tg-0lax">Worked Time</th>
                      <th class="tg-0lax" style="text-align: center;">Actions</th>
                      <th class="tg-0lax">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stat = NULL;?>
                    <?php if(isset($back)) foreach ($back as $row)
                       { 
                        if ($row['checkstat'] == 1) 
                            {
                                $stat = 1;
                                $myid = $row['ID'];
                            }
                       }
                    ?>
            <?php if(isset($back)) foreach ($back as $row): ?>
                    <tr>
                        <td class="tg-0lax"><?php echo $row['ID'] ?></td>
                        <td class="tg-0lax"><?php echo $row['name'] ?></td>
                      <td class="tg-0lax"><?php echo $row['grouplead'] ?></td>
                      <td class="tg-0lax"><?php echo $row['creationdate'] ?></td>
                      <td class="tg-0lax"><?php echo $row['workedtime'].' Minutes' ?></td>
                      <td><a class="btn btn-primary" name='id' <?php if ($stat == 1) { }else { ?>href="checkin.php?id=<?php echo $row['ID']; ?>"<?php  }?> >Check In</a><a>  </a><a class="btn btn-primary" href="edit.php?id=<?php echo $row['ID']; ?>">View Project</a><a>  </a><a class="btn btn-danger" name='id2' <?php if ($stat == 1 && $myid == $row['ID']) {?> href="checkout.php?id=<?php echo $row['ID']; ?>"<?php }else { }?> >Check Out</a><a>  </a><a class="btn btn-danger" href="Delete.php?id=<?php echo $row['ID']; ?>">Delete</a></td>
                      <td class="tg-0lax"><?php if ($row['checkstat'] == 0) { echo 'Inactive';}else { echo 'Active';} ?></td>
                    </tr>
            <?php endforeach; ?>
                </tbody>
                  </table>
          </div>
        </div>
    </form>
</html>

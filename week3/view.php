<!DOCTYPE html>
<html >
    <?php
    include 'navbarbootstrap.html';
    ?>
    <body class="table table-dark">
        <?php
        
        include './dbconnect.php';
        include './functions.php';
        //include './form1.php';
        include './form2.php';
        include './dbadd.php';
        /*
         * get and hold a database connection 
         * into the $db variable
         */
        $db = getDatabase();
        /*
         * create a variable to hold the database
         * SQL statement
         */
        if (!isset($_GET['submit1'])) 
        {
            $back = wholebase();
        }
        else
        {
           $back = getSearchData($_GET['dataone'], $_GET['datatwo']);
        }
        
        
            
        ?>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Corp</th>
                    <th scope="col">Incorp_dt</th>
                    <th scope="col">Email</th>
                    <th scope="col">Zipcode</th>
                    <th scope="col">owner</th>
                    <th scope="col">phone</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            
            <?php if(isset($back)) foreach ($back as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><a class="btn btn-warning" href="Update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a class="btn btn-danger" href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>  
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
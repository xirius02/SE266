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
        /*
         * get and hold a database connection 
         * into the $db variable
         */
        $db = getDatabase();
        /*
         * create a variable to hold the database
         * SQL statement
         */
        if(!isset($_GET['dataone']))
        {
            $stmt = $db->prepare("SELECT * FROM corps");
        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
            
        }
        else
        {
        $searchWord = $_GET['dataone'];
        $column = 'zipcode';
        $owner = $_GET['datatwo'];
        $order = 'ASC'; //DESC
        $order2 = 'DESC'; //DESC
        
        if($_GET['asc'] == 'ascending')
        {
            if($_GET['datatwo'] == 'owner')
            {
                $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY $owner $order");
                $search = '%'.$searchWord.'%';
                $binds = array
                (
                     ":search" => $search
                );
                $results = array();
                if ($stmt->execute($binds) && $stmt->rowCount() < 0)
                {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                if ($stmt->rowCount() == 0) 
                {
                    echo 'Nothing Found, Try Again';
                }
                
            }
            else
            {
                $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY $column $order");
                $search = '%'.$searchWord.'%';
                $binds = array
                (
                     ":search" => $search
                );
                $results = array();
                if ($stmt->execute($binds) && $stmt->rowCount() > 0)
                {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                
                if ($stmt->rowCount() == 0) 
                {
                    echo 'Nothing Found, Try Again';
                }
            }
                
        }
        if($_GET['asc'] == 'descending')
        {
            if($_GET['datatwo'] == 'owner')
            {
                $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY $owner $order2");
                $search = '%'.$searchWord.'%';
                $binds = array
                (
                        ":search" => $search
                );
                $results = array();
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
                {
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                
                if ($stmt->rowCount() == 0) 
                {
                    echo 'Nothing Found, Try Again';
                }
            }
            else
            {
                $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY $column $order2");
                $search = '%'.$searchWord.'%';
                $binds = array
                (
                        ":search" => $search
                );
                $results = array();
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
                {
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                                
                if ($stmt->rowCount() == 0) 
                {
                    echo 'Nothing Found, Try Again';
                }
            }
                
        }
        
        
        
        }//end if
            
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
            
            <?php if(isset($results)) foreach ($results as $row): ?>
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
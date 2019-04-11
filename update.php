<!DOCTYPE html>
<html>
    <?php include 'navbarbootstrap.html';?>
    <body>
        <div style="width: 30%; margin-left: 30%;">
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            
            $db = getDatabase();
            $result = '';
            $corp = '';
            $email = '';
            $zipcode = '';
            $owner = '';
            $phone = '';
            $incorp_dt = '';
            
            $result = '';
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                $stmt = $db->prepare("UPDATE corps set corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                } 
            } else {
                // Update.php?id=1
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    //if ($stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                    $corp = $results['corp'];
                    $email = $results['email'];
                    $zipcode = $results['zipcode'];
                    $owner = $results['owner'];
                    $phone = $results['phone'];
                    //} else {
                    
                    //}
                }
                else 
                {
                  echo 'Record not found';  
                }
                
                if ( !isset($id) ) 
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
            <label for="email">Corp</label>
            <input type="text" class="form-control" value="<?php echo $corp; ?>" name="corp" />
            <br />
            <label for="email">email</label>
            <input type="text" class="form-control" value="<?php echo $email; ?>" name="email" />
            <br />
            <label for="email">zipcode</label>
            <input type="text" class="form-control" value="<?php echo $zipcode; ?>" name="zipcode" />
            <br />
            <label for="email">owner</label>
            <input type="text" class="form-control" value="<?php echo $owner; ?>" name="owner" />
            <br />
            <label for="email">phone</label>
            <input type="text" class="form-control" value="<?php echo $phone; ?>" name="phone" />
            <br />
            <input type="submit" class="btn btn-primary" value="Update" />
        </form>
        </form>
    </div>
    </body>
</html>
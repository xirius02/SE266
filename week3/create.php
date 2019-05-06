<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" style="color:white" href="index_1.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php">View<span class="sr-only">View</span></a>
                    </li>
                </ul>
            </div>
            </nav>
    </head>
    <body>
        <div style="width: 30%; margin-left: 30%; margin-top: 2%;">
        <?php
        try
        {
        include './dbconnect.php';
        }
        catch (Exception $ex)
        {
            echo $ex->getMessage();
        }
        try
        {
        include './functions.php';
        } catch (Exception $ex)
        {
            echo $ex->getMessage();
        }
        $results = '';
        try
        {
            if (isPostRequest()) {
            $db = getDatabase();
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
            
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );
            /*
             * empty()
             * isset()
             */
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        } catch (Exception $ex) {
            
            echo $ex->getMessage();

        }
        
        ?>
    <h1>Add Corp</h1>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">
            <div>
            <div class="form-row"">
                <h6 for="corp">Corp</h6>
                <input type="text" class="form-control input-sm" id="inputsm" value="" name="corp">
            </div>
            <div>
            <label for="email">email</label>
            <input type="text" class="form-control" value="" name="email" />
            </div>
            <div>
            <label for="zip">zipcode</label>
            <input type="text" class="form-control" value="" name="zipcode" />
            </div>
            <div>
            <label for="corp">owner</label>
            <input type="text" class="form-control" value="" name="owner" />
            </div>
            <div>
            <label for="corp">phone</label>
            <input type="text" class="form-control" value="" name="phone" />
            </div>
            <div class="text-center py-4 mt-3">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
            </div>

        </form>
        </div>
    </body>
</html>
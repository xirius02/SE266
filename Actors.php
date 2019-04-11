<!DOCTYPE html>
<html>
<body>
    <a href="index.html" name="index">Index</a>
    <a href="actorsview.php" name="view">view actors</a>
    <?php
        include './dbconnect.php';
        include './functions.php';
        
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
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        }catch (Exception $ex)
        {
           echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        
    ?>
    
<h2>Add Corp</h2>


 
<form action="#" method="post">
  First name:<br>
  <input type="text" name="name" value="">
  <br>
  Last name:<br>
  <input type="text" name="lname" value="">
  <br>
  Date of birth:<br>
  <input type="text" name="dob" id="ch" value="" onclick="//mee();">
  <br>
  Height:<br>
  <input type="text" name="height" id="ch" value="" onclick="//mee();">
  <br>
  <input type="submit" value="Submit">
  <br>
  <?php if (isPostRequest()) {echo $results;} ?>
</form>

<script type="text/javascript">
 var ty = document.getElementById('ch');
    function mee(){
        ty.value = "ss";
    }
 </script>

</body>
</html>
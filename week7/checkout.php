<?php 
session_start();

include '..\functions.php';
include '..\dbconnect.php';

$usr = $_SESSION['username'];
    if (!isset($usr)) 
    {
      header('Location: logout.php');
    }
    $diff = '';
$id = filter_input(INPUT_GET, 'id'); 
$comeback = checkout($id);
         $db = getDatabase();

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
                    $checkin = $results['checkin'];
                    $checkout = $results['checkout'];
                    $worked = $results['workedtime'];
                       //$stmt2 = $db->query("SELECT TIMESTAMPDIFF(MINUTE, '$checkin','$checkout' )");
                $checkin2 = new DateTime($checkin);
                $checkout2 = new DateTime($checkout);
                $finaldate = $checkin2 ->diff($checkout2);
                }
                else 
                {
                  echo 'Record not found';  
                }
                $finaldate2 =  $finaldate->format('%i');
                echo $finaldate2;
                $insert2 = $worked + $finaldate2;
             $stmt2 = $db->query("update newproject set workedtime = '$insert2' where id = '$id' ");

      header('Location: index.php');
?>
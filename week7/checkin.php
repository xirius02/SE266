<?php 
session_start();

include '..\functions.php';
include '..\dbconnect.php';

$id = filter_input(INPUT_GET, 'id'); 

$comeback = checkin($id);
header( 'refresh:0; url=index.php' );

?>
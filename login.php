<?php

include('xmlrpc.inc');
 
 $host = $_POST['host'];
 $port = $_POST['port'];
 $dbname = 'erp';
 $username = $_POST['username'];
 $password = $_POST['password'];

 session_start();

$_SESSION['username']=$username;
$_SESSION['password']=$password;
$_SESSION['dbname']=$dbname;
$_SESSION['host']=$host;
$_SESSION['port']=$port;

header("location:employee.php");

?>
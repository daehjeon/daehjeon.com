<?php 
if (!isset($_SESSION)) {
	session_start();
}

$localhost='localhost';
$username='daehjeon';
$password='920125jdh';

$systemOn = true;

$con = mysql_connect($localhost,$username,$password);
if (!$con){
	die('Could not connect: ' . mysql_error());
}

?>
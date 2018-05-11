<?php 
include ('config.php');

$to = "daehjeon@gmail.com";
$subject = "Email from daehjeon.com";
$message = $_POST['comment'];
$from = $_POST['name']." <".$_POST['email'].">";
$headers = "From:" . $from;

if (mail($to,$subject,$message,$headers)){
	$query = mysql_query('INSERT INTO daehjeon_webpage.email (name,email,comment,date) VALUES ("'.addslashes($_POST['name']).'", "'.addslashes($_POST['email']).'", "'.addslashes($_POST['comment']).'", NOW())');
	
	echo '<script type="text/javascript">alert("Email successfully sent!")</script>';
	die ("<meta http-equiv='refresh' content='0;url=http://www.daehjeon.com/contact.php'>");
}else{
	$query = mysql_query('INSERT INTO daehjeon_webpage.email (name,email,comment,date) VALUES ("'.addslashes($_POST['name']).' [Failed]'.'", "'.addslashes($_POST['email']).'", "'.addslashes($_POST['comment']).'", NOW())');

	echo '<script type="text/javascript">alert("Error occured while sending the email. Please email me directly at daehjeon@gmail.com")</script>';
	die ("<meta http-equiv='refresh' content='0;url=http://www.daehjeon.com/contact.php'>");
}
	
	

?>
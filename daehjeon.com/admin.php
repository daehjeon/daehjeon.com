<?php include_once ('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
<title>Dae Jeon | Admin</title>
<?php include('header.php');

if (isset($_POST['login_submit'])){
	if ($_POST['login_username'] == $username && $_POST['login_password'] == $password){
		$_SESSION['Username'] = $_POST['login_username'];
		die ("<meta http-equiv='refresh' content='0;url=http://www.daehjeon.com'>");
	}else{
		echo '<script type="text/javascript">alert("Incorrect username or password!!")</script>';
	}
}

?>
</head>
 <body>
<!--start container-->
<div id="container">
   <?php include ('nav.php');?>
   <!--start holder-->
   <div class="holder_content">
    <section class="group1_full">
       <h3>Admin</h3>
       <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <table>
           <tr>
            <td align="right">Login Username
               <input type="text" name="login_username">
             </td></tr>
           <tr>
             <td align="right">Login Password
           <input type="password" name="login_password" /></td>
           </tr>
         </table>
  	<input type="submit" name="login_submit" value="Login" />
      </form>
    </section>
    <p style="margin-bottom:700px;"></p>
  </div>
  <!--end holder-->
</div>
<!--end container-->
<?php include('footer.php'); ?>
</body>
</html>
 
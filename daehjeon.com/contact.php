<?php include_once ('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
<title>Dae Jeon | Contact</title>
<?php include('header.php');?>
</head>
<body>
<!--start container-->
<div id="container">
  <?php include ('nav.php');?>
  <!--start holder-->
  <div class="holder_content">
    <section class="group1_full">
      <h3>Contact Me</h3>
      <p>If you want to contact me, you can email me directed at <a href="mailto:daehjeon@gmail.com">daehjeon@gmail.com</a> or use form below.</p>
      <br>
      <br>
      <form action='email.php' method='post' name="contact" id="contact">
        <label for='name'>Name<span> (Required)</span></label>
        <input type='text' name='name' id='name' />
        <br>
        <label for='email'>Email<span> (Required)</span></label>
        <input type='text' name='email' id='email'/>
        <br>
        <br>
        <label for='comment'>Contact me regarding anything!<span> (Required)</span></label>
        <br>
        <textarea name='comment' id='comment' rows='20' cols='20' style="width:600px"></textarea><br /><br />
        <p class='contact-submit'>
          <INPUT TYPE="image" SRC="images/submit3.png" WIDTH="80" onClick="return validateForm();" ALT="SUBMIT!">
        </p>
      </form>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </section>
  </div>
  <!--end holder-->
</div>
<!--end container-->
<?php include('footer.php'); ?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
</body>
</html>

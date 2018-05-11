<?php include_once ('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
<title>Dae Jeon | About</title>
<link rel="stylesheet" href="css/craftyslide.css" />
<?php include('header.php');

$about_me = mysql_query('SELECT *, DATE_FORMAT(last_modified_date,"%b %d, %Y") as date FROM daehjeon_webpage.description where category = "About Me"') or die('Failed to bring about me description');
$aboutme_pic = mysql_query('SELECT * FROM daehjeon_webpage.download where category = "About Me"') or die('Failed to bring about me pictures');
?>

<style type="text/css">
pre {
	white-space: pre-wrap;       /* css-3 */
	white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
	white-space: -pre-wrap;      /* Opera 4-6 */
	white-space: -o-pre-wrap;    /* Opera 7 */
	word-wrap: break-word;       /* Internet Explorer 5.5+ */
}
</style>
</head>
<body>
<?php if (!empty($_SESSION['Username'])){ ?>
<div id="sidebar">
<h3>Update Picture</h3>
<form action="upload.php" method="post">
  <table>
    <?php for ($i=1; $i <= mysql_num_rows($aboutme_pic); $i++){ ?>
    <tr>
      <td align="right">Picture <?=$i?>
        <input type="file" name="aboutme_pic<?=$i?>"></td>
    </tr>
    <tr>
      <td>Current: <?=mysql_result($aboutme_pic,($i-1),'file_name')?><br />
        <br /></td>
    </tr>
    <? } ?>
  </table>
  <input type="submit" name="aboutme_pic_submit" value="Update">
  <p align="left"><a href="logout.php">logout</a></p>
  </div>
  <? }?>
  <!--start container-->
  <div id="container">
  <?php include ('nav.php');?>
  <!--start holder-->
  <div class="holder_content">
  <section class="group1_full">
  <h3>About Me</h3>
  <?php if (!empty($_SESSION['Username'])){ ?>
  <p align="right">Add Picture
    <input type="file" name="add_aboutme_pic">
    <br />
    Delete Picture
    <select name="delete_aboutme_pic">
      <?php for ($i=0; $i < mysql_num_rows($aboutme_pic); $i++){ 
	  	echo '<option value="'.mysql_result($aboutme_pic,$i,'file_id').'">'.mysql_result($aboutme_pic,$i,'title').'</option>';
	  }?>
    </select>
  </p>
  <? } ?>
  <div id="slideshow">
    <ul>
      <?php for ($i=0; $i < mysql_num_rows($aboutme_pic); $i++){ 
			echo '<li> <img src="image.php?file='.mysql_result($aboutme_pic,$i,'file_id').'" title="'.mysql_result($aboutme_pic,$i,'title').'" /> </li>'; 
		} ?>
    </ul>
  </div>
  <?php 
	  if ($_GET['mode'] == 'edit'){
	  		echo "<textarea name='aboutme_descr' cols='115' rows='30'>".mysql_result($about_me,0,'description')."</textarea>";
	  }else{
	  	echo "<pre>".mysql_result($about_me,0,'description')."</pre>";
	  }
	  echo '<p align="right">last modified - '.mysql_result($about_me,0,'date').'</p>';
	  
	  if (!empty($_SESSION['Username']) && $_GET['mode'] == 'edit'){ ?>
  <input type="submit" name="aboutme_descr_submit">
  <input type="button" value="Cancel" onclick="location.href='<?=$_SERVER['PHP_SELF']?>'">
  <? }else if (!empty($_SESSION['Username'])){ 
	  		echo '<br><br /><p align="right"><a href="'.$_SERVER['PHP_SELF'].'?mode=edit">Edit</a></p>';
	  } ?>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
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
<script src="js/jquery.js"></script>
<script src="js/craftyslide.js"></script>
<script type="text/javascript"src="js/stickysidebar.js"></script>
<script>
	$("#slideshow").craftyslide({
		'width': 640,
 		'height': 400
	});

	(function($){
		$('#sidebar').stickySidebar();
	})(jQuery);
</script>
</body>
</html>

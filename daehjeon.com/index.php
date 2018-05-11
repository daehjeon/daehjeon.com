<?php include_once ('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
<title>Dae Jeon | Home</title>
<?php include('header.php');

$html_resume = mysql_query("SELECT *, DATE_FORMAT(last_modified_date,'%b %d, %Y') as date  FROM daehjeon_webpage.download WHERE category = 'resume' AND mime_type = 'text/html'");
$pdf_resume = mysql_query("SELECT * FROM daehjeon_webpage.download WHERE category = 'resume' AND mime_type like '%application%'");
$descr = mysql_query("SELECT * FROM daehjeon_webpage.download d, daehjeon_webpage.description descr WHERE d.category = 'Work' and descr.file_id = d.file_id LIMIT 0,3");

?>
</head>
<body>
<!--start container-->
<div id="container">
  <?php include ('nav.php');?>
  <!--<iframe scrolling="no" frameborder=0 src="slider.html" width="100%" height="450px;"></iframe>-->
  <!--start holder-->
  <div class="holder_content"><!--
    <section class="group1_full"><br />
    Hi! Welcome to my personal portfolio website. This page was created in the summer of 2012 for advertising my skills and expertise purposes. Cheers! 
    </section>-->
    <section class="group1">
      <h3>Work & Project</h3>
      <p align="center">Some of the project I had worked on during my previous coop terms and spare time.</p>
      <?php for ($i=0; $i < mysql_num_rows($descr); $i++){?>
      <article class="holder_gallery"> <a class="photo_hover2" href="work.php?id=<?=mysql_result($descr,$i,'id')?>"><img src="image.php?file=<?=mysql_result($descr,$i,'file_id')?>" width="150" height="100" alt="CEMC"/></a>
        <h2><?=mysql_result($descr,$i,'title')?></h2>
        <p>
		<?php $string = explode(" ", mysql_result($descr,$i,'description'));
		$j = 0;
		$max = 24;
		for ($k=0; $k < $max; $k++){
			if (!empty($string[$k])){
				echo $string[$k]." ";
			}else{
				break;
			}
		}
		
		if ($k==$max){
			echo '...';
		}?></p>
        <span class="readmore"><a href="work.php?id=<?=mysql_result($descr,$i,'id')?>">Read more..</a></span> </article>
        <? } ?>  
    </section>
    <aside class="group2">
      <h3>Latest news</h3>
      <article class="holder_news">
        <h4>Work page updated <span>05.03.2012</span></h4>
        <p>Finished coding Work page using fancybox jquery UI. <span class="readmore"><a href="#">Read more..</a></span></p>
      </article>
      <article class="holder_news">
        <h4>Resume Updated<span>05.01.2012</span></h4>
        <p>PDF and HTML versions of my resume are updated and available for download. <span class="readmore"><a href="#">Read more..</a></span></p>
      </article>
      <article class="holder_news">
        <h4>Personal Website<span>04.20.2012</span></h4>
        <p>Created my portfolio website with html5, jQuery and PHP.<span class="readmore"> <a href="#">Read more..</a></span></p>
      </article>
      <article class="holder_news" style="margin-top:40px;">
        <h3>Résumé</h3>
        <h4><a href="download.php?file=<?=mysql_result($pdf_resume,0,'file_id')?>"><img src="images/logo/pdf-logo.png" width="30"/ title="PDF Download"></a> <a href="Dae_Jeon_Resume.pdf">PDF Version</a><br />
        <a href="download.php?file=<?=mysql_result($html_resume,0,'file_id')?>"><img src="images/logo/html-logo.png" width="30" title="HTML Download"/></a> <a href="Dae_Jeon_Resume.html">HTML Version</a></h4>
        <h5 align="right">- updated <?=mysql_result($html_resume,0,'date')?> -</h5></article>
      <!--<a class="photo_hover2" href="#"><img src="images/picture3.jpg" width="257" height="295" alt="picture"/></a> -->
    </aside>
    <section class="group3">
      <h3>About Me</h3>
      <a class="photo_hover2" href="about.php"><img src="images/aboutme/syde161_project.png" width="175" alt="About Me"/></a><br />
      <p>Hi! Welcome to my personal website. My name is Dae Jeon and I am currently studying Systems Design Engineering at University of Waterloo. <br>
Some of my interests are learning about application development and I am hoping to pursue my career further into those area. <br><span class="readmore"> <a href="about.php">Read more..</a></span> </p>
      <!--
      <br /><br /><br /><h3>Testimonials</h3>
      <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec molestie. Sed aliquam sem ut arcu. Phasellus sollicitudin. 
        Vestibulum condimentum facilisis nulla. In hac habitasse platea dictumst." - Lorem ipsum </p>
      <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec molestie. Sed aliquam sem ut arcu. Phasellus sollicitudin. 
        Vestibulum condimentum facilisis nulla. In hac habitasse platea dictumst." - Lorem ipsum </p>-->
    </section>
  </div>
  <!--end holder-->
</div>
<!--end container-->
<?php include('footer.php'); ?>
<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/slider.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>

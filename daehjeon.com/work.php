<?php include_once ('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<!-- Add jQuery library -->
<script type="text/javascript" src="js/jquery.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/fancybox/fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="css/fancybox/fancybox.css" media="screen" />
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="js/fancybox/fancybox-mousewheel-3.0.6.pack.js"></script>
<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="css/fancybox/fancybox-buttons.css" />
<script type="text/javascript" src="js/fancybox/fancybox-buttons.js"></script>
<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="css/fancybox/fancybox-thumbs.css" />
<script type="text/javascript" src="js/fancybox/fancybox-thumbs.js"></script>

<head>
<meta charset="UTF-8">
<title>Dae Jeon | Work & Experience</title>
<?php include('header.php');

$work_pic = mysql_query("SELECT * FROM daehjeon_webpage.download d, daehjeon_webpage.description descr WHERE d.category = 'Work' and descr.file_id = d.file_id");

if (!empty($_GET['id'])){
	$work_detail = mysql_query("SELECT * FROM daehjeon_webpage.project where desc_id = ".$_GET['id']) or die(111);
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
      <h3>Work Experience</h3>
      <div id="exp_box">
        <?php for ($i=0; $i < mysql_num_rows($work_pic); $i++){ ?>
        <article><a data-fancybox-group="project" class="fancybox fancybox.iframe" title="<h5 style='text-align:center;'><a target='_blank' href='<?=mysql_result($work_pic,$i,'url')?>'>View in window</a></h5>" href="<?=mysql_result($work_pic,$i,'url')?>"><img src="image.php?file=<?=mysql_result($work_pic,$i,'file_id')?>"></a></article>
        <? } ?>
      </div>
      <div id="exp_title">
        <?php for ($i=0; $i < mysql_num_rows($work_pic); $i++){ ?>
        <article> <?php echo mysql_result($work_pic,$i,'title');?> </article>
        <? } ?>
      </div>
      <div id="exp_descr">
        <?php for ($i=0; $i < mysql_num_rows($work_pic); $i++){ ?>
        <article>
          <p>
            <?=mysql_result($work_pic,$i,'description')?>
            <br />
            <span class="readmore"><a href="<?=$_SERVER['PHP_SELF'].'?id='.mysql_result($work_pic,$i,'id')?>">Read more..</a></span></p>
        </article>
        <? } ?>
      </div>
    </section>
  	<div id="exp_detail">
		<?php 
      	if (!empty($_GET['id'])){
			echo '<hr/>';
			
			for ($i=0; $i < mysql_num_rows($work_detail); $i++){
				if (mysql_result($work_detail,$i,'url') !== ''){ ?>
				
                <article><a data-fancybox-group="<?=mysql_result($work_detail,$i,'category')?>" class="fancybox fancybox.iframe" title="<h5 style='text-align:center;'><?=mysql_result($work_detail,$i,'name')?><br><br><a target='_blank' href='<?=mysql_result($work_detail,$i,'url')?>'>View in window</a></h5>" href="<?=mysql_result($work_detail,$i,'url')?>"><h4><?=mysql_result($work_detail,$i,'name')?></h4></a><p><?=mysql_result($work_detail,$i,'description')?></p></article>
			
         <?php }else{
					echo '<article><h4>'.mysql_result($work_detail,$i,'name').'</h4><p>'.mysql_result($work_detail,$i,'description').'</p></article>';
				}
			}
		} ?>
      </div>
  </div>
  <!--end holder-->
</div>
<!--end container-->
<?php include('footer.php'); ?>
<script type="text/javascript">
//$("a[rel='portfolio']").each(function(e) {
$("a").each(function(e) {
    var title = $(this).attr('title');
    $(this).mouseover(
        function() {
            $(this).attr('title','Click to view in iframe');
        }).mouseout(
            function() {
            $(this).attr('title', title);
    });
    $(this).click(
    function() {
        $(this).attr('title', title);
        }
    );
});
</script>
</body>
</html>
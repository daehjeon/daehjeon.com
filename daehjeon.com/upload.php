<?php 
include_once ('config.php');

if (isset($_POST['resume_submit'])){
	if (!empty($_FILES['pdf_resume']) && $_FILES['pdf_resume']['size'] > 0){		//new file added
		
		$fileName = $_FILES['pdf_resume']['name'];	
		$fileName = str_replace(" ","_",$fileName);
		$tmpName = $_FILES['pdf_resume']['tmp_name'];
		$fileSize = $_FILES['pdf_resume']['size'];
		$fileType = $_FILES['pdf_resume']['type'];
		$fp= fopen($tmpName, 'r');
		$fileData = fread($fp, filesize($tmpName));
		$fileData = addslashes($fileData);
		fclose($fp);
		
		if(!get_magic_quotes_gpc()) {
			$fileName = addslashes($fileName);
		}
		
		mysql_query("UPDATE daehjeon_webpage.download SET file_data = '".$fileData."', file_name = '".$fileName."', file_size=".$fileSize.", mime_type='".$fileType."', last_modified_date=NOW() WHERE category = 'resume' AND mime_type = 'application/pdf'") or die('Failed to upload PDF Resume');
	}
	
	
	if (!empty($_FILES['html_resume']) && $_FILES['html_resume']['size'] > 0){		//new file added
		
		$fileName = $_FILES['html_resume']['name'];	
		$fileName = str_replace(" ","_",$fileName);
		$tmpName = $_FILES['html_resume']['tmp_name'];
		$fileSize = $_FILES['html_resume']['size'];
		$fileType = $_FILES['html_resume']['type'];
		$fp= fopen($tmpName, 'r');
		$fileData = fread($fp, filesize($tmpName));
		$fileData = addslashes($fileData);
		fclose($fp);
		
		if(!get_magic_quotes_gpc()) {
			$fileName = addslashes($fileName);
		}
		
		mysql_query("UPDATE daehjeon_webpage.download SET file_data = '".$fileData."', file_name = '".$fileName."', file_size=".$fileSize.", mime_type='".$fileType."', last_modified_date=NOW() WHERE category = 'resume' AND mime_type = 'text/html'") or die('Failed to upload PDF Resume');
	}

}else if (isset($_POST['aboutme_descr_submit'])){
	mysql_query('UPDATE daehjeon_webpage.description SET description = "'.addslashes($_POST['aboutme_descr']).'" , last_modified_date = NOW() WHERE category = "About Me"') or die('asd');	
}



$get_par = strstr($_SERVER['HTTP_REFERER'], '?');
$url = str_replace($get_par,'',$_SERVER['HTTP_REFERER']);
die ("<meta http-equiv='refresh' content='0;url=".$url."'>");
?>

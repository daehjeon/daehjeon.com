<?php 
include_once ('config.php');

$key = $_GET['file'];

if (isset($key)){
	$sql = mysql_query("SELECT * FROM daehjeon_webpage.download WHERE file_id = ".$key);
	
	$data = mysql_result($sql, 0, "file_data");		//img data file
	$type = mysql_result($sql, 0, "mime_type");		//img type

	header("Content-type: $type"); 
	echo $data;		//execute download box


	
	mysql_query ("UPDATE daehjeon_webpage.download SET downloads = ".(mysql_result($sql,0,'downloads')+1)." WHERE file_id = ".$key);		//# of downloads increase by 1
}
?>

<?php
include_once ('config.php');

$key = $_GET['file'];

if (isset($key)){
	$sql = mysql_query("SELECT * FROM daehjeon_webpage.download WHERE file_id = ".$key);
	
	$data = mysql_result($sql, 0, "file_data");		//resource data file
	$name = mysql_result($sql, 0, "file_name");		//resource name
	$size = mysql_result($sql, 0, "file_size");		//resource size
	$type = mysql_result($sql, 0, "mime_type");		//resource type

		
	header ("Content-type: $type");
	header ("Content-length: $size");
	header ("Content-Disposition: attachment; filename=$name");
	header ("Content-Description: PHP Generated Data");
	echo $data;		//execute download box


	
	mysql_query ("UPDATE daehjeon_webpage.download SET downloads = ".(mysql_result($sql,0,'downloads')+1)." WHERE file_id = ".$key);		//# of downloads increase by 1
}
?>
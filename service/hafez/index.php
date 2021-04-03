<?php
$filename="db/".rand(1,495).".txt";

$fp = fopen($filename, "r");
//$s=fread($fp, filesize($filename));
for($i;$i<4;$i=$i+1)
	$s=$s.stream_get_line($fp,65535 ,"\n");

$s=iconv( 'windows-1256','UTF-8', $s);
echo $s;
fclose($fp); 
?>
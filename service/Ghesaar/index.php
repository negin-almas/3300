<?php
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$time_start = microtime_float();
// Sleep for a while
//usleep(100);


$filename="Ghesaar.db";
$fp = fopen($filename, "r");
$rnd=rand(1,130);
for($i;$i<$rnd;$i=$i+1)
{
$s=stream_get_line($fp,65535 ,"\n");
}
$s = str_replace(";", chr(13).chr(10), $s);
//$s=iconv( 'windows-1256','UTF-8', $s);
echo $s;

$time_end = microtime_float();
$time =(int) (($time_end - $time_start)*1000);
echo chr(13).chr(10)."T:".$time.""."ms";
fclose($fp); 
?>
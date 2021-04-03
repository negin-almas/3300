<?php
define('MAXSMSLEN', 536);//67char*8sms=536
$dbfilename='db.csv';
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
//-----------------------------------------
$time_start = microtime_float();

if(!file_exists($dbfilename))
    die('[Error]:File Not Found!');
$fp = fopen($dbfilename, "r");
$i=0;
while (!feof($fp))
{
$s=stream_get_line($fp,65535 ,"\n");
$i++;
if (strlen($s)>=MAXSMSLEN)
  die('[Error]:Record Is Too Big. Line:'.$i) ;
}

fclose($fp);
$fpout = fopen('chksum.txt', "w");
if (!$fpout)
    die ('[Error]:File Is Write protected');
fwrite($fpout, $i.';'.  filesize($dbfilename).';'.md5($i+1000+filesize($dbfilename)));
fclose($fpout);
$time_end = microtime_float();
echo 'checksum created created';
$time =(int) (($time_end - $time_start)*1000);
echo '<br>'."T:".$time.""."ms";
?>
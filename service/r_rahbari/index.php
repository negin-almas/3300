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
//.........................................
//check sum file cheker
//s[0] record count
//s[1] file size
//s[2] md5($s[0]+$s[1]+1000)
if(!file_exists('chksum.txt'))
    die('[Error]:chksum.txt Not Found!');
$fp = fopen('chksum.txt', "r");
$s=stream_get_line($fp,65535 ,"\n");
$s=split(';', $s);
if(md5($s[0]+$s[1]+1000)!=$s[2])
    die('[Error]:chksum is corrupt');
fclose($fp);
if($s[1]!=  filesize($dbfilename))
    die('[Error]:DB file is Changed (Reinstal CHECKSUM)!');
$dbmaxrecord=$s[0];
//.........................................
if(!file_exists($dbfilename))
    die('[Error]:File Not Found!');
$fp = fopen($dbfilename, "r");
$rnd=rand(1,$dbmaxrecord);
for($i=1;$i<$rnd;$i=$i+1)
{
$s=stream_get_line($fp,65535 ,"\n");
if (strlen($s)>=MAXSMSLEN)
  die('[Error]:Record Is Too Big. Line:'.$i) ;
}
$s = str_replace(";", chr(13).chr(10), $s);
$s=iconv( 'windows-1256','UTF-8', $s);
echo $s;

$time_end = microtime_float();
$time =(int) (($time_end - $time_start)*1000);
echo chr(13).chr(10)."T:".$time.""."ms";
fclose($fp); 
?>
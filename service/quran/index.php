<?php
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
//webservice/quran/index?type=FA or EN or AR
if ($_GET["type"]!="" )
    $type=$_GET["type"];

$type=strtolower($type);
switch ($type) 
{
	case  "fa":
    $filename="db/fa.txt";
	break;
	case  "en":
    $filename="db/en.txt";
	break;
	case  "ar":
    $filename="db/ar.txt";
	break;	
	default:
    $filename="db/fa.txt";
}

$time_start = microtime_float();
// Sleep for a while
//usleep(100);



$quran=array(7,286,200,176,120,165,206,75,129,109,123,111,43,52,99,128,111,110,98,135,112,78,118,64,77,227,93,88,69,60,34,30,73,54,45,83,182,88,75,85,54,53,89,59,37,35,38,29,18,45,60,49,62,55,78,96,29,22,24,13,14,11,11,18,12,12,30,52,52,44,28,28,20,56,40,31,50,40,46,42,29,19,36,25,22,17,19,26,30,20,15,21,11,8,8,19,5,8,8,11,11,8,3,9,5,4,7,3,6,3,5,4,5,6);
$fp = fopen($filename, "r");
//$s=fread($fp, filesize($filename));
$rnd=rand(1,6236);
$aya=1;
$index=0;
for($i;$i<$rnd;$i=$i+1)
{
$s=stream_get_line($fp,65535 ,"\n");
if ($aya>=$quran[$index])
	{
	$aya=0;
	$index=$index+1;//next sura
	}
$aya=$aya+1;//next aya
}
$aya=$aya-1;
//$s=iconv( 'windows-1256','UTF-8', $s);
echo "سوره".$index."آيه".$aya.chr(13).chr(10).$s;

$time_end = microtime_float();
$time =(int) (($time_end - $time_start)*1000);
echo chr(13).chr(10)."T:".$time.""."ms";
fclose($fp); 
?>
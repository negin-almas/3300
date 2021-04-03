<?php
// actitive rewrite madule in wamp
function between_select($s,$start,$end)
{
 $n1=strpos($s,$start);
 $n2=strpos($s,$end,$n1);

 $s=substr($s,$n1,$n2-$n1+strlen($end));
 return $s;
}
function between_remove_html($s)
{
    $n1=0;
    $n2=strlen($s);
    $sout="";
    for($i=$n1;$i<$n2;$i+=1)
    {
        if($s[$i]=="<")$sw=False;
        if($s[$i]==">")$sw=True;
        if($sw==True and $s[$i]!=">")$sout=$sout.$s[$i];
    }
    return $sout;

}
$filename="http://www.talaserver.com/webservice/price_live.php";//?mode=tx
//$filename="tala.htm";
$fp = fopen($filename, "r");
$s=fread($fp,10000);
fclose($fp);
// replace bad YEE
$s = str_replace("ی", "ي", $s);
//remove space code
$s = str_replace("&nbsp;", " ", $s);
//remove ENTER char
$s=str_replace(chr(13), "", $s);
$s=str_replace(chr(10), "", $s);
$s=str_replace(chr(9), "", $s);//Tab Replace
//$s=strtolower($s);


//$s=file_get_contents($filename); 
//echo "file size".filesize($filename)."<br>";
//$s= iconv("ISO-8859-1", "UTF-8", $s);
//Gold Price Is In table
$s=between_select($s,"<table","table>");
//price split by </tr>
$s=str_replace("</tr>", chr(13).chr(10), $s);
//remove comment
$s=  preg_replace("<!--.*-->", "",$s);
$s=between_remove_html($s);
//$s=  preg_replace('/\s\s/', "",$s);

//remove extra space
for ($i = 0; $i < 10; $i=$i+1)
$s=str_replace("  ", " ", $s);

$s=split("\n", $s);
$s=array_slice($s, 1,13);
for ($i = 0; $i < 13; $i++)
echo $s[$i];
?>
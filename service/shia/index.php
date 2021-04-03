<?php

// actitive rewrite madule in wamp
function between_select($s, $start, $end, $pos) {
    $n1 = strpos($s, $start, $pos);
    $n2 = strpos($s, $end, $n1);

    $s = substr($s, $n1, $n2 - $n1 + strlen($end));
    return $s;
}

function between_remove_html($s) {
    $n1 = 0;
    $n2 = strlen($s);
    $sout = "";
	$sw = True;
    for ($i = $n1; $i < $n2; $i+=1) {
        if ($s[$i] == "<"
            )$sw = False;
        if ($s[$i] == ">"
            )$sw = True;
        if ($sw == True and $s[$i] != ">"
            )$sout = $sout . $s[$i];
    }
    return $sout;
}

$filename = "http://persian.makarem.ir/"; //?mode=tx

$s = file_get_contents($filename);
// replace bad YEE
$s = str_replace("ی", "ي", $s);
//remove space code
$s = str_replace("&nbsp;", " ", $s);
//remove ENTER char
$s = str_replace(chr(13), "", $s);
$s = str_replace(chr(10), "", $s);
$s = str_replace(chr(9), "", $s); //Tab Replace
//واقايع شيعي در تگ لينك قرار دارند
//كافي است بين آنها را كپي كنيم
//سپس به لينك بعدي برويم

$sout = "";
// if $next =false string not find else return position
while ($next = strpos($s, "calendarText.php", $next))
 {
$sout = $sout . "<" . between_select($s, "calendarText.php", "a>", $next ) . "<br>";
$next=$next+1;//for skip current math text
}
if ($sout=="")
$s = "در تقويم شيعه مناسبت خاصي ثبت نشده است";
else
$s = $sout;

//line split by <br>
$s = str_replace("<br>", chr(13) . chr(10), $s);
//remove comment
$s = preg_replace("<!--.*-->", "", $s);
$s = between_remove_html($s);
//remove extra space
for ($i = 0; $i < 10; $i = $i + 1)
    $s = str_replace("  ", " ", $s);
echo $s . chr(13) . chr(10) . "makarem.irمنبع";
?>
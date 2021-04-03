<?php
header('Content-type: text/html; charset=utf-8');
include 'class.xml.parser.php';
if ($_GET["url"]!="" )
$allurl ="http://www.iribnews.ir/aspx/rss.aspx?action=select";
else
	$weather_chile = new weather("IRXX0008", 3600, "C");
$allurl =$_GET["url"];
// Create Instance of XML Parser Class
// and parse the XML File
$parser = new xmlParser();
$parser->parse($allurl);
function print_childs($parent) {
    global $parser;
    print ($parent['content'] . "<br />");
        $parent = $parent['child'];
    $len = count($parent);
    for ($index = 0; $index < $len; $index++) {
        $child = $parent[$index]; //->output[$index][content];
        print_childs($child);
    }

}
//print_childs($parser->output[0]);
for ($indexm = 3; $indexm < 10; $indexm++)
//for ($index = 0; $index < 10; $index++)
{
//echo $indexm."=".$index."(*)".$parser->output[0][child][0][child][$indexm][child][$index][content];
echo $parser->output[0][child][0][child][$indexm][child][0][content];
//echo $index."(*)".$parser->output[0][child][0][child][3][child][$index][content];
echo chr(13).chr(10);
}

//echo $parser->output[0][child][1][child][0][content];
//echo $parser->output[0][child][0][child][12][child][5][attrs][TEMP]; // OK
// Call all internal Methods
//echo "iribnews.irمنبع:";
?>
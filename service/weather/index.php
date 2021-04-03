<?php
$woeids = array(
    "Abadan" => "2254271",
    "Azar Shahr" => "2254365",
    "Arak" => "2254333",
    "Mashhad" => "2254914",
    "Orumiyeh"=>"2242302",
    "Osku"=>"2255017",
    "Eslamshahr"=>"2226503",
    "Esfahan"=>"2254572",
    "Omidiyeh"=>"2255014",
    "Kish"=>"2236273"
);
//============================================================================
//============================================================================
// Script:    	PHP Script "Yahoo Weather Demo"
//============================================================================
// From:	www.voegeli.li
// Autor:	marco voegeli, switzerland - >> www.voegeli.li >> fly forward!
// Date:	28-Oct-2005 
// License/
// Usage:	Open Source / for free	
//============================================================================
// DESCRIPTION:
// This Script is the example of the class yahoo weather! It shows all
// attributes of the class ad shows how to use it!
//============================================================================
//============================================================================

// ------------------- 
// INCLUDES
// -------------------
include("class.xml.parser.php");
include("class.weather.php");
include("farsi.weather.php");
// ------------------- 
// LOGIC
// -------------------
// Create the new weather object!
// CIXX0020 = Location Code from weather.yahoo.com
// 3600     = seconds of cache lifetime (expires after that)
// C        = Units in Celsius! (Option: F = Fahrenheit)

//http://localhost/3300/webservice/weather/index?citycode=IRXX0009
$woeid = $woeids[$_GET['city']];
if (isset($woeid) != "")
    $weather_chile = new weather($woeid, 3600, "C");
else
    $weather_chile = new weather("2254914", 3600, "C");


// Parse the weather object via cached
// This checks if there's an valid cache object allready. if yes
// it takes the local object data, what's much FASTER!!! if it
// is expired, it refreshes automatically from rss online!
$weather_chile->parsecached(); // => RECOMMENDED!

// allway refreshes from rss online. NOT SO FAST. 
//$weather_chile->parse(); // => NOT recommended!


// ------------------- 
// OUTPUT
// -------------------

// VARIOUS
//print "عنوان: $weather_chile->title<br>";        // Yahoo! Weather - Santiago, CI
print "وضعیت آب و هوای " . city2fa($weather_chile->city) . "\n";         // Santiago
print "طلوع آفتاب:" . $weather_chile->sunrise . "\n";      // 6:49 am
print "غروب آفتاب:" . $weather_chile->sunset . "\n";       // 08:05 pm
print "رطوبت:" . "%" . $weather_chile->humidity . "\n";       // 08:05 pm

print "فعلی:" . "°" . $weather_chile->acttemp . "\n";      // 16
//print "acttime: $weather_chile->acttime<br>";      // Wed, 26 Oct 2005 2:00 pm CLDT
//print "imagurl: $weather_chile->imageurl<br>";     // http://us.i1.yimg.com/us.yimg.com/i/us/nws/th/main_142b.gif
print "هوا:" . actcode2fa($weather_chile->actcode) . "\n";
// Day Forecast day 1
print "==" . week2fa($weather_chile->fore_day1_day) . "==\n";     // Wed
print "كمينه:" . "°" . $weather_chile->fore_day1_tlow . "\n";    // 8
print "بيشينه:" . "°" . $weather_chile->fore_day1_thigh . "\n";   // 19
//print "text:    $weather_chile->fore_day1_text<br>";    // Partly Cloudy
//print "imgcode: $weather_chile->fore_day1_imgcode<br>"; // 29=Image for partly cloudy
print "هوا:" . actcode2fa($weather_chile->fore_day1_imgcode) . "\n";

//print "image: <img src=http://us.i1.yimg.com/us.yimg.com/i/us/we/52/$weather_chile->fore_day1_imgcode.gif>";

//print "<hr>";
// Day Forecast day 2
//print "<h1>Forecast Day 2</h1>";
print "==" . week2fa($weather_chile->fore_day2_day) . "==\n";     // Wed
//print "date: ".   $weather_chile->fore_day2_date."<br>";    // 26 Oct 2005
print "كمينه:" . "°" . $weather_chile->fore_day2_tlow . "\n";    // 8
print "بيشينه:" . "°" . $weather_chile->fore_day2_thigh . "\n";   // 19
//print "text:    $weather_chile->fore_day2_text<br>";    // Partly Cloudy
//print "imgcode: $weather_chile->fore_day2_imgcode<br>"; // 29=Image for partly cloudy
print "هوا:" . actcode2fa($weather_chile->fore_day2_imgcode);
//print "image: <img src=http://us.i1.yimg.com/us.yimg.com/i/us/we/52/$weather_chile->fore_day2_imgcode.gif>";

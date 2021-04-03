<?php

include ('fadate.php');
include ('coordinate.php');

//------------------------ Constants --------------------------
define( "PI", M_PI);
// Adjusting Methods for Higher Latitudes
define("None",0);      // No adjustment
define("MidNight",1);      // middle of night
define( "OneSeventh" , 2);    // 1/7th of night
define("AngleBased", 3);    // angle/60th of night
// Time Names
 $timeNamesEN=array (
                "Fajr",
		"Sunrise",
		"Dhuhr",
		"Asr",
		"Sunset",
		"Maghrib",
		"Isha"
		  );
 $timeNamesFA=array (
                "فجر",
		"طلوع",
		"ظهر",
		"عصر",
		"غروب",
		"مغرب",
		"عشاء"
		  );


//---------------------- Global Variables --------------------
$times=array(5,6,12,13,18,18,18);
//-------------------------------------------------------------
// Calculation Methods                         
//0=Ithna Ashari
//1=University of Islamic Sciences, Karachi
//2=Islamic Society of North America (ISNA)
//3=Muslim World League (MWL)
//4=Umm al-Qura, Makkah
//5=Egyptian General Authority of Survey
//6=Custom Setting
//7=Institute of Geophysics, University of Tehran
$calcMethod   = 7;

// Juristic Methods
//0=Shafii (standard)
//1= Hanafi
$asrJuristic  = 0;		// Juristic method for Asr

$dhuhrMinutes = 0;		// minutes after mid-day for Dhuhr
$adjustHighLats = 1;	// adjusting method for higher latitudes

$timeFormat   = 0;		// time format

	 $lat;        // latitude
	 $lng;        // longitude
	 $timeZone;   // time-zone
	 $JDate;      // Julian date


//--------------------- Technical Settings --------------------


//	int numIterations = 1;		// number of iterations needed to compute times
//------------------- Calc Method Parameters --------------------
//fa : fajr angle
//ms : maghrib selector (0 = angle; 1 = minutes after sunset)
//mv : maghrib parameter value (in angle or minutes)
//is : isha selector (0 = angle; 1 = minutes after maghrib)
//iv : isha parameter value (in angle or minutes)
		$methodParams[0]=array(16, 0, 4, 0, 14);
		$methodParams[1]=array(18, 1, 0, 0, 18);
		$methodParams[3]=array(15, 1, 0, 0, 15);
		$methodParams[4]=array(18, 1, 0, 0, 17);
		$methodParams[5]=array(19, 1, 0, 1, 90);
		$methodParams[6]=array(19.5, 1, 0, 0, 17.5);
		$methodParams[7]=array(17.7, 0, 4.5, 0, 15);
		$methodParams[8]=array(18, 1, 0, 0, 17);
//---------------------------------------------------------------
//---------------------- Julian Date Functions -----------------------
// calculate julian date from a calendar date
function julianDate ($year,$month,$day)
{
	if ($month <= 2)
	{
		$year -= 1;
		$month += 12;
	}
	 $A = floor($year/ 100.0);
	 $B = 2- $A+ floor($A/ 4.0);

	 $JD = floor(365.25* ($year+ 4716))+ floor(30.6001* ($month+ 1))+ $day+ $B- 1524.5;
	return $JD;
}

//---------------------- Misc Functions -----------------------
// range reduce angle in degrees.
function fixangle ($a)
{
	$a = $a - 360.0 * (floor($a / 360.0));
	$a = $a < 0 ? $a + 360.0 : $a;
	return $a;
}

// range reduce hours to 0..23
function fixhour ($a)
{
	$a = $a - 24.0 * (floor($a / 24.0));
	$a = $a < 0 ? $a + 24.0 : $a;
	return $a;
}


// compute the difference between two times
function timeDiff ($time1,$time2)
{
	return  fixhour($time2- $time1);
}


//---------------------- Trigonometric Functions -----------------------

// degree to radian
function dtr ($d)
{
	 return ($d * PI) / 180.0;
}

// radian to degree
function rtd ($r)
{
	 return ($r * 180.0) / PI;
}


// degree sin
function dsin ($d)
{
	 return sin( dtr($d));
}

// degree cos
function  dcos ($d)
{
	 return cos( dtr($d));
}

// degree tan
function dtan ($d)
{
	 return tan( dtr($d));
}

// degree arcsin
function darcsin ($x)
{
	 return  rtd(asin($x));
}

// degree arccos
function darccos ($x)
{
	 return  rtd(acos($x));
}

// degree arctan
function darctan ($x)
{
	 return  rtd(atan($x));
}

// degree arctan2
function darctan2 ($y,$x)
{
	 return  rtd(atan2($y, $x));
}

// degree arccot
function darccot ($x)
{
	 return  rtd(atan(1.0/$x));
}

// compute declination angle of sun and equation of time
function sunDeclination ($jd)
{

	 $D = $jd - 2451545.0;
	 $g = fixangle(357.529 + 0.98560028* $D);
	 $q = fixangle(280.459 + 0.98564736* $D);
	 $L = fixangle($q + 1.915* dsin($g) + 0.020*dsin(2*$g));
	 $e = 23.439 - 0.00000036* $D;
	 $d = darcsin(dsin($e)* dsin($L));
	$RA = darctan2(dcos($e)* dsin($L), dcos($L))/ 15.0;
	$RA =fixhour($RA);

	return $d;
}
function equationOfTime ($jd)
{
	 $D = $jd - 2451545.0;
	 $g = fixangle(357.529 + 0.98560028* $D);
	 $q = fixangle(280.459 + 0.98564736* $D);
	 $L = fixangle($q + 1.915* dsin($g) + 0.020*dsin(2*$g));
	 $e = 23.439 - 0.00000036* $D;
	$RA = darctan2(dcos($e)* dsin($L),dcos($L))/ 15.0;
	$RA = fixhour($RA);
	$EqT = $q/15 - $RA;

	return $EqT;
}

// compute mid-day (Dhuhr, Zawal) time
function computeMidDay($t)
{
global $JDate;
	 $T = equationOfTime($JDate+ $t);
	 $Z = fixhour(12- $T);
	return $Z;
}

// compute time for a given angle G
function computeTime ($G,$t)
{
        global $lat;
        global $JDate;
	$D = sunDeclination($JDate+ $t);
	$Z = computeMidDay($t);
	//double V = 1/15* darccos((-1*dsin(G)- dsin(D)* dsin($lat)) /(dcos($D)* dcos($lat)));
        $a1=dsin($G);
        $a2=dcos($D);
        $a3=(-1.0*$a1- dsin($D)* dsin($lat)) /($a2* dcos($lat));
        $a4=darccos($a3);

         $V = 1.0/15* $a4;
	return ($Z+ ($G>90 ? -$V : $V));
}

// compute the time of Asr
function computeAsr ($step,$t)  // Shafii: step=1, Hanafi: step=2
{
global $lat;
global $JDate;
	 $D = sunDeclination($JDate+ $t);
	 $G = -1*darccot($step+dtan(abs($lat-$D)));
	return computeTime($G, $t);
}




//1-Fajr,2-Sunrise,3-Dhuhr,4-Asr,5-Sunset,6-Maghrib,7-Isha
//7 time need


// the night portion used for adjusting times in higher latitudes
function nightPortion  ($angle)
{
global $adjustHighLats;
	 $a=0;
	if ( $adjustHighLats == $AngleBased)
		$a= 1.0/60* $angle;
	if ( $adjustHighLats == $MidNight)
		$a=1.0/2;
	if ( $adjustHighLats == $OneSeventh)
					 $a=1.0/7;
	return $a;
}


// adjust Fajr, Isha and Maghrib for locations in higher latitudes
  function adjustHighLatTimes ()
{
	global $methodParams;
	global $calcMethod;
	$nightTime =  timeDiff($times[4], $times[1]); // sunset to sunrise

	// Adjust Fajr
	$FajrDiff =  nightPortion( $methodParams[ $calcMethod][0])* $nightTime;
	if (  timeDiff($times[0], $times[1]) > $FajrDiff)
		$times[0] = $times[1]- $FajrDiff;

	// Adjust Isha
	$IshaAngle = ( $methodParams[ $calcMethod][3] == 0) ?  $methodParams[ $calcMethod][4] : 18;
	$IshaDiff =  nightPortion($IshaAngle)* $nightTime;
	if ( timeDiff($times[4], $times[6]) > $IshaDiff)
		$times[6] = $times[4]+ $IshaDiff;

	// Adjust Maghrib
	$MaghribAngle = ( $methodParams[ $calcMethod][1] == 0) ?  $methodParams[ $calcMethod][2] : 4;
	$MaghribDiff =  nightPortion($MaghribAngle)* $nightTime;
	if (  timeDiff($times[4], $times[5]) > $MaghribDiff)
		$times[5] = $times[4]+ $MaghribDiff;


}


// adjust times in a prayer time array
	function adjustTimes()
{
global $adjustHighLats;
global $times;
	global $methodParams;
	global $calcMethod;
	global $dhuhrMinutes;
	global $lng;
	global $timeZone;
	for ($i=0; $i<7; $i++)
		$times[$i] +=  $timeZone-  $lng/ 15.0;
	$times[2] +=  $dhuhrMinutes/ 60; //Dhuhr
	if ( $methodParams[ $calcMethod][1] == 1) // Maghrib
		$times[5] = $times[4]+  $methodParams[ $calcMethod][2]/ 60;
	if ( $methodParams[ $calcMethod][3] == 1) // Isha
		$times[6] = $times[5]+  $ethodParams[ $calcMethod][4]/ 60;

	if ( $adjustHighLats !=  None)
		adjustHighLatTimes();
	return ;
}


//---------------------- Calculation Functions -----------------------


// References:
// http://www.ummah.net/astronomy/saltime
// http://aa.usno.navy.mil/faq/docs/SunApprox.html


// compute prayer times at given julian date
function computeTimes ()
{
global $methodParams;
	global $calcMethod;
	global	$asrJuristic;
        global $times;
// convert hours to day portions
// dayPortion delete function

	$t[7];
	for ( $i=0; $i<7; $i++)
		$t[$i]=$times[$i]*1.0 / 24;
//--------------------------------
 $Fajr = computeTime(180- $methodParams[$calcMethod][0], $t[0]);
 $Sunrise =  computeTime(180- 0.833, $t[1]);
 $Dhuhr   =  computeMidDay($t[2]);
 $Asr     =  computeAsr(1+  $asrJuristic, $t[3]);
 $Sunset  =  computeTime(0.833, $t[4]);
 $Maghrib =  computeTime( $methodParams[ $calcMethod][2], $t[5]);
 $Isha    =  computeTime( $methodParams[ $calcMethod][4], $t[6]);
$times[0]=$Fajr;
$times[1]=$Sunrise;
$times[2]=$Dhuhr;
$times[3]=$Asr;
$times[4]=$Sunset;
$times[5]=$Maghrib;
$times[6]=$Isha;
}

// compute prayer times at given julian date
function computeDayTimes()
{
global $times;
$times[0]=5;
$times[1]=6;
$times[2]=12;
$times[3]=13;
$times[4]=18;
$times[5]=18;
$times[6]=18;
computeTimes();
adjustTimes();
return;
}



//-------------------- Interface Functions --------------------


// return prayer times for a given date
function getDatePrayerTimes ($year,$month,$day,$latitude,$longitude,$TimeZone)
{
	global $lat;
	global $lng;
	global $timeZone;
	global $JDate;	
	$lat = $latitude;
	$lng = $longitude;
	$timeZone = $TimeZone;
	$JDate =julianDate($year, $month, $day)- $longitude/ ((15* 24)*1.0);
computeDayTimes();
}
function Time2string($t)
{
    $s="";
 $h=(int)$t;       //calc hour
 $m=(int)(($t-(int)$t)*60);//calc min
 if ($h>9) $s=$h; else  $s="0".$h;      //print hour
 $s=$s.":";
 if ($m>9) $s=$s.$m; else $s=$s."0".$m;      //print min
 return $s;
}
function main()
{
global $times;
global $timeNamesFA;
        $year=gmdate("Y");
        $month=gmdate("m");
        $day=gmdate("d");

if ($_GET["citycode"]!="" )
    $citycode=$_GET["citycode"];
else
    $citycode=511;
$NEC=coordinate($citycode);
if ($NEC[0]==0 && $NEC[1]==0)
    die( "اوقات شرعي شهر  مورد  نظر موجود نيست");
else
{
if (jgmdate("n")>0 && jgmdate("n")<7) 
$time_zone=4.5;
else
$time_zone=3.5;
    getDatePrayerTimes($year, $month, $day, $NEC[1], $NEC[0], $time_zone);
    echo "اوقات شرعي ".$NEC[2]."\n";
    echo jgmdate("j/ n/ Y")."\n";//shamsi date
    for($i=0;$i<7;$i++)
        {
        echo $timeNamesFA[$i].":";//name print
        echo Time2string($times[$i]);//hour print
        echo "\n";
        }
}
return;
}
main();
?>

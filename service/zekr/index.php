<?php
//echo date("N");1 //(for Monday) through 7 (for Sunday)
$week=(date("N")+2)%7;//convert week day to farsi standart 0=shanbe 6=jomeh
switch ($week) 
{
	case  0:
	$weekname="شنبه";
	break;
	
	case  1:
	$weekname="يکشنبه";
	break;
	
	case  2:
	$weekname="دو شنبه";
	break;
	
	case  3:
	$weekname="سه شنبه";
	break;	
	
	case  4:
	$weekname="چهار شنبه";
	break;
	
	case  5:
	$weekname="پنجشنبه";
	break;
	
	case  6:
	$weekname="جمعه";
	break;
	
	default:
    $weekname="خطا";
}
switch ($week) 
{
	case  0:
	$weekzekr="یارب العالمین";
	break;
	
	case  1:
	$weekzekr="یا ذاالجلال والاکرام";
	break;
	
	case  2:
	$weekzekr="یا قاضی الحاجات";
	break;
	
	case  3:
	$weekzekr="یاارحم الراحمین";
	break;	
	
	case  4:
	$weekzekr="یا حی یاقیوم";
	break;
	
	case  5:
	$weekzekr="لا اله الا الله الملک الحق المبین";
	break;
	
	case  6:
	$weekzekr="اللهم صل علی محمد وال محمد وعجل فرجهم";
	break;
	
	default:
    $weekzekr="خطا";
}
echo "ذكر روز ".$weekname.chr(13).chr(10).$weekzekr.chr(13).chr(10).chr(13).chr(10)."التماس دعا";
?>
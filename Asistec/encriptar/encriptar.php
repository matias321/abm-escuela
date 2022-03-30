<?php
function encriptar($sinencriptar)
{
	$nuevovalor= 0;
	
	$arrtemporal = str_split($sinencriptar);
	$longitud = strlen($sinencriptar);
	
	$i=0;
	$posicional = 1;
	while ($i<$longitud)
	{
		$nuevovalor += pasaje($arrtemporal[$i]);
		$nuevovalor = $nuevovalor * $posicional;
		$posicional ++;
		$i=$i+1;
	}
	
	$otro = $nuevovalor * 611971 * 2020;
	
	$nuevovalor2= "";
	$i=0;
	$longitud = strlen(strval($otro));
	$arrtemporal2 = str_split(strval($otro));
	
	while ($i<$longitud)
	{
		
		$nuevovalor2 .= segundopasaje($arrtemporal2[$i]);
		
		$i=$i+1;
	}
	
	return $nuevovalor2;
}

function segundopasaje($nume)
{
	$valor=0;
	switch (strtolower($nume)) 
	{
		case '0':  $valor='qp';  break;
		case '1':  $valor='wo';  break;
		case '2':  $valor='ei';  break;
		case '3':  $valor='ri';  break;
		case '4':  $valor='ti';  break;
		case '5':  $valor='yu';  break;
		case '6':  $valor='al';  break;
		case '7':  $valor='sk';  break;
		case '8':  $valor='dj';  break;
		case '9':  $valor='fh';  break;
	}
	return($valor);
}

function pasaje($letra)
{
	$valor=0;
	switch (strtolower($letra)) 
	{
		case '0':  $valor=5504;  break;
		case '1':  $valor=2193;  break;
		case '2':  $valor=2566;  break;
		case '3':  $valor=9502;  break;
		case '4':  $valor=7467;  break;
		case '5':  $valor=9243;  break;
		case '6':  $valor=5307;  break;
		case '7':  $valor=7447;  break;
		case '8':  $valor=8867;  break;
		case '9':  $valor=7184;  break;
		case 'q':  $valor=7252;  break;
		case 'w':  $valor=8785;  break;
		case 'e':  $valor=8867;  break;
		case 'r':  $valor=1603;  break;
		case 't':  $valor=7857;  break;
		case 'y':  $valor=7127;  break;
		case 'u':  $valor=8111;  break;
		case 'i':  $valor=2722;  break;
		case 'o':  $valor=3109;  break;
		case 'p':  $valor=2305;  break;
		case 'a':  $valor=5968;  break;
		case 's':  $valor=3299;  break;
		case 'd':  $valor=7887;  break;
		case 'f':  $valor=5399;  break;
		case 'g':  $valor=1583;  break;
		case 'h':  $valor=5754;  break;
		case 'j':  $valor=4304;  break;
		case 'k':  $valor=7029;  break;
		case 'l':  $valor=8370;  break;
		case 'ñ':  $valor=8685;  break;
		case 'z':  $valor=4552;  break;
		case 'x':  $valor=2811;  break;
		case 'c':  $valor=5111;  break;
		case 'v':  $valor=7233;  break;
		case 'b':  $valor=4750;  break;
		case 'n':  $valor=4424;  break;
		case 'm':  $valor=6142;  break;
		case ' ':  $valor=1769;  break;
		case '_':  $valor=8436;  break;
		case '.':  $valor=2681;  break;
		case ',':  $valor=3753;  break;
		case '@':  $valor=3540;  break;
	}
	
	return $valor;
}
?>
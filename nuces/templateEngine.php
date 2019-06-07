<?php 

ob_start();
include_once("view/template.php");
$output = ob_get_contents();
ob_end_clean();

$mainStr = "<!--i am  main -->";
$scriptStr = "<!--i am  script -->";

function writeHeader($script){
	global $output;
	global $mainStr;

	if (isset($script)){
		writeScript($script);		
	}
	
	$header = substr($output,0,strpos($output,$mainStr));
	echo $header;
}

function writeFooter(){
	global $output;
	global $mainStr;

	$footer =  substr($output,strpos($output,$mainStr) + strlen($mainStr));
	echo $footer;
}

function writeScript($script){
	global $output;
	global $scriptStr;

	$output = str_replace($scriptStr,$script,$output);
}

?>

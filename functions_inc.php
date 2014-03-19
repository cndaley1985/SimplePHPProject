<?php


function print_html_header($title="J"){
	echo <<<END
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>$title</title>
	<link href="iPhonePortal.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="iPhoneAJAX.js"></script>
	</head>
	<body style="background-color:#000">
END;
}



function print_html_footer(){
	echo "</body></html>";

}

?>
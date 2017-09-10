<?
	include("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Undeviating 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140322

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="dgtmlxCalendar/fonts/font_roboto/roboto.css"/>
<link rel="stylesheet" type="text/css" href="dgtmlxCalendar/dhtmlxcalendar.css"/>
<script src="dgtmlxCalendar/dhtmlxcalendar.js"></script>
<script>
	var myCalendar;
	function doOnLoad() {
		myCalendar = new dhtmlXCalendarObject({input: "calendar_input", button: "calendar_icon"});
		myCalendar.setSensitiveRange(new Date(), null);
	}
</script>
<style>
	#calendar_input {
		border: 1px solid #dfdfdf;
		font-family: Roboto, Arial, Helvetica;
		font-size: 14px;
		color: #404040;
	}
	#calendar_icon {
		vertical-align: middle;
		cursor: pointer;
	}
</style>
		
<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body onload="doOnLoad();">
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">好時光請假系統</a></h1>
		</div>
	</div>
</div>
<div class="wrapper">
	<div id="welcome" class="container">
		<div class="title">
			<h2><?=$_POST[name]?>想要哪一天請假?</h2>
		</div>
		<form method="POST" action="leave_handle.php">
			<input type="text" id="calendar_input" name="date" style="height:40px;font-size:24pt;width:200px">
			<input type="hidden" name="id" value="<?=$_POST[id]?>">
			<span class="icon icon-calendar"></span><br>
			<input type="submit" value="請假" class="button" style="border:0;">
		</form>
	</div>
</div>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光請假系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="dgtmlxCalendar/fonts/font_roboto/roboto.css"/>
		<link rel="stylesheet" type="text/css" href="dgtmlxCalendar/dhtmlxcalendar.css"/>
		<script src="dgtmlxCalendar/dhtmlxcalendar.js"></script>
	</head>
	<script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject({input: "calendar_input", button: "calendar_icon"});
		}
	</script>
	<body bgcolor="#00BBBB" onload="doOnLoad();">
		<center>
			想要哪一天請假?<Br>
			<form method="POST" action="off_handle.php">
				<input type="text" id="calendar_input">
				<span><img id="calendar_icon" src="calendar.png" border="0"></span><br>
				<input type="submit" value="請假">
			</form>
		</center>
	</body>
</html>

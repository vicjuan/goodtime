<?
	include("connect.php");
	include("calendar.php");
?>
<html>
	<head>
		<title>好時光報名修改系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$tok = strtok($_GET['date'], "_");
				$year = strtok("_");
				$month = strtok("_");
				$day = strtok("_");
				$date = $year . "-" . $month . "-" . $day;
				echo "select * from attend where student_id=$_GET[id] and unix_timestamp(time) >= unix_timestamp($date) and unix_timestamp(time) < unix_timestamp($date) + 86400";
				$result = mysql_query("select * from attend where student_id=$_GET[id] and unix_timestamp(time) >= unix_timestamp($date) and unix_timestamp(time) < unix_timestamp($date) + 86400");
			?>
		</center>
	</body>
</html>

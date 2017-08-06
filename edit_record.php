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
				while($tok !== false){
					echo $tok;
					$tok = strtok("_");
				}
			?>
		</center>
	</body>
</html>

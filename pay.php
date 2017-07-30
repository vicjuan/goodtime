<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光繳錢給老師系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$result = mysql_query("insert into pay (student_id, pay_class, date) values ('$_POST[id]', $_POST[classes], CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))");
				if(!$result){
					die('繳錢失敗' . mysql_error());
				}
				echo $_POST[name]."繳錢成功！<br>";
				echo "<a href=\"teacher.php\">回到老師首頁</a>";
			?>
		</center>
	</body>
</html>

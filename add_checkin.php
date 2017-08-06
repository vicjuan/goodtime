<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光上課點名系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$result = mysql_query("insert into attend (student_id, date) values ('$_POST[id]', '$_POST[date]')");
				if(!$result){
					die('點名失敗' . mysql_error());
				}
				echo "新增點名成功！<br>";
				echo "<a href=\"teacher.php\">回到老師首頁</a>";
			?>
		</center>
	</body>
</html>

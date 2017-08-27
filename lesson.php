<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光課程新增系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$result = mysql_query("select * from lesson where student_id='$_POST[id]' and day='$_POST[day]' and period='$_POST[period]'");
				if(mysql_num_rows($result)){
					echo "該時段已參加過了<br>";
				}
				else{
					$result = mysql_query("insert into lesson (student_id, day, period) values ('$_POST[id]', '$_POST[day]', '$_POST[period]')");
					if(!$result){
						die('新增失敗' . mysql_error());
					}
					echo $_POST[name]."新增成功！<br>";
				}
				echo "<a href=\"teacher.php\">回到老師首頁</a>";
			?>
		</center>
	</body>
</html>

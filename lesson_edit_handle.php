<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光課程修改系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$result = mysql_query("update lesson set day=$_POST[day], period=\"$_POST[period]\" where id=$_POST[id]");
				if(!$result){
					die('修改失敗' . mysql_error());
				}
				echo "修改成功！<br>";
				echo "<a href=\"teacher.php\">回到老師首頁</a>";
			?>
		</center>
	</body>
</html>

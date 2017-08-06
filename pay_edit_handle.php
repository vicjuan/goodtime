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
				if($_POST[class] <= 0){
					$result = mysql_query("delete from pay where id=$_POST[id]");
				}
				else{
					$result = mysql_query("update pay set pay_class=$_POST[class], time=\"$_POST[time]\" where id=$_POST[id]");
				}
				if(!$result){
					die('修改失敗' . mysql_error());
				}
				echo "修改成功！<br>";
				echo "<a href=\"teacher.php\">回到老師首頁</a>";
			?>
		</center>
	</body>
</html>

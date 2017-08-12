<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光新增學生系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$result = mysql_query("insert into student (name, number) values ('$_POST[name]', '$_POST[number]')");
				if(!$result){
					die('新增失敗' . mysql_error());
				}
				echo "學生".$_POST[name]."新增成功！<br>";
				echo "<a href=\"teacher.php\">回到老師首頁</a>";
			?>
		</center>
	</body>
</html>

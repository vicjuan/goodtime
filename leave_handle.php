<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光請假系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$result = mysql_query("select * from `leave` where student_id='$_POST[id]' and date='$_POST[date]'");
				if(mysql_num_rows($result)){
					echo "你已經在" . $_POST[date] . "這一天請假過了！<br>";
					echo "<a href=\"index.html\">回到請假首頁</a>";
				}
				else {
					$result = mysql_query("insert into `leave` (`student_id`, `date`) values ('$_POST[id]', '$_POST[date]')");
					if(!$result){
						die('請假失敗' . mysql_error());
					}
					echo "請假成功！<br>";
					echo "<a href=\"index.html\">回到請假首頁</a>";
				}
			?>
		</center>
	</body>
</html>
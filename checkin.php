<?
	include("connect.php");
	$result = mysql_query("insert into attend (student_id, date) values ('$_POST[id]', CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))");
	if(!$result){
		die('點名失敗' . mysql_error());
	}
?>
<html>
	<head>
		<title>好時光上課點名系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$result = mysql_query("select * from attend where student_id='$_POST[id]' and date(current_date())=date(date)");
				if(mysql_num_rows($result)){
					echo "你今天已經點名過了喔！確定還要再點一次嗎？";
					echo "<form method=\"POST\" action=\"checkin.php\">";
					echo "<input type=\"hidden\" name=\"id\" value=\"".$_POST[id]."\">";
					echo "<input type=\"hidden\" name=\"name\" value=\"".$_POST[name]."\">";
					echo "<input type=\"hidden\" name=\"force\" value=\"true\">";
					echo "</form>";
				}
				else {
					echo $_POST[name]."點名成功！";
					echo "<table border=\"1\">";
					echo "<tr><th>已上課日期</th></tr>";
					$result = mysql_query("select * from attend where student_id='$_POST[id]'");
					if(mysql_num_rows($result)){
						while($row = mysql_fetch_array($result)){
							echo "<tr>";
							echo "<td>";
							echo $row[date];
							echo "</td>";
							echo "</tr>";
						}
					}
					echo "</table>";
				}
			?>
		</center>
	</body>
</html>

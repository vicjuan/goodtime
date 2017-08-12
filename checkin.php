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
				$result = mysql_query("select * from attend where student_id='$_POST[id]' and date(current_date())=date(date)");
				if(mysql_num_rows($result) && $_POST[force] != "true"){
					echo "你今天已經點名過了喔！確定還要再點一次嗎？";
					echo "<form method=\"POST\" action=\"checkin.php\">";
					echo "<input type=\"hidden\" name=\"id\" value=\"".$_POST[id]."\">";
					echo "<input type=\"hidden\" name=\"name\" value=\"".$_POST[name]."\">";
					echo "<input type=\"hidden\" name=\"force\" value=\"true\">";
					echo "<input type=\"submit\" value=\"是\">";
					echo "<input type=\"button\" value=\"否\" onClick=\"window.location='http://goodtime.vicjuan.org';\">";
					echo "</form>";
				}
				else {
					$result = mysql_query("insert into attend (student_id, date) values ('$_POST[id]', CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))");
					if(!$result){
						die('點名失敗' . mysql_error());
					}
					echo $_POST[name]."點名成功！<br>";
					echo "<a href=\"checkin.html\">回到點名首頁</a>";
					echo "<iframe src=\"student.php?id=".$_POST[id]."&name=".$_POST[name]."\" width=800 height=800 style=\"border:0\"></iframe>";
				}
			?>
		</center>
	</body>
</html>

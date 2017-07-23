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
				你是哪一位？<br>
				<?
					$result = mysql_query("select * from student where number='$_POST[phone]'");
					if(mysql_num_rows($result)){
						while($row = mysql_fetch_array($result)){
							echo "<form method=\"POST\" action=\"checkin.php\">";
							echo "<input type=\"hidden\" name=\"id\" value=\"".$row['id']."\">";
							echo "<input type=\"submit\" style=\"width:200px; height:75px; background-color:white; margin: 4px 2px; font-size:36;\" value=\"".$row['name']."\"><br>";
							echo "</form>";
						}
					}
				?>
		</center>
	</body>
</html>

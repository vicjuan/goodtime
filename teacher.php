<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光老師系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				echo "<table border=\"1\">";
				echo "<tr><th>學生姓名</th></tr>";
				$result = mysql_query("select * from student");
				if(mysql_num_rows($result)){
					while($row = mysql_fetch_array($result)){
						echo "<tr>";
						echo "<td align=\"center\" style=\"height:50px; width:150px;\">";
						echo "<a href=\"student.php?id=". $row[id] ."&name=". $row[name] ."\">". $row[name] ."</a>";
						echo "</td>";
						echo "</tr>";
					}
				}
				echo "</table>";
			?>
		</center>
	</body>
</html>
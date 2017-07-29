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
				echo "<tr><th>出席日期</th></tr>";
				$result = mysql_query("select unix_timestamp(date) as time from attend where student_id=$_GET[id]");
				if(mysql_num_rows($result)){
					while($row = mysql_fetch_array($result)){
						$date = getdate($row[time]);
						echo "<tr>";
						echo "<td align=\"center\" style=\"height:50px; width:150px;\">";
						echo $date[year];
						echo $date[mon];
						echo $date[mday];
						echo "</td>";
						echo "</tr>";
					}
				}
				echo "</table>";
			?>
		</center>
	</body>
</html>

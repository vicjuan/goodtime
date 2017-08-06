<?
	include("connect.php");
	include("calendar.php");
?>
<html>
	<head>
		<title>好時光報名修改系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$tok = strtok($_GET['date'], "_");
				$year = strtok("_");
				$month = strtok("_");
				$day = strtok("_");
				$date = $year . "-" . $month . "-" . $day;
				$result = mysql_query("select * from attend where student_id=$_GET[id] and unix_timestamp(date) >= unix_timestamp(\"$date\") and unix_timestamp(date) < unix_timestamp(\"$date\") + 86400");
				if(mysql_num_rows($result)){
					echo "<table cellpadding=\"0\" cellspacing=\"0\"  class=\"calendar\">";
					echo "<tbody>";
					echo "<tr class=\"calendar-row\">";
					echo "<td class=\"calendar-day-head\">No.</th>";
					echo "<td class=\"calendar-day-head\">上課日期</th>";
					echo "<td class=\"calendar-day-head\"></th>";
					echo "</tr>";
					$index = 0;
					while($row = mysql_fetch_array($result)){
						$index++;
						echo "<form method=\"POST\" action=\"record_edit_handle.php\">";
						echo "<input type=\"hidden\" name=\"id\" value=\"" . $row[id] . "\">";
						echo "<tr>";
						echo "<td class=\"calendar-day\" style=\"width: initial;\">";
						echo $index;
						echo "</td>";
						echo "<td class=\"calendar-day\" style=\"text-align: center;\">";
						echo "<input type=\"text\" name=\"date\" value=\"" . $row[date] . "\">";
						echo "</td>";
						echo "<td class=\"calendar-day\" style=\"text-align: center;\">";
						echo "<input type=\"submit\" name=\"action\" value=\"edit\">";
						echo "<input type=\"submit\" name=\"action\" value=\"delete\">";
						echo "</td>";
						echo "</tr>";
					}
					echo "</tbody>";
					echo "</table>";
					echo "</form>";
				}
				echo "<form method=\"POST\" action=\"add_checkin.php\">";
				echo "我要在這一天新增點名";
				echo "<input type=\"hidden\" name=\"id\" value=\"" . $_GET[id] . "\">";
				echo "<input type=\"hidden\" name=\"date\" value=\"" . $date . "\">";
				echo "<input type=\"submit\" value=\"新增\">";
				echo "</form>";
			?>
		</center>
	</body>
</html>

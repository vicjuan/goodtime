<?
	include("connect.php");
	include("calendar.php");
?>
<html>
	<head>
		<title>好時光繳錢給老師系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$result = mysql_query("select * from pay where id=$_POST[id]");
				if(mysql_num_rows($result)){
					$row = mysql_fetch_array($result);
					echo "<form method=\"POST\" action=\"pay_edit_handle.php\">";
					echo "<input type=\"hidden\" name=\"id\" value=\"" . $_POST[id] . "\">";
					echo "<table cellpadding=\"0\" cellspacing=\"0\"  class=\"calendar\">";
					echo "<tbody>";
					echo "<tr class=\"calendar-row\">";
					echo "<td class=\"calendar-day-head\">堂數</th>";
					echo "<td class=\"calendar-day-head\">繳費日期</th>";
					echo "<td class=\"calendar-day-head\"></th>";
					echo "</tr>";
					echo "<tr>";
					echo "<td class=\"calendar-day\" style=\"text-align: center;\">";
					echo "<input type=\"text\" name=\"class\" value=\"" . $row[pay_class] . "\">";
					echo "</td>";
					echo "<td class=\"calendar-day\" style=\"width: initial;\">";
					echo "<input type=\"text\" name=\"time\" value=\"" . $row[time] . "\">";
					echo "</td>";
					echo "<td class=\"calendar-day\" style=\"text-align: center;\">";
					echo "<input type=\"submit\" value=\"送出\">";
					echo "</td>";
					echo "</tr>";
					echo "</tbody>";
					echo "</table>";
					echo "</form>";
				}
			?>
		</center>
	</body>
</html>

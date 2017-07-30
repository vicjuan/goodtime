<?
	include("connect.php");
	include("calendar.php");
?>
<html>
	<head>
		<title>好時光老師系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<script language="javascript">
		var mark = function(id){
			var element = document.getElementById(id);
			element.className += " lightblue";
			var countDiv = element.getElementsByClassName("count-number")[0];
			countDiv.innerText += "O ";
		}
	</script>
	<body bgcolor="#00BBBB">
		<center>
			<?
				echo "學生" . $_GET[name] . "的出席情形";
				$calendars = [];
				$ids = [];
				$result = mysql_query("select unix_timestamp(date) as time from attend where student_id=$_GET[id]");
				if(mysql_num_rows($result)){
					while($row = mysql_fetch_array($result)){
						$date = getdate($row[time]);
						$year = $date[year];
						$month = $date[mon];
						$day = $date[mday];
						$id = 'day_' . $year . '_' . $month . '_' . $day;
						array_push($ids, $id);
						if(!$calendars[$year]){
							$calendars[$year] = [];
						}
						if(!$calendars[$year][$month]){
							$calendars[$year][$month] = draw_calendar($month,$year);
						}
					}
				}
				foreach($calendars as $year){
					foreach($year as $calendar){
						echo $calendar;
					}
				}
				echo "<script language=\"javascript\">";
				foreach($ids as $id){
					echo "mark(\"" . $id . "\");";
				}
				echo "</script>";
				if($_GET[showPay] == 'true'){
					echo "學生" . $_GET[name] . "的繳費情形";
					$result = mysql_query("select * from pay where student_id=$_GET[id] order by time desc");
					if(mysql_num_rows($result)){
						echo "<table cellpadding=\"0\" cellspacing=\"0\"  class=\"calendar\">";
						echo "<tbody>";
						echo "<tr class=\"calendar-row\">";
						echo "<td class=\"calendar-day-head\">堂數</th>";
						echo "<td class=\"calendar-day-head\">繳費日期</th>";
						echo "</tr>";
						while($row = mysql_fetch_array($result)){
							echo "<tr>";
							echo "<td class=\"calendar-day\" style=\"text-align: center;\">" . $row[pay_class] . "</td>";
							echo "<td class=\"calendar-day\" style=\"width: initial;\">" . $row[time] . "</td>";
							echo "</tr>";
						}
						echo "</tbody>";
						echo "</table>";
					}
				}
			?>
		</center>
	</body>
</html>

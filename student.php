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
		var mark = function(id, className){
			var element = document.getElementById(id);
			element.className += " " + className;
			var countDiv = element.getElementsByClassName("count-number")[0];
			countDiv.innerText += "O ";
		}
	</script>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$name = $_POST[name] ? $_POST[name] : $_GET[name];
				$studentId = $_POST[id] ? $_POST[id] : $_GET[id];
				echo "學生" . $name . "的出席情形";
				$calendars = [];
				$ids = [];
				$result = mysql_query("select unix_timestamp(date) as time from attend where student_id=$studentId order by time");
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
				$result = mysql_query("select sum(pay_class) as total from pay where student_id=$studentId");
				$payTotal = mysql_fetch_array($result)[total];
				$lastPay = 0;
				if($payTotal > count($ids)){
					$result = mysql_query("select pay_class from pay where student_id=$studentId order by time desc limit 1");
					$lastPay = mysql_fetch_array($result)[pay_class];	
				}
				echo "<script language=\"javascript\">";
				$counter = 0;
				foreach($ids as $id){
					$counter++;
					$className = "pink";
					if($counter <= $payTotal - $lastPay){
						$className = "lightGreen";
					}
					else if($counter <= $payTotal){
							$className = "lightBlue";
					}
					echo "mark(\"" . $id . "\", \"" . $className . "\");";
				}
				echo "</script>";
				if($_POST[showPay] == 'true'){
					echo "學生" . $name . "的繳費情形";
					$result = mysql_query("select * from pay where student_id=$studentId order by time desc");
					if(mysql_num_rows($result)){
						echo "<table cellpadding=\"0\" cellspacing=\"0\"  class=\"calendar\">";
						echo "<tbody>";
						echo "<tr class=\"calendar-row\">";
						echo "<td class=\"calendar-day-head\">堂數</th>";
						echo "<td class=\"calendar-day-head\">繳費日期</th>";
						echo "<td class=\"calendar-day-head\">修改</th>";
						echo "</tr>";
						while($row = mysql_fetch_array($result)){
							echo "<tr>";
							echo "<td class=\"calendar-day-np\" style=\"text-align: center;\">" . $row[pay_class] . "</td>";
							echo "<td class=\"calendar-day-np\" style=\"width: initial;\">" . $row[time] . "</td>";
							echo "<form method=\"POST\" action=\"pay_edit.php\">";
							echo "<td class=\"calendar-day-np\" style=\"text-align: center;\">";
							echo "<input type=\"submit\" value=\"修改紀錄\">";
							echo "<input type=\"hidden\" name=\"id\" value=\"" . $row[id] . "\">";
							echo "</td>";
							echo "</form>";
							echo "</tr>";
						}
						echo "</tbody>";
						echo "</table>";
					}
					echo "<br><br>";
					echo "<form method=\"POST\" action=\"pay.php\">";
					echo "<input type=\"hidden\" name=\"id\" value=\"" . $studentId . "\"> ";
					echo "我今天要繳 ";
					echo "<input type=\"text\" name=\"classes\" style=\"width: 30px;\"> ";
					echo "堂課的錢 ";
					echo "<input type=\"submit\" value=\"繳費\" style=\"text-align:center; background:white; height: 30px; width: 50px; font-size: 16;\">";
					echo "</form>";
					echo "<a href=\"teacher.php\">回到老師首頁</a>";
				}
			?>
		</center>
	</body>
<?
	if($_POST[showPay] == 'true'){
?>
	<script language="javascript">
		var addLink = function (element){
			window.location.assign("record_edit.php?id=" + <?=$studentId?> + "&date=" + element.id);
		}
		var elements = document.getElementsByClassName("calendar-day");
		for(var i = 0; i < elements.length; i++){
			elements[i].addEventListener("click", function(){addLink(this);}, false);
		}
	</script>
<?
	}
?>
</html>

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
		}
	</script>
	<body bgcolor="#00BBBB">
		<center>
			<?
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
			?>
		</center>
	</body>
</html>

<?
include("calendar.php");
include("connect.php");

function student_calendar ($name, $studentId) {
	$calendars = [];
	$ids = [];
	$leaves = [];
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
	
	$result = mysql_query("select unix_timestamp(date) as time from leave where student_id=$studentId order by time");
	if(mysql_num_rows($result)){
		while($row = mysql_fetch_array($result)){
			$date = getdate($row[time]);
			$year = $date[year];
			$month = $date[mon];
			$day = $date[mday];
			$id = 'day_' . $year . '_' . $month . '_' . $day;
			array_push($leaves, $id);
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
?>
	<script language="javascript">
		var mark = function(id, className, mark){
			var element = document.getElementById(id);
			element.className += " " + className;
			var countDiv = element.getElementsByClassName("count-number")[0];
			countDiv.innerText += mark;
		}
<?
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
		echo "mark(\"" . $id . "\", \"" . $className . "\", \"O \");";
	}
	
	foreach($leaves as $id){
		$counter++;
		$className = "red";
		echo "mark(\"" . $id . "\", \"" . $className . "\, \"X \");";
	}
?>
	</script>
<?
}
?>

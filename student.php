<?
	include("connect.php");
	include("calendar.php");
?>
<html>
	<head>
		<title>好時光老師系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				$array = [];
				$result = mysql_query("select unix_timestamp(date) as time from attend where student_id=$_GET[id]");
				if(mysql_num_rows($result)){
					while($row = mysql_fetch_array($result)){
						$date = getdate($row[time]);
						$year = $date[year];
						$month = $date[mon];
						$day = $date[mday];
						if(!$array[$year]){
							$array[$year] = [];
						}
						if(!$array[$year][$month]){
							$array[$year][$month] = draw_calendar($month,$year);
						}
					}
				}
				foreach($array as $year){
					foreach($year as $calendar){
						echo $calendar;
					}
				}
			?>
		</center>
	</body>
</html>

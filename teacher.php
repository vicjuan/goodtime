<?
	include("connect.php");
	include("calendar.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Undeviating 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140322

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>好時光老師系統</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">好時光老師系統</a></h1>
		</div>
	</div>
</div>
<div class="wrapper">
	<div id="three-column" class="container">
		<div><span class="arrow-down"></span></div>
		<div id="tbox1">
			<div class="title">
				<h2>本日預計上課學生</h2>
			</div>
			<table cellpadding="0" cellspacing="0"  class="calendar">
				<tbody>
					<tr class="calendar-row">
						<td class="calendar-day-head">早上</td>
						<td class="calendar-day-head">下午</td>
						<td class="calendar-day-head">晚上</td>
					</tr>
					<tr class="calendar-row">
						<td class="calendar-day-head">
							<?
								$result = mysql_query("select * from student s left join lesson l on s.id=l.student_id where l.day=(dayofweek(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))-1) and l.period='MORNING'");
								if(mysql_num_rows($result)){
									while($row = mysql_fetch_array($result)){
										echo $row[name];
										echo "<br>";
									}
								}
							?>
						</td>
						<td class="calendar-day-head">
							<?
								$result = mysql_query("select * from student s left join lesson l on s.id=l.student_id where l.day=(dayofweek(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))-1) and l.period='AFTERNOON'");
								if(mysql_num_rows($result)){
									while($row = mysql_fetch_array($result)){
										echo $row[name];
										echo "<br>";
									}
								}
							?>
						</td>
						<td class="calendar-day-head">
							<?
								$result = mysql_query("select * from student s left join lesson l on s.id=l.student_id where l.day=(dayofweek(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))-1) and l.period='NIGHT'");
								if(mysql_num_rows($result)){
									while($row = mysql_fetch_array($result)){
										echo $row[name];
										echo "<br>";
									}
								}
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="tbox2">
			<div class="title">
				<h2>本日請假學生</h2>
			</div>
			<table cellpadding="0" cellspacing="0"  class="calendar">
				<tbody>
					<tr class="calendar-row">
						<td class="calendar-day-head">
							<?
								$result = mysql_query("select * from student s left join `leave` l on s.id=l.student_id where l.date = date(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))");
								if(mysql_num_rows($result)){
									while($row = mysql_fetch_array($result)){
										echo $row[name];
										echo "<br>";
									}
								}
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="tbox3">
			<div class="title">
				<h2>前後七天請假學生</h2>
			</div>
			<table cellpadding="0" cellspacing="0"  class="calendar">
				<tbody>
					<?
						$result = mysql_query("select * from student s left join `leave` l on s.id=l.student_id where l.date >= date(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00')) - interval 7 day and l.date <= date(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00')) + interval 7 day order by l.date");
						if(mysql_num_rows($result)){
							while($row = mysql_fetch_array($result)){
								echo "<tr class=\"calendar-row\">";
								echo "<td class=\"calendar-day-head\">";
								echo $row[name];
								echo "<br>";
								echo "</td>";
								echo "<td class=\"calendar-day-head\">";
								echo $row[date];
								echo "<br>";
								echo "</td>";
								echo "</tr>";
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div id="three-column" class="container">
		<div><span class="arrow-down"></span></div>
		<div id="tbox1">
			<div class="title">
				<h2>學生姓名</h2>
			</div>
			<table>
				<?
					$result = mysql_query("select * from student");
					if(mysql_num_rows($result)){
						while($row = mysql_fetch_array($result)){
							echo "<tr>";
							echo "<td align=\"center\" style=\"height:50px; width:150px;\">";
							echo "<form method=\"POST\" action=\"student.php\">";
							echo "<input type=\"submit\" name=\"name\" style=\"width:100%; font-size:36; background-color:white;\" value=\"". $row[name] ."\">";
							echo "<input type=\"hidden\" name=\"id\" value=\"". $row[id] ."\">";
							echo "<input type=\"hidden\" name=\"showPay\" value=\"true\">";
							echo "</form>";
							echo "</td>";
							echo "</tr>";
						}
					}
				?>
			</table>
		</div>
		<div id="tbox2">
			<div class="title">
				<h2>新增學生</h2>
			</div>
			<form method="POST" action="new_student.php">
				<table>
					<tr>
						<th>姓名</th><th>爸爸媽媽電話</th>
					</tr>
					<tr>
						<td><input type="text" name="name"></td>
						<td><input type="text" name="number"></td>
					</tr>
				</table>
				<input type="submit" value="新增">
			</form>
		</div>
	</div>
</div>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>

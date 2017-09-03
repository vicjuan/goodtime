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
			本日預計上課學生
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
			<br>本日請假學生
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
			<br>未來七天請假學生
			<table cellpadding="0" cellspacing="0"  class="calendar">
				<tbody>
					<tr class="calendar-row">
						<td class="calendar-day-head">
							<?
								$result = mysql_query("select * from student s left join `leave` l on s.id=l.student_id where l.date >= date(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00')) and l.date <= date(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00')) + interval 7 day");
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
			<table>
			<tr><th>學生姓名</th></tr>
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
			新增學生<br>
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
			<br><a href="checkin.html">進入點名首頁</a><br>
		</center>
	</body>
</html>

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
		<div id="tbox1" style="width: 15%">
			<div class="title">
				<h2>本日上課學生</h2>
			</div>
			<ul>
				<li>
					<p><h3>早上</h3></p>
					<?
						$result = mysql_query("select * from student s left join lesson l on s.id=l.student_id where l.day=(dayofweek(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))-1) and l.period='MORNING'");
						if(mysql_num_rows($result)){
							while($row = mysql_fetch_array($result)){
								echo "<p>";
								echo $row[name];
								echo "</p>";
							}
						}
						else{
							echo "<p>無</p>";
						}
					?>
				</li>
				<li>
					<p><h3>下午</h3></p>
					<?
						$result = mysql_query("select * from student s left join lesson l on s.id=l.student_id where l.day=(dayofweek(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))-1) and l.period='AFTERNOON'");
						if(mysql_num_rows($result)){
							while($row = mysql_fetch_array($result)){
								echo "<p>";
								echo $row[name];
								echo "</p>";
							}
						}
						else{
							echo "<p>無</p>";
						}
					?>
				</li>
				<li>
					<p><h3>晚上</h3></p>
					<?
						$result = mysql_query("select * from student s left join lesson l on s.id=l.student_id where l.day=(dayofweek(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))-1) and l.period='NIGHT'");
						if(mysql_num_rows($result)){
							while($row = mysql_fetch_array($result)){
								echo "<p>";
								echo $row[name];
								echo "</p>";
							}
						}
						else{
							echo "<p>無</p>";
						}
					?>
				</li>
			</ul>
			<div class="title">
				<h2>請假學生</h2>
			</div>
			<ul>
				<li>
					<p><h3>本日請假學生</h3></p>
					<?
						$result = mysql_query("select * from student s left join `leave` l on s.id=l.student_id where l.date = date(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00'))");
						if(mysql_num_rows($result)){
							while($row = mysql_fetch_array($result)){
								echo "<p>";
								echo $row[name];
								echo "</p>";
							}
						}
						else{
							echo "<p>無</p>";
						}
					?>
				</li>
				<li>
					<p><h3>前後七天請假學生</h3></p>
					<?
						$result = mysql_query("select * from student s left join `leave` l on s.id=l.student_id where l.date >= date(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00')) - interval 7 day and l.date <= date(CONVERT_TZ(UTC_TIMESTAMP(),'+00:00','+08:00')) + interval 7 day order by l.date");
						if(mysql_num_rows($result)){
							while($row = mysql_fetch_array($result)){
								echo "<p>";
								echo $row[name];
								echo ": ";
								echo $row[date];
								echo "</p>";
							}
						}
						else{
							echo "<p>無</p>";
						}
					?>
				</li>
			</ul>
		</div>
		<div id="tbox2" style="width: 60%; background:#a7dcf9;">
			<div class="title">
				<h2>學生名冊</h2>
			</div>
			<?
				$result = mysql_query("select * from student order by name");
				if(mysql_num_rows($result)){
					while($row = mysql_fetch_array($result)){
						echo "<a class=\"button\" href=\"student.php?name=" . $row[name] . "&id=" . $row[id] . "\">";
						echo $row[name];
						echo "</a> ";
					}
				}
			?>
		</div>
	</div>
	<div id="welcome" class="container" style="border-top: 1px solid rgba(0,0,0,0.2);">
		<div class="title">
			<h2>新增學生</h2>
		</div>
		<form method="POST" action="new_student.php">
			<table align="center">
				<tr>
					<th>姓名</th><th>爸爸媽媽電話</th>
				</tr>
				<tr>
					<td><input type="text" name="name" style="height:40px;font-size:24pt;width:200px"></td>
					<td><input type="text" name="number" style="height:40px;font-size:24pt;width:200px"></td>
				</tr>
			</table>
			<input type="submit" value="新增" class="button" style="border:0;" >
		</form>
	</div>
</div>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>

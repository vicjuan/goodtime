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
<title>好時光報名修改系統</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">好時光報名修改系統</a></h1>
		</div>
	</div>
</div>
<div class="wrapper">
	<div id="welcome" class="container">
		<div class="title">
			<?
				$tok = strtok($_GET['date'], "_");
				$year = strtok("_");
				$month = strtok("_");
				$day = strtok("_");
				$date = $year . "-" . $month . "-" . $day;
				$result = mysql_query("select * from attend where student_id=$_GET[id] and unix_timestamp(date) >= unix_timestamp(\"$date\") and unix_timestamp(date) < unix_timestamp(\"$date\") + 86400");
				if(mysql_num_rows($result)){
					echo "<table align=\"center\">";
					echo "<tbody>";
					echo "<tr>";
					echo "<th>No.</th>";
					echo "<th>上課日期</th>";
					echo "<th></th>";
					echo "</tr>";
					$index = 0;
					while($row = mysql_fetch_array($result)){
						$index++;
						echo "<form method=\"POST\" action=\"record_edit_handle.php\">";
						echo "<input type=\"hidden\" name=\"id\" value=\"" . $row[id] . "\">";
						echo "<tr>";
						echo "<td style=\"width: initial;\">";
						echo $index;
						echo "</td>";
						echo "<td style=\"text-align: center;\">";
						echo "<input type=\"text\" name=\"date\" value=\"" . $row[date] . "\">";
						echo "</td>";
						echo "<td style=\"text-align: center;\">";
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
		</div>
		<a href="student.php?name=<?=$_GET[name]?>&id=<?=$_GET[id]?>" class="button">回到學生首頁</a>
	</div>
</div>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>

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
<title>好時光繳錢給老師系統</title>
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
			<h1><a href="#">好時光繳錢給老師系統</a></h1>
		</div>
	</div>
</div>
<div class="wrapper">
	<div id="welcome" class="container">
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
		<a href="teacher.php" class="button">回到老師首頁</a>
	</div>
</div>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>

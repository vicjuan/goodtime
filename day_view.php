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
	<div id="welcome" class="container">
		<div class="title">
			<h2><?=$_POST[date]?>出席學生</h2>
		</div>
		<?
			$result = mysql_query("select * from student left join attend on student.id = attend.student_id where unix_timestamp(attend.date) >= unix_timestamp(\"$_POST[date]\") and unix_timestamp(attend.date) < unix_timestamp(\"$_POST[date]\") + 86400");
			if(mysql_num_rows($result)){
				while($row = mysql_fetch_array($result)){
					echo "<a class=\"button\" href=\"student.php?name=" . $row[name] . "&id=" . $row[student_id] . "\">";
					echo $row[name];
					echo "</a> ";
				}
			}
		?>
	</div>
	<div id="welcome" class="container" style="border-top: 1px solid rgba(0,0,0,0.2);">
		<a href="teacher.php" class="button">回到老師首頁</a>
	</div>
</div>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>

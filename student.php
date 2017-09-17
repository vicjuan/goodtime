<?
	include("student_calendar.php");
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
				<h2>繳費情形</h2>
<?
					$result = mysql_query("select * from pay where student_id=$_GET[id] order by time desc");
					if(mysql_num_rows($result)){
						echo "<ul>";
						while($row = mysql_fetch_array($result)){
							echo "<li>";
							echo "<p><h3>" . $row[time] . "</h3></p>";
							echo "<form method=\"POST\" action=\"pay_edit.php\">";
							echo $row[pay_class] . "堂 ";
							echo "<input type=\"submit\" value=\"修改紀錄\">";
							echo "<input type=\"hidden\" name=\"id\" value=\"" . $row[id] . "\">";
							echo "</form>";
							echo "</li>";
						}
						echo "</ul>";
					}
					echo "<br><br>";
					echo "<form method=\"POST\" action=\"pay.php\">";
					echo "<input type=\"hidden\" name=\"id\" value=\"" . $_GET[id] . "\"> ";
					echo "我要繳 ";
					echo "<input type=\"text\" name=\"classes\" style=\"width: 30px;\"> ";
					echo "堂課的錢 ";
					echo "<input type=\"submit\" value=\"繳費\" class=\"button\">";
					echo "</form>";
?>
			</div>
		</div>
		<div id="tbox2" style="width: 50%">
			<div class="title">
				<h2>學生<?=$_GET[name]?>的出席情形</h2>
				<?=student_calendar($_GET[name], $_GET[id]);?>
			</div>
		</div>
		<div id="tbox3" style="width: 15%">
			<div class="title">
				<h2>上課日期</h2>
<?
					$result = mysql_query("select * from lesson where student_id=$_GET[id]");
					if(mysql_num_rows($result)){
						echo "<ul>";
						while($row = mysql_fetch_array($result)){
							echo "<li>";
							echo "<p><h3>";
							switch($row[day]){
								case 0:
									echo "星期天";
									break;
								case 1:
									echo "星期一";
									break;
								case 2:
									echo "星期二";
									break;
								case 3:
									echo "星期三";
									break;
								case 4:
									echo "星期四";
									break;
								case 5:
									echo "星期五";
									break;
								case 6:
									echo "星期六";
									break;
							}
							switch($row[period]){
								case 'MORNING':
									echo "早上";
									break;
								case 'AFTERNOON':
									echo "下午";
									break;
								case 'NIGHT':
									echo "晚上";
									break;
							}
							echo "</h3></p>";
							echo "<form method=\"POST\" action=\"lesson_edit.php\">";
							echo "<input type=\"hidden\" name=\"id\" value=\"" . $row[id] . "\">";
							echo "<input type=\"submit\" name=\"mode\" value=\"edit\">";
							echo "<input type=\"submit\" name=\"mode\" value=\"delete\">";
							echo "</form>";
							echo "</li>";
						}
						echo "</ul>";
					}
					echo "<br><br>";
					echo "<form method=\"POST\" action=\"lesson.php\">";
					echo "<input type=\"hidden\" name=\"id\" value=\"" . $_GET[id] . "\"> ";
					echo "新增課程 ";
					echo "<select name=\"day\">";
					echo "<option value=\"0\">星期天</option>";
					echo "<option value=\"1\">星期一</option>";
					echo "<option value=\"2\">星期二</option>";
					echo "<option value=\"3\">星期三</option>";
					echo "<option value=\"4\">星期四</option>";
					echo "<option value=\"5\">星期五</option>";
					echo "<option value=\"6\">星期六</option>";
					echo "</select> ";
					echo "<select name=\"period\">";
					echo "<option value=\"MORNING\">早上</option>";
					echo "<option value=\"AFTERNOON\">下午</option>";
					echo "<option value=\"NIGHT\">晚上</option>";
					echo "</select> ";
					echo "<input type=\"submit\" value=\"新增\" class=\"button\">";
					echo "</form>";
?>
			</div>
		</div>
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

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
<title>好時光課程修改系統</title>
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
			<h1><a href="#">好時光課程修改系統</a></h1>
		</div>
	</div>
</div>
<div class="wrapper">
	<div id="welcome" class="container">
		<?
			if($_POST['mode'] == 'delete'){
				$result = mysql_query("delete from lesson where id=$_POST[id]");
				if(!$result){
					die('刪除失敗' . mysql_error());
				}
				echo "<div class=\"title\">";
				echo "<h2>刪除成功！</h2>";
				echo "</div>";
			}
			else{
				$result = mysql_query("select * from lesson where id=$_POST[id]");
				if(mysql_num_rows($result)){
					$row = mysql_fetch_array($result);
					echo "<form method=\"POST\" action=\"lesson_edit_handle.php\">";
					echo "<input type=\"hidden\" name=\"id\" value=\"" . $_POST[id] . "\">";
					echo "<table align=\"center\">";
					echo "<tbody>";
					echo "<tr>";
					echo "<th>星期</th>";
					echo "<th>時段</th>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
					echo "<select name=\"day\">";
					for($index = 0; $index < 7; $index++){
						echo "<option value=\"". $index . "\" ";
						if($index == $row['day']){
							echo "selected";
						}
						echo ">";
						switch($index){
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
						echo "</option>";
					}
					echo "</select> ";
					echo "</td>";
					echo "<td>";
					echo "<select name=\"period\" >";
					echo "<option value=\"MORNING\" ";
					if($row['period'] == 'MORNING'){
						echo "selected";
					}
					echo ">早上</option>";
					echo "<option value=\"AFTERNOON\" ";
					if($row['period'] == 'AFTERNOON'){
						echo "selected";
					}
					echo ">下午</option>";
					echo "<option value=\"NIGHT\" ";
					if($row['period'] == 'NIGHT'){
						echo "selected";
					}
					echo ">晚上</option>";
					echo "</select> ";
					echo "</td>";
					echo "</tbody>";
					echo "</table>";
					echo "<input type=\"submit\" value=\"修改\" class=\"button\">";
					echo "</form>";
				}
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

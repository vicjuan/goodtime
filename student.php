<?
	include("student_calendar.php");
?>
<html>
	<head>
		<title>好時光老師系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				echo "學生" . $_GET[name] . "的出席情形<br>";
				student_calendar($_GET[name], $_GET[id]);

					// 繳費
					echo "<hr>學生" . $_GET[name] . "的繳費情形";
					$result = mysql_query("select * from pay where student_id=$_GET[id] order by time desc");
					if(mysql_num_rows($result)){
						echo "<table cellpadding=\"0\" cellspacing=\"0\"  class=\"calendar\">";
						echo "<tbody>";
						echo "<tr class=\"calendar-row\">";
						echo "<td class=\"calendar-day-head\">堂數</td>";
						echo "<td class=\"calendar-day-head\">繳費日期</td>";
						echo "<td class=\"calendar-day-head\">修改</td>";
						echo "</tr>";
						while($row = mysql_fetch_array($result)){
							echo "<tr>";
							echo "<td class=\"calendar-day-np\" style=\"text-align: center;\">" . $row[pay_class] . "</td>";
							echo "<td class=\"calendar-day-np\" style=\"width: initial;\">" . $row[time] . "</td>";
							echo "<form method=\"POST\" action=\"pay_edit.php\">";
							echo "<td class=\"calendar-day-np\" style=\"text-align: center;\">";
							echo "<input type=\"submit\" value=\"修改紀錄\">";
							echo "<input type=\"hidden\" name=\"id\" value=\"" . $row[id] . "\">";
							echo "</td>";
							echo "</form>";
							echo "</tr>";
						}
						echo "</tbody>";
						echo "</table>";
					}
					echo "<br><br>";
					echo "<form method=\"POST\" action=\"pay.php\">";
					echo "<input type=\"hidden\" name=\"id\" value=\"" . $_GET[id] . "\"> ";
					echo "我今天要繳 ";
					echo "<input type=\"text\" name=\"classes\" style=\"width: 30px;\"> ";
					echo "堂課的錢 ";
					echo "<input type=\"submit\" value=\"繳費\" style=\"text-align:center; background:white; height: 30px; width: 50px; font-size: 16;\">";
					echo "</form>";
					
					// 固定上課日
					echo "<hr>學生" . $name . "的上課日期";
					$result = mysql_query("select * from lesson where student_id=$_GET[id]");
					if(mysql_num_rows($result)){
						echo "<table cellpadding=\"0\" cellspacing=\"0\"  class=\"calendar\">";
						echo "<tbody>";
						echo "<tr class=\"calendar-row\">";
						echo "<td class=\"calendar-day-head\">星期</td>";
						echo "<td class=\"calendar-day-head\">時段</td>";
						echo "<td class=\"calendar-day-head\">修改</td>";
						echo "<td class=\"calendar-day-head\">刪除</td>";
						echo "</tr>";
						while($row = mysql_fetch_array($result)){
							echo "<tr>";
							echo "<td class=\"calendar-day-np\" style=\"text-align: center;\">";
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
							echo "</td>";
							echo "<td class=\"calendar-day-np\" style=\"text-align: center;\">";
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
							echo "</td>";
							echo "<form method=\"POST\" action=\"lesson_edit.php\">";
							echo "<input type=\"hidden\" name=\"id\" value=\"" . $row[id] . "\">";
							echo "<td class=\"calendar-day-np\" style=\"text-align: center;\">";
							echo "<input type=\"submit\" name=\"mode\" value=\"edit\">";
							echo "</td>";
							echo "<td class=\"calendar-day-np\" style=\"text-align: center;\">";
							echo "<input type=\"submit\" name=\"mode\" value=\"delete\">";
							echo "</td>";
							echo "</form>";
							echo "</tr>";
						}
						echo "</tbody>";
						echo "</table>";
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
					echo "<input type=\"submit\" value=\"新增\">";
					echo "</form>";
					
					echo "<a href=\"teacher.php\">回到老師首頁</a>";
			?>
		</center>
	</body>

	<script language="javascript">
		var addLink = function (element){
			window.location.assign("record_edit.php?id=" + <?=$_GET[id]?> + "&date=" + element.id);
		}
		var elements = document.getElementsByClassName("calendar-day");
		for(var i = 0; i < elements.length; i++){
			elements[i].addEventListener("click", function(){addLink(this);}, false);
		}
	</script>

</html>

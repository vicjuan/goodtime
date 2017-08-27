<?
	include("connect.php");
	include("calendar.php");
?>
<html>
	<head>
		<title>好時光課程修改系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				if($_POST['mode'] == 'delete'){
					$result = mysql_query("delete from lesson where id=$_POST[id]");
					if(!$result){
						die('刪除失敗' . mysql_error());
					}
					echo "刪除成功！<br>";
				}
				else{
					$result = mysql_query("select * from lesson where id=$_POST[id]");
					if(mysql_num_rows($result)){
						$row = mysql_fetch_array($result);
						echo "<form method=\"POST\" action=\"lesson_edit_handle.php\">";
						echo "<input type=\"hidden\" name=\"id\" value=\"" . $_POST[id] . "\">";
						echo "<table cellpadding=\"0\" cellspacing=\"0\"  class=\"calendar\">";
						echo "<tbody>";
						echo "<tr class=\"calendar-row\">";
						echo "<td class=\"calendar-day-head\">星期</td>";
						echo "<td class=\"calendar-day-head\">時段</td>";
						echo "<td class=\"calendar-day-head\"></td>";
						echo "</tr>";
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
						echo "<td class=\"calendar-day-np\" style=\"text-align: center;\">";
						echo "<input type=\"submit\" value=\修改\">";
						echo "</td>";
						echo "</tbody>";
						echo "</table>";
						echo "</form>";
					}
				}
				echo "<a href=\"teacher.php\">回到老師首頁</a>";
			?>
		</center>
	</body>
</html>

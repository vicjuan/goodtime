<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光老師系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				echo "<table>";
				echo "<tr><th>學生姓名</th></tr>";
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
				echo "</table>";
			?>
			新增學生<br>
			<form method="POST" action="new_student.php">
				<table>
					<tr>
						<th>姓名</th><th>爸爸媽媽電話</th>
					</tr>
					<tr>
						<td><input type="text" name="name"></td>
						<td><input type="text" name="phone"></td>
					</tr>
				</table>
				<input type="submit" name="新增">
			</form>
		</center>
	</body>
</html>
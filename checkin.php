<?
	include("connect.php");
	$result = mysql_query("insert into attend values ('$_POST[id]',date(current_time()))");
	if(!$result){
		die('點名失敗' . mysql_error());
	}
?>
<html>
	<head>
		<title>好時光上課點名系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?=$_POST[name]?>點名成功！
			<table>
				<tr>
					<th>已上課日期</th>
				</tr>
				<?
					$result = mysql_query("select * from attend where number='$_POST[id]'");
					if(mysql_num_rows($result)){
						while($row = mysql_fetch_array($result)){
							echo "<tr>";
							echo "<td>";
							echo $row[date];
							echo "</td>";
							echo "</tr>";
						}
					}
				?>
			</table>
		</center>
	</body>
</html>

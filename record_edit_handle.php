<?
	include("connect.php");
?>
<html>
	<head>
		<title>好時光報名修改系統</title>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	</head>
	<body bgcolor="#00BBBB">
		<center>
			<?
				if($_POST['action'] == "delete"){
					$result = mysql_query("delete from attend where id=$_POST[id]");
					if(!$result){
						die('刪除失敗' . mysql_error());
					}
				}
				else{
					$result = mysql_query("update attend set date=\"$_POST[date]\" where id=$_POST[id]");
					if(!$result){
						die('修改失敗' . mysql_error());
					}
				}
				echo "修改成功！<br>";
				echo "<a href=\"teacher.php\">回到老師首頁</a>";
			?>
		</center>
	</body>
</html>

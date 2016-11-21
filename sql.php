<?php
include('conn.php');
if( isset($_POST['num_txt']) ){
	$sql="select * from student where num_txt='".$_POST['num_txt']."' and password='".$_POST['password']."'";
	
$result= mysql_query($sql, $link) or die("SQL ERROR!!");
	if( $record = mysql_fetch_array($result) ){
		echo("學號:".$record['num_txt'].",登入成功，歡迎你".$record['name']."<br>");
		$_SESSION['SID']=$record['ID']*1;
		$_SESSION['Snum']=$record['num_txt'];
		$_SESSION['Sname']=$record['name'];
	}else{
		echo('學號密碼錯誤!!');
	}
}
/*
*/
if(! isset($_SESSION['SID']) ){
?>

<form name="form1" action="" method="post">
       
         <label for="num_txt">學號:</label>
         <input type="text" name="num_txt" id="num_txt">
         <br>
         <label for="password">密碼:</label>
         <input type="text" name="password" id="password">
         <br>
         <input type="submit" name="button" id="button" value="送出">
</form>

<?
}else{
	if( isset($_GET['action']) && $_GET['action']=='del' ){
		$sql='DELETE FROM `student` WHERE `student`.`ID` ='.$_GET['SID'];
		if(mysql_query($sql) ){
			echo("刪除成功!!");
		}else{
			echo("刪除失敗!!");
		}
	}
?>

<p><a href="add.php">新增資料</a></p>
<p><a href="logout.php">清除SESSION</a></p>


<table width="100%" border="1">
  <tr>
    <td>姓名</td>
    <td>學號</td>
    <td>性別</td>
    <td>EMALL</td>
    <td>操作</td>
  </tr>

<?
 $sql="select * from student";
$result= mysql_query($sql, $link) or die("SQL ERROR!!");
	while( $record = mysql_fetch_array($result) ){
?> 
 
  <tr>
    <td><?=$record['name']?></td>
    <td><?=$record['num_txt']?></td>
    <td><?=$record['sex']?></td>
    <td><?=$record['email']?></td>
    <td><a href="B.php?SID=<?=$record['ID']?>">編輯</a> <a href="?SID=<?=$record['ID']?>&action=del">刪除</a></td>
  </tr>

<?
}
?>

</table>
<p>&nbsp;</p>

<?php
}
?>

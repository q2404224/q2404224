<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include("conn.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<p>
  <?php

if(  isset($_SESSION['SID']) ) {
	if( isset($_POST['actionOK'])){
	$sql="UPDATE `student` SET  `name` = '".$_POST['name']."', `sex` = '".$_POST['sex']."', `classname` = '".$_POST['classname']."', `num_txt` = '".$_POST['num_txt']."', `address` = '".$_POST['address']."', `email` = '".$_POST['email']."', `phone` = '".$_POST['phone']."', `password` = '".$_POST['password']."' WHERE `student`.`ID` =".$_GET['SID'];
		
		if(mysql_query($sql) ){
			echo("資料編輯成功!!");
		}else{
			echo("資料編輯失敗!!");
		}
		echo "檔案名稱: ".
  $_FILES["upfile"]["name"]."<br>";
echo "暫存檔名: ".
  $_FILES["upfile"]["tmp_name"]."<br>";
echo "檔案尺寸: ".
  $_FILES["upfile"]["size"]."<br>";
echo "檔案種類: ".
  $_FILES["upfile"]["type"]."<br><hr>";

		
	 }
	 $sql="select * from student where ID=".$_GET['SID'] ;
	 $result= mysql_query($sql) or die("SQL ERROR!!");
	if( $record = mysql_fetch_array($result) ){	
		
		?>
</p>
<form id="form1" name="form1" method="post" enctype="multipart/form-data">

 <table width="100%" border="1">
  <tr>
    <td >姓名</td>
    <td ><label for="name"></label>
      <input name="name" type="text" id="name" value="<?=$record['name']?>" /></td>
  </tr>
  <tr>
    <td>學號</td>
    <td><label for="num_txt"></label>
      <input name="num_txt" type="text" id="num_txt" value="<?=$record['num_txt']?>" /></td>
  </tr>
  <tr>
    <td>性別</td>
    <td><label for="sex">
    <input type="radio" name="sex" id="sex" value="男" <?php  if($record['sex']=='男') {echo("checked='checked'");}?> />男
    <input type="radio" name="sex" id="sex" value="女" <?php  if($record['sex']=='女') {echo("checked='checked'");}?> />女</label> </td>
  </tr>
  <tr>
    <td>班級</td>
    <td><label for="classname"></label>
      <select name="classname" id="classname">
        <option value="<?=$record['classname']?>"><?=$record['classname']?></option>
        <option value="資管系">資管系</option>
        <option value="資工系">資工系</option>
        <option value="會計系">會計系</option>
        <option value="商設系">商設系</option>
</select></td>
  </tr>
  <tr>
    <td>電話</td>
    <td>
      <input name="phone" type="text" id="phone" value="<?=$record['phone']?>" /></td>
  </tr>
  <tr>
  <td>住址</td>
    <td> <input name="address" type="text" id="address" value="<?=$record['address']?>" /></td>
  </tr>
  <tr>
    <td>EMAIL</td>
    <td> <input name="email" type="text" id="email" value="<?=$record['email']?>" /></td>
  </tr>
  <tr>
    <td>生日</td>
    <td> <input name="bday" type="text" id="bday" value="<?=$record['bday']?>" /></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td> <input name="password" type="text" id="password" value="<?=$record['password']?>" /></td>
  </tr>
  <tr>
   <td>檔案上傳</td>
    <td> <input name="upsile" type="text" id="upfile" value="<?=$record['upfile']?>" /></td>
  </tr>
  <tr>
  <td colspan="2">照片圖檔:
     <label for="fileField"></label>
     
  <input name="upfile" type="file" id="upfile"/></td>
  </tr>
  
  
  <tr>
  	<td colaspan="2"><input name="actionOK" type="submit" id= "button" value="送出" /></td>
  </tr>
</table>
</form>




<?
}else{
	echo("還沒登入系統喔!!");
}
?>
<?
}
?>
<p><a href="sql.php">回登入首頁</a></p>
</body>
</html>
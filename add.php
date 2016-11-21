<?php
include("conn.php");
?>

<?php
if(  isset($_SESSION['SID']) ) {
	if( isset($_POST['actionOK'])){
		$addsql="INSERT INTO `student` (`name`, `sex`, `classname`, `num_txt`, `address`, `email`, `phone`, `bday`,  `password`) VALUES ('".$_POST['name']."', '".$_POST['sex']."', '".$_POST['classname']."', '".$_POST['num_txt']."', '".$_POST['address']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['bday']."','".$_POST['password']."');";
		if(mysql_query($addsql) ){
			echo("資料庫新增成功!!");
			}else{
				echo("資料新增失敗!!");
			}
	}
				
?>

 
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="1">
<tr>
    <td >姓名</td>
    <td ><label for="name"></label>
      <input type="text" name="name" id="name" /></td>
  </tr>
  <tr>
    <td>學號</td>
    <td><label for="num_txt"></label>
      <input type="text" name="num_txt" id="num_txt" /></td>
  </tr>
  <tr>
    <td>性別</td>
    <td><label for="sex">
    <input type="radio" name="sex" id="sex" value="男"  />男
    <input type="radio" name="sex" id="sex" value="女" />女</label> </td>
  </tr>
  <tr>
    <td>班級</td>
    <td><label for="classname"></label>
      <select name="classname" id="classname">
        <option value="資管系">資管系</option>
        <option value="資工系">資工系</option>
        <option value="會計系">會計系</option>
        <option value="商設系">商設系</option>
      </select></td>
  </tr>
  <tr>
    <td>電話</td>
    <td>
      <input type="text" name="phone" id="phone" /></td>
  </tr>
  <tr>
  <td>住址</td>
    <td> <input type="text" name="address" id="address" /></td>
  </tr>
  <tr>
    <td>EMAIL</td>
    <td> <input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td>生日</td>
    <td> <input type="text" name="bday" id="bday" /></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td> <input type="text" name="password" id="password" /></td>
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


<p><a href="sql.php">回登入首頁</a></p>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php 
session_start();
$link = mysql_connect('localhost','root','12345678') or die ("Could not connect : " .
mysql_error());
mysql_query('SET NAMES utf8');
mysql_query('SET CHARACTER_SET_CLIENT=utf8');
mysql_query('SET CHARACTER_SET_RESULTS=utf8');
mysql_select_db("school") or die("Could not select datebase");
?>

</body>
</html>
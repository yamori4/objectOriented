<?php
session_start();
$_SESSION=array();
if(isset($_COOKIE['loginFlag'])==true){
	setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>オブジェクト指向演習</title>
</head>
<body>
	ログアウトしました。<br />
	<br />
	<a href="./index.html">ログイン画面へ</a>
</body>
</html>
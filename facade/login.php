<?php
require_once(dirname(__FILE__).'/authManager.php');

$auth = new AuthManager();

//ログインに必要な処理はこれだけ↓この一行にすべてが集約している。
$loginResult = $auth->authCheck($_POST['loginId'], $_POST['pass']);


if($loginResult){
	//ログイン成功時
	$paths = explode("/", $_SERVER["REQUEST_URI"]);
	header("Location: " . ($_SERVER["HTTPS"] === "on" ? "https" : "http") . '://' .
		$_SERVER["HTTP_HOST"] . '/' . $paths[1] . '/index.php'); //ホーム画面へ遷移させる
	exit();
}else{
	//ログイン功時
	print 'ログインに失敗しましました。<br />';
	print '<a href="login.html"> 戻る</a>';
}

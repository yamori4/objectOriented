<html>
<head>
<title>Singleton</title>
</head>
<body>
<?php
require_once (dirname(__FILE__).'/logger.php');
require_once(dirname(__FILE__).'/../observer/shoppingBasket.php');

session_start();

//ホームへのリンクを画面右上に表示する
echo '<div align="right"><a href="../index.php">ホームへ戻る</a></div>';

$purchase = ""; //購入リスト

//買い物かごの中身を書き出す
$purchase .= "■買い物かご\r\n";
$existFlag = false;
$shoppingBasket = isset($_SESSION['basket']) ? $_SESSION['basket'] : null;
if($shoppingBasket === null || count($shoppingBasket->getItems()) == 0){
	$purchase .=  "買い物かごが空です。\r\n";
}else{
	$existFlag = true; //商品が買い物かごに入っている場合にフラグを立てる。
	foreach($shoppingBasket->getItems() as $name => $price){
		$purchase .= $name . "(" . $price . "円)\r\n";
	}
}

//包装の設定を書き出す
$purchase .= "■オプション\r\n";
$decorations = isset($_SESSION['decorations']) ? $_SESSION['decorations'] : array();
if(count($decorations) == 0){
	$purchase .= "オプションはありません。\r\n";
}
foreach ($decorations as $decoration) {
	switch ($decoration) {
		case 'cyan':
			$purchase .= "色紙(水色)\r\n";
			break;
		case 'hard':
			$purchase .= "外箱(固い)\r\n";
			break;
		case 'large':
			$purchase .= "箱サイズ(大)\r\n";
			break;
		default:
			//Do Nothing
	}
}

//購入情報を画面上に表示する
echo str_replace("\r\n", "<br />", $purchase) . "<br />";

//購入ボタンを画面上に表示する
if($existFlag){
	echo '<form action="" method="post">';
	echo '<input type="hidden" name="buyFlag" value="true"></input>';
	echo '<input type="submit" value="購入する">';
	echo '</form>';
}

//購入ボタンが押された場合
if(isset($_POST['buyFlag'])){

	//インスタンスを生成し、購入履歴を残す
	$logger1 = Logger::getInstance();
	$logger1->write($purchase); //ログを残す

	echo '<p><font style="color:red">商品を購入しました！</font></p>';

	/***********************************************/
	echo '<hr style="border-top:3px double blue">';
	echo "<h1>以下は蛇足、本当にインスタンスが１つしか生成されてないかどうかを確認している</h1>";

	//再度インスタンスを取得する。
	$logger2 = Logger::getInstance();

	echo "<h2>インスタンス生成時にランダムに割り振られる番号について２つのインスタンスで比較する</h2>";
	echo "*** ID number ***<br />";
	echo "Logger 1 : " . $logger1->getID() . "<br />";
	echo "Logger 2 : " . $logger2->getID() . "<br />";
	echo "<hr>";

	/***********************************************/
	echo "<h2>2つのインスタンスが同一かどうか？</h2>";
	if($logger1 === $logger2){
		echo "同じインスタンスです。";
	}else{
		echo "違うインスタンスです。";
	}
	echo "<hr>";

	/***********************************************/
	echo "<h2>試しに複製してみるとエラーが発生する</h2>";
	$cloneLogger1 = clone $logger1;
}

?>
</body>
</html>
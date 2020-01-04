<html>
<head>
<title>Observer</title>
</head>
<body>
<?php
require_once (dirname(__FILE__).'/shoppingBasket.php');
require_once (dirname(__FILE__).'/deliveryCostObserver.php');
require_once (dirname(__FILE__).'/displayObserver.php');
require_once (dirname(__FILE__).'/../_common/FileManager.php');

session_start();

//ホームへのリンクを画面右上に表示する
echo '<div align="right"><a href="../index.php">ホームへ戻る</a></div>';

/**
 * 買い物かごを作成するメソッド
 * @return ShoppingBasket $basket 買い物かご
 */
function makeBasket() {
	$basket = new ShoppingBasket();
	//オブザーバーを追加する。
	$basket->addObserver(new DeliveryCostObserver());
	$basket->addObserver(new DisplayObserver());

	//オブザーバーを削除することもできる、参考までに。
	//$basket->removeObserver(new DisplayObserver());

	return $basket;
}

//買い物かごのデータが作られていない場合は新規に作成する。
$basket = isset($_SESSION['basket']) ? $_SESSION['basket'] : null;
if (is_null($basket)) {
	$basket = makeBasket();
}

//操作内容を画面上に表示する。
if(isset($_GET['action'])){
	switch ($_GET['action']) {
		case 'add':
			$book = array($_GET['name'] => (int)$_GET['price']);
			$basket->addItem($book);
			echo '<p><font color="olive">商品を追加しました。</font></p>';
			break;
		case 'remove':
			$book = array($_GET['name'] => (int)$_GET['price']);
			$basket->removeItem($book);
			echo '<p><font color="green">商品を削除しました。</font></p>';
			break;
		case 'clear':
			$basket = makeBasket();
			echo '<p><font color="red">買い物かごを空にしました。</font></p>';
			break;
		default:
			//Do Nothing
	}
}

$_SESSION['basket'] = $basket; //セッションに買い物かごに入れた商品の情報を保持させる。

//本情報を取得する
$books = FileManager::getAllBooks();

/************************************************/
echo("<hr><h2>商品リスト</h2>");
foreach($books as $book){ 
	echo $book->getName() . '(' . $book->getPrice() . '円) ';
	echo("<a href=\"./index.php?action=add&name=".$book->getName()."&price=".$book->getPrice()."\" >購入</a><br />");
}

/************************************************/
echo("<hr><h2>買い物かご</h2>");
$sum = 0;
foreach($basket->getItems() as $key => $value){
	echo $key . '(' . $value . '円) ';

	//配送料以外の項目には[かごから削除]ボタンを表示させる。
	if ($key !== DeliveryCostObserver::$DELLIVERY_FEE){
		echo("<a href=\"./index.php?action=remove&name=". $key . "&price=". $value . "\" >かごから削除</a>");
	}

	echo("<br />");
	$sum += (int)$value;
}
echo("<br />");
echo("【合計：" . $sum . "円】");

echo("<br />");
echo("<a href=\"./index.php?action=clear\">買い物かごを空にする</a><br />");


?>
</body>
</html>

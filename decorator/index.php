<html>
<head>
<title>Decorator</title>
</head>
<body>
<?php
require_once(dirname(__FILE__).'/cyanPack.php');
require_once(dirname(__FILE__).'/LargePack.php');
require_once(dirname(__FILE__).'/hardPack.php');
require_once(dirname(__FILE__).'/plainPack.php');
require_once(dirname(__FILE__).'/../observer/shoppingBasket.php');

session_start();

//ホームへのリンクを画面右上に表示する
echo '<div align="right"><a href="../index.php">ホームへ戻る</a></div>';

//デコレーションの情報を取得する。
if(isset($_POST['decorations'])){
	$_SESSION['decorations'] = $_POST['decorations'];
}else{
	$_SESSION['decorations'] = isset($_SESSION['decorations']) ?  $_SESSION['decorations'] : array();
}

//別のデザインパターンの演習で使うので、
//セッションにデコレーションの情報を保持して用いる。
$_SESSION['decorations'] = $_SESSION['decorations'];


//基本となるCSSデザインを定義する。
$pack = new PlainPack();
$pack->setPack(array('padding' => '30px', 'margin-bottom' => '30px', 'border' => '1px dotted #D3D3D3;'));

//どのようなデザインにするかを把握する。
foreach ($_SESSION['decorations'] as $decoration) {
	switch ($decoration) {
		case 'cyan':
			$pack = new CyanPack($pack);
			break;
		case 'hard':
			$pack = new HardPack($pack);
			break;
		case 'large':
			$pack = new LargePack($pack);
			break;
		default:
			//Do Nothing
	}
}

//CSSを設定を定義する
$styleArr = $pack->getPack();
$styleString = '';
foreach($styleArr as $property => $value){
	$styleString .= $property . ': ' . $value . '; ';
}

$shoppingBasket = isset($_SESSION['basket']) ? $_SESSION['basket'] : null;
if($shoppingBasket === null || count($shoppingBasket->getItems()) == 0){
	echo '買い物かごが空です。';
}else{
	echo '<table style="' . $styleString . '">'; //CSSでデザインを表現する。
	foreach($shoppingBasket->getItems() as $name => $price){
			echo '<tr><td>' . $name . '(' . $price . '円)</td></tr>';
	}
	echo '</table>';
}

echo '<hr>';
echo '<form action="" method="post">';
echo 'オプション：<br />';
echo '<input type="checkbox" name="decorations[]" ' . (in_array("cyan", $_SESSION['decorations']) ? 'checked="checked"' : '""') . ' value="cyan">色紙(水色)<br />';
echo '<input type="checkbox" name="decorations[]" ' . (in_array("hard", $_SESSION['decorations']) ? 'checked="checked"' : '""') . ' value="hard">外箱(固い)<br />';
echo '<input type="checkbox" name="decorations[]" ' . (in_array("large", $_SESSION['decorations']) ? 'checked="checked"' : '""') . ' value="large">箱サイズ(大)<br />';

echo '<input type="submit" value="適用する">';
echo '</form>';


?>
</body>
</html>

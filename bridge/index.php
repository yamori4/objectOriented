<html>
<head>
<title>Bridge</title>
</head>
<body>
<?php
require_once(dirname(__FILE__).'/sorter.php');
require_once(dirname(__FILE__).'/sortTimer.php');
require_once(dirname(__FILE__).'/bubbleSort.php');
require_once(dirname(__FILE__).'/countingSort.php');
require_once(dirname(__FILE__).'/../_common/FileManager.php');

session_start();

//ホームへのリンクを画面右上に表示する
echo '<div align="right"><a href="../index.php">ホームへ戻る</a></div>';

//本情報を取得する
$books = FileManager::getAllBooks();

//本についての情報のうち、価格情報のみを抽出
$prices = array();
foreach($books as $book){ 
	array_push ($prices, (int)$book->getPrice());
}

/***********************************************/
echo ('<h2>バブルソート</h2>');
$bubble = new BubbleSort();
$sorter = new Sorter($bubble);
var_export($sorter->sort($prices));
echo ('<br /><br />');

$bubble = new BubbleSort();
$sortTimer = new SortTimer($bubble);

echo "処理時間 : " . $sortTimer->measure($prices) . "ミリ秒<br />";
echo ('<hr>');


/***********************************************/
echo ('<h2>カウンティングソート</h2>');
$counting = new CountingSort();
$sorter = new Sorter($counting);
var_export($sorter->sort($prices));
echo ('<br /><br />');

$counting = new CountingSort();
$sortTimer = new SortTimer($counting);
echo "処理時間 : " . $sortTimer->measure($prices) . "ミリ秒<br />";


?>
</body>
</html>
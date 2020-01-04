<html>
<head>
<title>Iterator</title>
</head>
<body>
<?php
require_once (dirname(__FILE__).'/bookIterator.php');
require_once (dirname(__FILE__).'/priceIterator.php');
require_once (dirname(__FILE__).'/../templateMethod/listDisplay.php');
require_once (dirname(__FILE__).'/../_common/FileManager.php');

session_start();

//ホームへのリンクを画面右上に表示する
echo '<div align="right"><a href="../index.php">ホームへ戻る</a></div>';

//本情報を取得する
$books = FileManager::getAllBooks();

$bookIterator = new BookIterator();
foreach ($books as $book){
	//イテレーターにデータを格納する
	$bookIterator->add(new Book($book->getCode(), $book->getName(), $book->getAuthor(), $book->getPrice(), $book->getRelease()));
}
$iterator = $bookIterator->getIterator();

/***************************************************/
echo '<h2>iteratorのメソッドを利用した場合</h2>';
echo '<table border=1>';
echo '<tr><th>商品コード</th><th>タイトル</th><th>著者名</th><th>価格</th><th>発売日</th></tr>';
while ($iterator->valid()) {
	$book = $iterator->current();
	echo '<tr>';
	echo '<td>' . $book->getCode() . '</td>';
	echo '<td>' . $book->getName() . '</td>';
	echo '<td>' . $book->getAuthor() . '</td>';
	echo '<td>' . $book->getPrice() . '</td>';
	echo '<td>' . $book->getRelease() . '</td>';
	echo '</tr>';
	$iterator->next();
}
echo '</table>';
echo '<hr>';


/***************************************************/
echo '<h2>foreach文を利用した場合</h2>'; //ちなみにforeachは暗黙的なイテレータとなりえる。
echo '<table border=1>';
echo '<tr><th>商品コード</th><th>タイトル</th><th>著者名</th><th>価格</th><th>発売日</th></tr>';
foreach ($iterator as $book) {
	echo '<tr>';
	echo '<td>' . $book->getCode() . '</td>';
	echo '<td>' . $book->getName() . '</td>';
	echo '<td>' . $book->getAuthor() . '</td>';
	echo '<td>' . $book->getPrice() . '</td>';
	echo '<td>' . $book->getRelease() . '</td>';
	echo '</tr>';
}
echo '</table>';
echo '<hr>';

/***************************************************/
echo '<h2>1500円より高価な本のみを抽出するiteratorで要素を取得した場合</h2>';

$over1500YenIterator = new Over1500YenIterator($iterator);

echo '<table border=1>';
echo '<tr><th>商品コード</th><th>タイトル</th><th>著者名</th><th>価格</th><th>発売日</th></tr>';
foreach ($over1500YenIterator as $book) {
	echo '<tr>';
	echo '<td>' . $book->getCode() . '</td>';
	echo '<td>' . $book->getName() . '</td>';
	echo '<td>' . $book->getAuthor() . '</td>';
	echo '<td>' . $book->getPrice() . '</td>';
	echo '<td>' . $book->getRelease() . '</td>';
	echo '</tr>';
}
echo '</table>';
echo '<hr>';

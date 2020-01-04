<html>
<head>
<title>Strategy</title>
</head>
<body>
<?php
require_once (dirname(__FILE__).'/context.php');
require_once (dirname(__FILE__).'/releaseMonthStrategy.php');
require_once (dirname(__FILE__).'/bookNameStrategy.php');
require_once (dirname(__FILE__).'/../_common/FileManager.php');

session_start();

//ホームへのリンクを画面右上に表示する
echo '<div align="right"><a href="../index.php">ホームへ戻る</a></div>';


//戦略を状況に応じて切り替える
if (rand(0, 1)) { //このサンプルプログラムではランダムに切り替えることにしている。
	$description = "発売日に基づいて「オススメ」欄を作成した場合";
	$strategy = new releaseMonthStrategy();
} else {
	$description = "タイトルに基づいて「オススメ」欄を作成した場合";
	$strategy = new bookNameStrategy();
}
$context = new Context($strategy);

//本情報を取得する
$books = FileManager::getAllBooks();


//本についての情報をテーブルに表示する
echo '<h2>' . $description . '</h2>';
echo '<table border=1>';
echo '<tr><th>商品コード</th><th>タイトル</th><th>著者名</th><th>価格</th><th>発売日</th><th>オススメ</th>';
foreach ($books as $book) {
	echo '<tr>';
	echo '<td>' . $book->getCode() . '</td>';
	echo '<td>' . $book->getName() . '</td>';
	echo '<td>' . $book->getAuthor() . '</td>';
	echo '<td>' . $book->getPrice() . '</td>';
	echo '<td>' . $book->getRelease() . '</td>';
		//戦略を実行する。
		//ポリモーフィズムを利用しているのでどのようなstrategyであろうとも
		//executeで実行するのは同じです。、
	echo '<td>' . $context->execute($book) . '</td>';
	echo '</tr>';
}
echo '</table>';


?>
</body>
</html>
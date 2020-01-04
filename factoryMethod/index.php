<html>
<head>
<title>Factory Method</title>
</head>
<body>
<?php
require_once (dirname(__FILE__).'/factory.php');
require_once (dirname(__FILE__).'/../_common/Book.php');
require_once (dirname(__FILE__).'/../templateMethod/ListDisplay.php');

session_start();

//ホームへのリンクを画面右上に表示する
echo '<div align="right"><a href="../index.php">ホームへ戻る</a></div>';

/**
 * 引数で指定したファイルを読み込み、画面上に表示する。
 * @param String fileName 読み込み・表示対象のファイルの名前
 * @return Void
 */
function display($fileName){

	//工場(Factory)のインスタンスを生成する。
	$factory = new Factory();
	
	//工場(Factory)からファイルリーダーを製造する。
	//ファイルリーダーは引数で指定したファイルのフォーマットに合わせた様式となっている。
	$fileReader = $factory->create($fileName);
	
	//ファイルを開く
	$fileReader->open();

	//ファイルを読み込む
	$books = $fileReader->get();

	//画面上に表示する。
	$display = new ListDisplay();
	$display->show($books);
	echo '<br /">';


	//ファイルを閉じる
	$fileReader->close();
}


//趣味の書籍リストを読み込んで画面上に表示
$fileName = dirname(__FILE__).'/../_books/hobbyBooks.csv';
display($fileName);

//Java関連の書籍リストを読み込んで画面上に表示
$fileName = dirname(__FILE__).'/../_books/javaBooks.csv';
display($fileName);

//PHP関連の書籍リストを読み込んで画面上に表示
$fileName = dirname(__FILE__).'/../_books/phpBooks.json';
display($fileName);


?>
</body>
</html>

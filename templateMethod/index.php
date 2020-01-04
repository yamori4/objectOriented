<?php
require_once (dirname(__FILE__).'/tableDisplay.php');
require_once (dirname(__FILE__).'/listDisplay.php');
require_once (dirname(__FILE__).'/../_common/book.php');

?>
<html>
<head>
<title>Template Method</title>
</head>
<body>
<?php

session_start();

//ホームへのリンクを画面右上に表示する
echo '<div align="right"><a href="../index.php">ホームへ戻る</a></div>';


$books = array(
	new Book("100-1","嗚呼、デスマーチの日々よ","奥村大輔",2400,"9/25"),
	new Book("100-2","IT業界の多重下請け構造","平野直樹",1000,"5/3"),
	new Book("100-3","メテオフォール開発の手法","堀田哲也",980,"7/11"),
	new Book("100-4","目立たずに有給休暇を取る方法","横島 文代",1280,"1/13")
);	

for($i = 0; $i < 2; $i++){
	if($i == 0){
		//ループ１周目はTableDisplayのインスタンスを生成する
		$display = new TableDisplay();
	}elseif($i == 1){
		//ループ２目はListDisplayのインスタンスを生成する
		$display = new ListDisplay();
	}else{
		//Do Nothing
	}
	
	//$displayの中身がTableDisplayとListDisplayのどちらであっても
	//画面に表示するときのメソッドはshowです、
	//これがポリモーフィズムを利用した実装です。
	$display->show($books);
	echo '<hr>';

}

?>
</body>
</html>

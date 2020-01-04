<html>
<head>
<title>Composite</title>
</head>
<body>
<?php

require_once (dirname(__FILE__).'/composite.php');
require_once (dirname(__FILE__).'/leaf.php');
require_once (dirname(__FILE__).'/../_common/FileManager.php');

session_start();

//ホームへのリンクを画面右上に表示する
echo '<div align="right"><a href="../index.php">ホームへ戻る</a></div>';

//ツリー構造の幹部分を作成する。
$root = new Composite("■BOOKS");

//趣味のカテゴリを追加
$categoryHobby = new Composite("●HOBBY");
$root->add($categoryHobby);
//趣味のカテゴリに本情報を追加
foreach(FileManager::getBooks(dirname(__FILE__).'/../_books/hobbyBooks.csv') as $book){
	$categoryHobby->add(new Leaf($book->getName()));
}

//プログラミングのカテゴリを追加
$categoryPrograming = new Composite("●PROGRAMING");
$root->add($categoryPrograming);

//プログラミングのカテゴリにJavaのカテゴリを追加
$categoryJava = new Composite("●JAVA");
$categoryPrograming->add($categoryJava);
//JAVAのカテゴリにJAVA関連の本情報を追加
foreach(FileManager::getBooks(dirname(__FILE__).'/../_books/javaBooks.csv') as $book){
	$categoryJava->add(new Leaf($book->getName()));
}

//プログラミングのカテゴリにPHPのカテゴリを追加
$categoryPhp = new Composite("●PHP");
$categoryPrograming->add($categoryPhp);
//PHPのカテゴリにPHP関連の本情報を追加
foreach(FileManager::getBooks(dirname(__FILE__).'/../_books/phpBooks.json') as $book){
	$categoryPhp->add(new Leaf($book->getName()));
}

//ツリー構造を画面上に表示する。
$root->display(0);



<?php
require_once (dirname(__FILE__).'/../factoryMethod/factory.php');

/**
 * ファイルからの読み出しを扱うクラス。
 */
class FileManager {

	/*
	 * _booksの配下にある本のデータを全て取得する。
	 * @return array _booksの配下にある本の配列データ
	 */
	public function getAllBooks(){

		$dir = dirname(__FILE__).'/../_books/';
		$fileNames = glob(rtrim($dir, '/') . '/*'); /* _booksの配下にあるファイルの一覧*/
		$allBooks = array();
		foreach($fileNames as $fileName){
			$books = self::getBooks($fileName);
			$allBooks = array_merge($allBooks, $books);
		}
		return $allBooks;
	}
	
	/*
	 * 引数で指定したファイル内にある本のデータを取得する。
	 * @param String ファイル名
	 * @return array 本情報のリスト
	 */	
	public function getBooks($fileName){
		$books = array();
		$factory = new Factory(); //FactoryMethodを用いている
		$fileReader = $factory->create($fileName);
		$fileReader->open();
		foreach($fileReader->get() as $book){
			array_push($books, $book);
		}
		$fileReader->close();
		return $books;
	}
}

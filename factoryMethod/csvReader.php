<?php
require_once 'readerInterface.php';
require_once '../_common/book.php';

/**
 * CSVファイルの読み込みを行うクラス
 */
class CsvReader implements ReaderInterface {

	private $fileName; //読み込み対象のファイルの名前
	private $filePointer; //ファイルポインタ（簡単に言うとメモリーのどこに存在しているかの位置情報）

	/**
	 * コンストラクター
	 * @param string fileName 読み込み対象のファイルの名前
	 * @throws Exception
	 */
	public function __construct($fileName) {
		if (!is_readable($fileName)) {
			throw new Exception('file [' . $fileName . ']を開けません。');
		}
		$this->fileName = $fileName;
	}

	/**
	 * ファイルを開く
	 */
	public function open() {
		$this->filePointer = fopen($this->fileName, 'r');
	}

	/**	
	 * ファイルを読み込む
	 */
	public function get() {
		$books =array();

		// csvファイルの行を1行ずつ読み込んで連想配列に格納します
		while($line = fgetcsv($this->filePointer)){
			//各列を読み込み、Bookオブジェクトに変換します。
			$book = new Book($line[0], $line[1], $line[2], $line[3], $line[4]);
			array_push($books, $book);
		}
		return $books;
	}

	/**
	 * ファイルを閉じる
	 */
	public function close() {
		// csvファイルを閉じます。
		fclose($this->filePointer);
	}
}

<?php
require_once 'readerInterface.php';
require_once '../_common/book.php';

/**
 * JSONファイルの読み込みを行うクラス
 */
class JsonReader implements ReaderInterface {

	private $fileName; //読み込み対象のファイルの名前
	private $filePointer; //ファイルポインタ（簡単に言うとメモリーのどこに存在しているかの位置情報）

    /**
     * コンストラクター
     * @param string $fileName 読み込み対象のファイルの名前
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
		$json = file_get_contents($this->fileName, true);
		$this->filePointer = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    }

	/**	
	 * ファイルを読み込む
	 */
    public function get() {
		//連想配列にする
		$associativeArray = json_decode($this->filePointer, true);
		//return $associativeArray;
		
		//Bookオブジェクトの配列に変換する
		$books = array();
		foreach($associativeArray as $book){
			$book = new Book($book['code'], $book['name'], $book['author'], $book['price'], $book['release']);
			array_push($books, $book);
		}
		return $books;
    }

	/**
	 * ファイルを閉じる
	 */
    public function close() {
		//Do Nothing
    }

}
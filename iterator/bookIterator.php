<?php
require_once (dirname(__FILE__).'/../_common/book.php');

/**
 * IteratorAggregateインターフェイスの実装クラスであり、Bookクラスのイテレーターを扱う
 * IteratorAggregateは外部イテレータを作成するためのインターフェイスです。
 */
class BookIterator implements IteratorAggregate {

	private $books; //本の情報を格納するための配列

	/**
	 * コンストラクター
	 */
	public function __construct() {
		$this->books = new ArrayObject();
	}
	
	/**
	 * イテレーターに本情報を追加するメソッド
	 * @param Book $book 読み込み対象のファイルの名前
	 * @return Void
	 */
	public function add(Book $book) {
		$this->books[] = $book;
	}
	
	/**
	 * イテレーターを取得するメソッド
	 * @return ArrayIterator 本情報のイテレーター
	 */
	public function getIterator() {
		return $this->books->getIterator();
	}
}

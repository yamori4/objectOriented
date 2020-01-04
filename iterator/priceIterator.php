<?php
require_once (dirname(__FILE__).'/../_common/book.php');

/**
 * 1500円よりも高価な本のみを抽出するためのイテレータークラス
 * 抽象イテレーターであるFilterIteratorの実装クラス
 */
class Over1500YenIterator extends FilterIterator {

	/**
	 * コンストラクター
	 * @param Books $iterator 本情報のイテレーター
	 * @return Void
	 */
	public function __construct($iterator) {
		parent::__construct($iterator);
	}

	/**
	 * FilterIteratorクラスの抽象メソッドのacceptを実装したメソッド
	 * @return boolean 1500円より高価な場合:true /そうでない場合:false
	 */
	public function accept() {
		$book = $this->current();
		return ($book->getPrice() > 1500); //1500円より高価な本を抽出
	}
}


<?php
require_once('abstractDisplay.php');
require_once('../_common/book.php');


/**
 * リスト形式で本情報を表示する処理を扱うクラス
 */
class ListDisplay extends AbstractDisplay {

	/**
	 * 引数で指定された本情報をリスト形式に変換した後$bookInfoに格納する。
	 * @rpram array $books 本の情報を格納した配列
	 * @return Void
	 */
	public function setBookInfo(array $books){
		$bookInfo = '<ul>';
		foreach ($books as $book) {
			$bookInfo .= '<li>';
			$bookInfo .= self::CODE . " : " . $book->getCode() . ", ";
			$bookInfo .= self::NAME . " : " . $book->getName() . ", ";
			$bookInfo .= self::AUTHOR . " : " . $book->getAuthor() . ", ";
			$bookInfo .= self::PRICE . " : " . $book->getPrice() . "円, ";
			$bookInfo .= self::RELEASE . " : " . $book->getRelease(). "発売";
			$bookInfo .= '</li>';
		}
		$bookInfo .=  '</ul>';
		
		//親クラスの変数に格納する。
		$this->bookInfo = $bookInfo; //
	}
}


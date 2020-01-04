<?php
require_once('abstractDisplay.php');
require_once('../_common/book.php');

/**
 * テーブルに本情報を表示する処理を扱うクラス
 */
class TableDisplay extends AbstractDisplay {

	/**
	 * 引数で指定された本情報をテーブル形式に変換した後$bookInfoに格納する。
	 * @rpram array $books 本の情報を格納した配列
	 * @return Void
	 */
	protected function setBookInfo(array $books){
		$bookInfo = '<table border=1>';
		$bookInfo .= '<tr>';
			$bookInfo .= '<th>' . self::CODE . '</th>';
			$bookInfo .= '<th>' . self::NAME . '</th>';
			$bookInfo .= '<th>' . self::AUTHOR . '</th>';
			$bookInfo .= '<th>' . self::PRICE . '</th>';
			$bookInfo .= '<th>' . self::RELEASE . '</th>';
		$bookInfo .= '</tr>';
		foreach ($books as $book) {
			$bookInfo .= '<tr>';
			$bookInfo .= '<td>' . $book->getCode() . '</td>';
			$bookInfo .= '<td>' . $book->getName() . '</td>';
			$bookInfo .= '<td>' . $book->getAuthor() . '</td>';
			$bookInfo .= '<td>' . $book->getPrice() . '</td>';
			$bookInfo .= '<td>' . $book->getRelease() . '</td>';
			$bookInfo .= '</tr>';
		}
		$bookInfo .= '</table>';
		
		//親クラスの変数に格納する。
		$this->bookInfo = $bookInfo;
	}
}

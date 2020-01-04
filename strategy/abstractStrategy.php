<?php
require_once (dirname(__FILE__).'/../_common/Book.php');

/**
 * Strategy(戦略)を扱うための抽象クラス
 */
abstract class AbstractStrategy {

	/**
	 * 本についてのレコメンド文を取得するためのGetter
	 * @param Book $book 本についての情報
	 * @return レコメンド文
	 */
	public function getJudgment(Book $book) {
		return $this->judge($book);
	}

	/**
	 * 本についての情報を判別処理し、それに応じたレコメンド文を返す。
	 * @param Nook $book 本についての情報
	 * @return レコメンド文
	 */
	protected abstract function judge(Book $book);

}

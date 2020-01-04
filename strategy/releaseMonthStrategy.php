<?php
require_once (dirname(__FILE__).'/abstractStrategy.php');
require_once (dirname(__FILE__).'/../_common/Book.php');

/**
 * 現在の月が本の発売日に一致する場合は
 * 今月発売である旨をレコメンドとして提示するといったような
 * 販売戦略を扱うクラス。
 */
class releaseMonthStrategy extends AbstractStrategy {

	/**
	 * 本についての情報を判別処理し、それに応じたレコメンド文を返す。
	 * @param Book $book 本についての情報
	 * @return レコメンド文
	 */
	protected function judge(Book $book) {
		$releaseMonth = substr($book->getRelease(), 0, strpos($book->getRelease(), '/'));
		if ((int)$releaseMonth === (int)date('n')) {
			return '今月発売！<br />';
		} else {
			return "";
		}
		
	}
}


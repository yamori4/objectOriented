<?php
require_once (dirname(__FILE__).'/abstractStrategy.php');
require_once (dirname(__FILE__).'/../_common/Book.php');

/**
 * 本のタイトルに特定の文字を含む場合は、
 * それに関連するウェブページのリンクをレコメンドとして提示するといったような
 * 販売戦略を扱うクラス。
 */
class bookNameStrategy extends AbstractStrategy {

	/**
	 * 本についての情報を判別処理し、それに応じたレコメンド文を返す。
	 * @param Book $book 本についての情報
	 * @return レコメンド文
	 */
	protected function judge(Book $book) {
		$bookName = $book->getName();
		
		/*
		【備考】
		wikipediaはリンクフリーとのことです。
		https://ja.wikipedia.org/wiki/Wikipedia:%E9%80%A3%E7%B5%A1%E5%85%88/%E3%83%AA%E3%83%B3%E3%82%AF
		*/
		
		//本のタイトルに特定の文字を含む場合はURLリンク文字列を返す。
		if(strpos($bookName, 'PHP') !== false){
			return '<a href="https://ja.wikipedia.org/wiki/PHP">リンク</a>';
		}elseif(strpos($bookName, 'Java') !== false){
			return '<a href="https://ja.wikipedia.org/wiki/Java">リンク</a>';
		}elseif(strpos($bookName, 'デスマーチ') !== false){
			return '<a href="https://ja.wikipedia.org/wiki/%E3%83%87%E3%82%B9%E3%83%9E%E3%83%BC%E3%83%81">リンク</a>';
		}else{
			return "";
		}
	}
}


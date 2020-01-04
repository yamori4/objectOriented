<?php
require_once('../_common/book.php');

/**
 * ディスプレイを扱う抽象クラス
 */
abstract class AbstractDisplay {

	//定数を定義する。
	protected const CODE = "商品コード";
	protected const NAME = "タイトル";
	protected const AUTHOR = "著者名";
	protected const PRICE = "価格";
	protected const RELEASE = "発売日";

	//画面に表示する本情報の文字列
	protected $bookInfo;

	/**
	 * $bookInfoに値を設定するメソッドだが、
	 * 抽象メソッドであるため実装を子クラスでやる必要がある。
	 */
	abstract protected function setBookInfo(array $books);

	/**
	 * 画面上に本の情報を表示するメソッド
	 * @rpram array $books 本の情報を格納した配列
	 * @return Void
	 */
	public function show(array $books){
		//子クラスのsetBookInfoに引数を渡す。
		$this->setBookInfo($books);
		
		//画面上に文字列を表示する共通処理
		echo $this->bookInfo;
	}

}


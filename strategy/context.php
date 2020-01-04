<?php
require_once (dirname(__FILE__).'/../_common/Book.php');

/**
 * Contextに相当するクラス
 * Conxtexとは直訳すると「文脈」とか「環境」という意味ですが、
 * プログラムにおいては条件分岐時における判断材料とか前提条件とか背後関係とか
 * そのようなニュアンスになります。
 */
class Context {

	private $strategy;

	/**
	 * コンストラクタ
	 * @param AbstractStrategy $strategy 戦略のオブジェクト
	 */
	public function __construct(AbstractStrategy $strategy) {
	    $this->strategy = $strategy;
    }

	/**
	 * 販売戦略を実行するメソッド
	 * @param Book $arr 本についての情報が格納された配列
	 */
    public function execute(Book $book) {
        return $this->strategy->getJudgment($book);
    }

}
<?php
require_once('packInterface.php');

/**
 * 箱の包装の装飾を扱う抽象クラス
 */
abstract class AbstractPackDecorator implements PackInterface {

	//PackInterface型の変数、包装デザインを定義したオブジェクト
	private $pack;

	/**
	 * コンストラクター
	 * @param PackInterface $pack 包装デザインを定義したオブジェクト
	 */
	public function __construct(PackInterface $pack) {
		$this->pack = $pack;
	}

	/**
	 * 包装デザインを定義した配列を取得するためのゲッター
	 * @return array 包装デザインの定義
	 */
	public function getPack() {
		return $this->pack->getPack();
	}

	/**
	 * 包装デザインの定義を設定するためのセッター
	 * @param array $style 包装デザインの定義
	 * @return Void
	 */
	public function setPack(array $style) {
		$this->pack->setPack($style);
	}
}


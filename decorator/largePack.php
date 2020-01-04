<?php
require_once('abstractPackDecorator.php');

/**
 * 領域の大きさ変更する処理を扱うクラス
 */
class LargePack extends AbstractPackDecorator {

	/**
	 * インスタンスを生成します
	 * @param PackInterface $pack 包装デザインを定義したオブジェクト
	 */
	public function __construct(PackInterface $target) {
		parent::__construct($target);
	}

	/**
	 * 包装デザインの定義を取得するためのゲッター
	 * @return array 包装デザインの定義を格納した配列
	 */
	public function getPack() {
		//包装デザインの定義を格納した配列を取得する
		$style = parent::getPack();
		//領域を大きくするCSSを配列に追加する
		$style = array_merge($style, array('padding' => '120px'));
		return $style;
	}
}


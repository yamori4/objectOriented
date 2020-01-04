<?php
require_once('abstractPackDecorator.php');

/**
 * 背景色を水色に変更する処理を扱うクラス
 */
class CyanPack extends AbstractPackDecorator {

	/**
	 * コンストラクター
	 * @param PackInterface $pack 包装デザインを定義したオブジェクト
	 */
	public function __construct(PackInterface $pack) {
		parent::__construct($pack);
	}

	/**
	 * 包装デザインの定義を取得するためのゲッター
	 * @return array 包装デザインの定義を格納した配列
	 */
	public function getPack() {
		//包装デザインの定義を格納した配列を取得する
		$style = parent::getPack();
		//背景色を水色にするCSSを配列に追加する
		$style = array_merge($style, array('background-color' => '#87CEFA'));
		return $style;
	}
}


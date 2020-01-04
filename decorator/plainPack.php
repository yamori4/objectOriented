<?php
require_once('packInterface.php');

/**
 * 装飾前の包装デザインを表すクラスです
 */
class PlainPack implements PackInterface {

	//包装デザインの定義を保持する配列
	private $styleArr = array(); 

	/**
	 * 包装デザインの定義を取得するためのゲッター
	 * @return array 包装デザインの定義を保持する配列
	 */
	public function getPack() {
		return $this->styleArr;
	}

	/**
	 * 包装デザインの定義を設定するためのセッター
	 * @param array $style 包装デザインの定義を保持する配列
	 * @return Void
	 */
	public function setPack(array $style) {
		$this->styleArr = $style;
	}
}


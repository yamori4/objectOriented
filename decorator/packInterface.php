<?php

/**
 * 箱の包装についてのインターフェース
 */
interface PackInterface {

	/**
	 * 包装デザインの定義を取得するためのゲッター
	 */
	public function getPack();
	
	/**
	 * 包装デザインの定義を設定するためのセッター
	 */
	public function setPack(array $style);
}


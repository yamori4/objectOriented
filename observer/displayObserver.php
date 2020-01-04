<?php
require_once (dirname(__FILE__).'/observerInterface.php');

/**
 * 買い物かごの中身を監視し、画面上に買い物かごの中身を表示させる処理を扱うクラス
 */
class DisplayObserver implements ObserverInterface {

	/**
	 * 引数にて指定された対象を監視する。
	 * @param ShoppingBasket $basket 買い物かごのオブジェクト
	 */
	public function update(ShoppingBasket $basket) {
		var_export($basket->getItems()); //画面上に表示する。
	}
}

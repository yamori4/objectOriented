<?php

/**
 * Observerのインターフェイス
 */
interface ObserverInterface {
	/**
	 * オブサーバーを更新するメソッド
	 */
	public function update(ShoppingBasket $basket);
}


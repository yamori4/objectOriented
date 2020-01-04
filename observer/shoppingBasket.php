<?php

/**
 * 買い物かごを表現するクラス
 */
class ShoppingBasket {

	private $items; //買い物かごに入れられた商品のリスト
	private $observers; //オブザーバーオブジェクト

	/**
	 * コンストラクター
	 */
	public function __construct() {
		$this->items = array();
		$this->observers = array();
	}

	/**
	 * 買い物かごに商品を追加するメソッド
	 * @param Array $item 追加対象の商品
	 * @return Void
	 */
	public function addItem(array $item) {
		foreach($item as $key => $value){ //$keyが商品の名前で$valueが商品の価格
			$this->items[$key] = $value; //すでに存在する場合は上書きされる
		}
		$this->notify();
	}

	/**
	 * 買い物に入っている商品を削除するメソッド
	 * @param Array $item 削除対象の商品
	 * @return Void
	 */
	public function removeItem(array $item) {
		foreach($item as $key => $value){ //$keyが商品の名前で$valueが商品の価格
			if(array_key_exists($key, $this->items)){
				unset($this->items[$key]);
			}
		}
		$this->notify();
	}

	/**
	 * 買い物かごに入っている商品のリストを取得するゲッター
	 * @return 商品のリスト
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * 引数で指定した商品が買い物かごに入っているか調べるメソッド
	 * @param 調べる対象の商品
	 * @return 入っている場合:true / いない場合:false
	 */
	public function isStored($itemName) {
		return array_key_exists($itemName, $this->items);
	}

	/**
	 * Observerを登録するメソッド
	 * @param ObserverInterface $observer 追加対象のオブザーバー
	 * @return Void
	 */
	public function addObserver(ObserverInterface $observer) {
		$this->observers[get_class($observer)] = $observer;
	}

	/**
	 * Observerを削除するメソッド
	 * @param ObserverInterface $observer 削除対象のオブザーバー
	 * @return Void
	 */
	public function removeObserver(ObserverInterface $observer) {
		unset($this->observers[get_class($observer)]);
	}

	/**
	 * Observerへ買い物かごの状態を通知するメソッド
	 * @return Void
	 */
	private function notify() {
		foreach ($this->observers as $observer) {
			$observer->update($this); //オブザーバーに監視させる。
		}
    }
}
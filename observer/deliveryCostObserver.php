<?php
require_once (dirname(__FILE__).'/observerInterface.php');

/**
 * 買い物かごの中身を監視し、購入金額に基づいて配送料を課金するかどうかの処理を扱うクラス
 */
class DeliveryCostObserver implements ObserverInterface {

	public static $DELLIVERY_FEE = '配送料';

	/**
	 * 引数にて指定された対象を監視する。
	 * @param ShoppingBasket $basket 買い物かごのオブジェクト
	 */
	public function update(ShoppingBasket $basket) {
		if(count($basket->getItems()) == 0){
			return; //買い物かごに商品がない場合は終了する
		}

		if(count($basket->getItems()) == 1  && $basket->isStored(self::$DELLIVERY_FEE)) {
			$basket->removeItem(array(self::$DELLIVERY_FEE => (int)1000));
			returun; //買い物かごに配送料しかない場合に配送料を削除する
		}

		$sum = 0; //初期化;
		//配送料を含まない合計金額を算出する。
		foreach($basket->getItems() as $name => $price){
			if($name !== self::$DELLIVERY_FEE){
				$sum += (int)$price;
			}
		}
		

		//購入金額の合計値によって配送料をついかするかどうかを判定する。
		if($sum < 3000  && !$basket->isStored(self::$DELLIVERY_FEE)){
			//合計金額が3000円より少なく、なかつ配送料が加算されていなければ、配送料1000円を課金する。
			$basket->addItem(array(self::$DELLIVERY_FEE => (int)1000));
		}elseif($sum >= 3000 && $basket->isStored(self::$DELLIVERY_FEE)){
			//合計金額が3000円以上で、なかつ配送料が加算されていれば、配送料1000円を除外する。
			$basket->removeItem(array(self::$DELLIVERY_FEE => (int)1000));
		}else{
			//Do Nothing
		}
	}
}


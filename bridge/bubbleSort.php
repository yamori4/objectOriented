<?php
require_once(dirname(__FILE__).'/sortInterface.php');

/**
 * バブルソート処理を扱うクラス
 */
class BubbleSort implements SortInterface {

	/**
	 * バブルソートを実行するメソッド
	 */
	public function sort(array $arr) {
	/*
	【備考】
	  バブルソート…仕組みが簡単で理解しやすく、ソート対象が少ない場合は高速だが、
	    ソート対象が多い場合には処理に時間がかかってしまうアルゴリズム
	*/
		$num = count($arr) - 1;
		for ($i = 0; $i < $num; $i++) {
			for ($j = $num; $i < $j; $j--) {
				if ($arr[$j] < $arr[$j-1]) {
					list($arr[$j], $arr[$j-1]) = array($arr[$j-1], $arr[$j]);
				}
			}
		}
		return $arr;
	}

}

<?php
require_once(dirname(__FILE__).'/sorter.php');

/**
 * カウンティングソート処理を扱うクラス
 */
class CountingSort implements SortInterface {

	/**
	 * カウンティングソートを実行するメソッド
	 */
    public function sort(array $arr) {
		/*
		【備考】
		  カウンティングソート(分布数えソート)
		    …ソート対象が多い場合でも高速でソートできるアルゴリズムの1つ
		*/
		$num = count($arr);
		$min = $arr[0];
		$max = $arr[0];
		
		for ($i = 1; $i < $num; $i++) {
			if ($arr[$i] < $min) {
				$min = $arr[$i];
			} elseif ($max < $arr[$i]) {
				$max = $arr[$i];
			}
		}
		$scope = $max - $min + 1;
		$cnt = array();
		for ($i = 0; $i < $scope; $i++) {
			$cnt[$i] = 0;
		}
		
		for ($i = 0; $i < $num; $i++) {
			$cnt[$arr[$i] - $min]++;
		}
		
		$k = 0;
		for ($i = $min; $i <= $max; $i++) {
			for ($j = 0; $j < $cnt[$i-$min]; $j++) {
				$arr[$k++] = $i;
			}
		}
		return $arr;
    }

}

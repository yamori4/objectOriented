<?php
require_once(dirname(__FILE__).'/sorter.php');

/**
 * ソート処理に要する時間計測を扱うクラス
 */
class SortTimer extends Sorter{

	/**
	 * コンストラクター
	 * @param SortInterface $sorter ソート処理を実施するオブジェクト
	 */
	function __construct(SortInterface $sorter){
		parent::__construct($sorter);
	}
    
   	/**
	 * ソート処理に要した時間を計測するメソッド
	 * @param Array $arr ソート対象の配列
	 * @return Float ソート処理に要した時間(ミリ秒)
	 */
	public function measure(array $arr){
		$start = microtime(true);
		$this->sort($arr); //ソート処理を実施
		$end = microtime(true);
		$time = ($end - $start) * 1000; //ミリ秒単位に変換

		return $time;
    }
}


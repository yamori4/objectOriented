<?php
require_once(dirname(__FILE__).'/sortInterface.php');

/**
 * ソート処理を扱うクラス
 */
class Sorter{

    private $sorter; //ソート処理を実施するオブジェクト

	/**
	 * コンストラクター
	 * @param SortInterface $sorter ソート処理を実施するオブジェクト
	 */
	function __construct(SortInterface $sorter){
		$this->sorter = $sorter;
	}
    
   	/**
	 * ソート処理を実行するメソッド
	 * @param Array $arr ソート対象の配列
	 * @return Arrat ソート後の配列
	 */
	public function sort(array $arr){
		return $this->sorter->sort($arr);
	}
	
}


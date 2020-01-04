<?php
require_once(dirname(__FILE__).'/abstractComponent.php');

/**
 * Compositeクラス
 * 抽象クラスであるAbstractComponentを実装している。
 */
class Composite extends AbstractComponent {

	private $components; //ツリーを構成する要素

	/**
	 * コンストラクター
	 * @param String $componentName ツリーの構成要素名
	 */
	public function __construct($componentName) {
		parent::__construct($componentName);
		$this->components = array();
	}

	/**
	 * 子要素を追加するメソッド
	 * @param AbstractComponent $component ツリーを構成する要素
	 * @return Void
	 */
	public function add(AbstractComponent $component) {
		array_push($this->components, $component);
	}

	/**
	 * ツリー構造をを表示する
	 * カテゴリ名と、そのカテゴリに属している本の名前を表示
	 * @param Integer $nestDepth ツリー構造における階層の深さ
	 * @return Void
	 */
	public function display($nestDepth) {
		//カテゴリ要素を表示する
		parent::display($nestDepth);
		
		//本の要素を表示する。
		foreach ($this->components as $component) {
			$component->display($nestDepth + 1); //ネストが深くなると1段分加算される。
		}
	}
}


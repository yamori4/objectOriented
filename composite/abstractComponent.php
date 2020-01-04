<?php
/**
 * Componentに相当する抽象クラス
 */
abstract class AbstractComponent {

	private $name; //ツリーの構成要素名

	/**
	 * コンストラクター
	 * @param String $componentName ツリーの構成要素名
	 */
	public function __construct($componentName) {
		$this->componentName = $componentName;
	}

	public function getComponentName() {
		return $this->componentName;
	}

	/**
	 * 子要素を追加するメソッド
	 * @param AbstractComponent $component ツリーを構成する要素
	 */
	public abstract function add(AbstractComponent $component);

	/**
	 * 組織ツリーを表示するメソッド
	 * @param AbstractComponent $component ツリーを構成する要素
	 * @return Void
	 */
	public function display($nestDepth) {
		for($i=0; $i<$nestDepth; $i++){
			//ネスト構造を表現するために、画面端から数個分のインデントを表示する。
			echo('&nbsp;&nbsp;&nbsp;&nbsp;');
		}
		echo $this->componentName . "<br />\n";
	}	
}


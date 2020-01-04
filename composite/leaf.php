<?php
require_once(dirname(__FILE__).'/abstractComponent.php');

/**
 * Leafクラス
 * 抽象クラスであるAbstractComponentを実装している。
 */
class Leaf extends AbstractComponent {

	/**
	 * コンストラクター
	 * @param String $componentName ツリーの構成要素名
	 */
	public function __construct($componentName) {
		parent::__construct($componentName);
	}

	/**
	 * 子要素を追加するメソッド
	 * @param AbstractComponent $component ツリーを構成する要素
	 * @return Void
	 */
	public function add(AbstractComponent $component) {
		//Leafは子要素を持てないためエラーとしている。
		throw new Exception('許可されていない処理が実行されました。');
	}
}


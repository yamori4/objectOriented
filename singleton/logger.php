<?php

/**
 * ログ書き出しを扱うクラス、Singletonで構築している。
 * 【備考】Singletonは他のパターンと比べて理解しやすいですが、何かと批判が多いです。
 * 今回はサンプルということで使用していますが、実際は使い所が使い所が難しく、
 * 積極的に使うようなパターンではないと思います。
 */
class Logger {

	private $id; //インスタンスに割り振られるID番号
	private static $instance; //インスタンスを保持する変数

	/**
	 * コンストラクター
	 */
	private function __construct() {
		$this->id = rand ( 0 , 1000 ); //0から1000の間でランダムな番号をIDとして割り振る。
	}

	/**
	 * たった1つだけのインスタンスを取得するためのゲッター
	 * @return SingletonであるLoggeerクラスのインスタンス
	 */
	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new Logger();
			echo "<small>ロガーのインスタンスを生成しました</small>";
		}

		return self::$instance;
	}

	/**
	 * IDを取得するためのゲッター
	 * @return インスタンスに割り振られたID
	 */
	public function getID() {
		return $this->id;
	}

	/**
	 * このインスタンスの複製を許可しないようにする
	 * @throws Exception
	 */
	public final function __clone() {
		throw new Exception ("インスタンスの複製は禁止されています。");
	}
	
	/**
	 * ログをファイルに書き出す。
	 * @param 書き込み対象の文字列
	 * @return Void
	 */
	public function write($message) {
		file_put_contents(
			dirname(__FILE__).'/log/'.date("md").'_log.txt', //出力先のファイル
			'【'.date("H:i:s")."】\r\n". $message . "\r\n", //出力する内容
			FILE_APPEND //上書きでなくファイルに追記する処理を指定します
		); 
	}
}

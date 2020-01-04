<?php
/**
 * ファイル読み込み機能のインターフェース
 */
interface ReaderInterface {

	/**
	 * ファイルを開く
	 */
	public function open();
	
	/**	
	 * ファイルを読み込む
	 */
	public function get();
	
	/**
	 * ファイルを閉じる
	 */
	public function close();

}

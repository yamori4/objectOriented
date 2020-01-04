<?php
require_once 'readerInterface.php';
require_once 'csvReader.php';
require_once 'jsonReader.php';


/**
 * ファイル読み込みを行うReaderクラスのインスタンス生成を行うクラス
 * これすなわち工場に相当するクラス
 */
class Factory {

    /**
     * ファイル読み込みを行うReaderクラスのインスタンスを生成する
     * @param string fileName 読み込み対象のファイルの名前
     */
	public function create($fileName) {

		//ファイル名のうち拡張子の部分の文字列を抽出する。
		$extension = pathinfo($fileName, PATHINFO_EXTENSION);

		//拡張子の種類によって生成するインスタンスを切り替える。
		switch ($extension){
			case "csv":
				return new CsvReader($fileName);
			case "json":
				return new JsonReader($fileName);
			default:
				die("エラー：未対応のファイル形式です。");
		}
	}

}


<?php

/**
 * 本のオブジェクト
 */
class Book {

	private $code; //商品コード
	private $name; //タイトル
	private $author; //著者名
	private $price; //価格
	private $release; //発売日
	
	
	/**
	 * コンストラクター
	 * @param String $code 商品コード
	 * @param String $name タイトル
	 * @param String $author 著者名
	 * @param Integer $price 価格
	 * @param String $release 発売日
	 */
	public function __construct($code, $name, $author, $price, $release){
		$this->code = $code;
		$this->name = $name;
		$this->author = $author;
		$this->price = $price;
		$this->release = $release;
	}

	
	//ゲッター
	public function getCode(){
		return $this->code;
	}
	public function getName(){
		return $this->name;
	}
	public function getAuthor(){
		return $this->author;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getRelease(){
		return $this->release;
	}

	//セッター
	public function setCode($code){
		$this->code = $code;
	}
	public function setName($name){
		$this->name = $name;
	}
	public function setAuthor($author){
		$this->author = $author;
	}
	public function setPrice($price){
		$this->price = $price;
	}
	public function setRelease($release){
		$this->release = $release;
	}
}

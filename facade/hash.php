<?php

/**
 * ハッシュ処理を扱うクラス
 */
class Hash{

	public static function getHashedPass($pass){
		return $hashedPass=md5($pass);
	}

}
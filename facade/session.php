<?php

/**
 * セッションを扱うクラス
 */
class Session{

	public static function upLoginFlag(){
		session_start();
		$_SESSION['loginFlag'] = true;
	}

}
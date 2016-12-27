<?php

/**
* Created by Reza Khalafi on 2016.  
* Copyright © 2016 Reza Khalafi. All rights reserved.
*/
class laravelCrypt 
{


	function __construct()
	{

	}

	public function enc($text,$key)
	{

		$key = (string)base64_decode($key);
		$iv = random_bytes(16);
		$value = \openssl_encrypt(serialize($text), 'AES-256-CBC', $key, 0, $iv);  
		$bIv = base64_encode($iv);
		$mac = hash_hmac('sha256', $bIv.$value, $key); 
		$c_arr = ['iv'=>$bIv,'value'=>$value,'mac'=>$mac];
		$json = json_encode($c_arr);
		$crypted = base64_encode($json);
		
		return $crypted; 
	}
}

?>




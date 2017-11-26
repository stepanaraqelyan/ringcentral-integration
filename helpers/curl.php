<?php

class Request {

	public static function get($url) {
		return self::req($url);
	}

	public static function post($url, $body = []) {
		return self::req($url, 'POST', $body);
	}

	public static function req($url = '', $method = 'GET', $vars = []) {
		global $cnf;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $cnf['rc']['api_url'] . $url);

		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $cnf['rc']['access_token']
		]);

		if($method == 'POST') {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$res = curl_exec($ch);

		curl_close($ch);

		return json_decode($res);
	}

}
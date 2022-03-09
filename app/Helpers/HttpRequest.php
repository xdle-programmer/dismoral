<?php

namespace App\Helpers;

class HttpRequest
{
    static function simpleGet($url, array $params = [])
    {
        try {
            $response = file_get_contents($url .
                (count($params) > 0 ? '?' . http_build_query($params) : ''));
        }
        catch(\Exception $ex)
        {
            file_put_contents(base_path() . '/http_error.log',
                $ex->getMessage(), FILE_APPEND);
            throw $ex;
        }

        return json_decode($response, true);
    }

	static function get($url, array $params = [], array $headers = [])
	{
		$options = [
			'http' => [
				'method' => "GET",
				'header' => implode("\r\n", $headers),
				//'cookies' => $headers[0]
			]
		];

		//var_dump(http_build_query($params));

		$context = stream_context_create($options);

        try {
            $response = file_get_contents($url .
            	(count($params) > 0 ? '?' . http_build_query($params): ''), false, $context);
        }
		catch(\Exception $ex)
		{
			file_put_contents(base_path() . '/http_error.log',
				$ex->getMessage(), FILE_APPEND);
			throw $ex;
		}

		return json_decode($response, true);
	}

	static function nget($url, array $params = [], array $headers = [])
	{
		$url = $url . (count($params) > 0 ? '?' . http_build_query($params) : '');
		$ch = \curl_init();
		\curl_setopt($ch, CURLOPT_URL, $url);
		//\curl_setopt($ch, CURLOPT_COOKIE, $headers[0]);
		\curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		\curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        //\curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //\curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$query = json_decode(\curl_exec($ch), true);
		//$query = \curl_exec($ch);
		curl_close($ch);

		return $query;
	}

	static function post($url, array $params, array $headers = [])
	{
		$ch = \curl_init();
		\curl_setopt($ch, CURLOPT_URL, $url);
        \curl_setopt($ch, CURLOPT_POST, 1);
		\curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
		\curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = \curl_exec($ch);
		$response = json_decode($response, true);

		\curl_close($ch);

		return $response;
	}

	static function queryPost($url, $data, $needBuildQuery = true)
	{
		if ($needBuildQuery)
			$data = http_build_query($data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}

	static function jsonPost($url, array $params, array $headers, $returnCookie = false)
	{
		$params = json_encode($params);

		$ch = \curl_init();
		\curl_setopt($ch, CURLOPT_URL, $url);
        \curl_setopt($ch, CURLOPT_POST, 1);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		\curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		\curl_setopt($ch, CURLOPT_HEADER,  1);
		\curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($headers, [
			'Content-Type:application/json',
			'Content-Length: ' . strlen($params)
		]));
		$response = \curl_exec($ch);
		$result = json_decode(
			substr($response, strpos($response, '{')), true);

        if ($returnCookie) {
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi',
				$response, $cookies);

			$t = $result;
			$result = [];
			$result['response'] = $t;
			$result['cookie'] = [];
            foreach ($cookies[1] as $item) {
				parse_str($item, $cookie);
                $result['cookie'] = $cookie;
            }
		}
		\curl_close($ch);

		return $result;
	}

	static function jpost($url, array $params, $returnCookie = false)
	{
		$params = json_encode($params);

		$ch = \curl_init();
		\curl_setopt($ch, CURLOPT_URL, $url);
        \curl_setopt($ch, CURLOPT_POST, 1);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		\curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		\curl_setopt($ch, CURLOPT_HEADER,  1);
		\curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type:application/json',
			'Content-Length: ' . strlen($params)
		]);
		$response = \curl_exec($ch);
		$result = json_decode(
			substr($response, strpos($response, '{')), true);

        if ($returnCookie) {
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi',
				$response, $cookies);

			$t = $result;
			$result = [];
			$result['response'] = $t;
			$result['cookie'] = [];
            foreach ($cookies[1] as $item) {
				parse_str($item, $cookie);
                $result['cookie'] = $cookie;
            }
		}
		\curl_close($ch);

		return $result;
	}
}

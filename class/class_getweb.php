<?php
class GWEB_CURL {
	var $url = "";
	var $encode = "utf-8";
	public function get_web($url, $encode) {
		// echo $url;
		$this->url = $url;
		$this->encode = $encode;
		if ($url = "") {
			return false;
		}
		if ($encode = "" | $encode != "utf-8" | $encode != "gbk" | $encode != "gb2312" | $encode != "GBK" | $encode != "GB2312") {
			$this->encode = "utf-8";
		}
		$ch = curl_init ();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
		//$data = curl_exec($curl);
		// ՚ѨҪԃ»§¼쳢µō�ѨҪն¼ԏÃ災ѐ
		// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		// curl_setopt($ch, CURLOPT_USERPWD, US_NAME.":".US_PWD);
		$contents = curl_exec ( $ch );
		curl_close ( $ch );
		$content = substr ( $contents, 0, 500 );
		preg_match ( "/charset=(.*)>/", $content, $charset );
		$charset = str_replace ( "\"", "", $charset [1] );
		$charset = str_replace ( ",", "", $charset );
		$charset = str_replace ( "/", "", $charset );
		$charset = str_replace ( " ", "", $charset );
		$charset = str_replace ( ">", "", $charset );
		//return $charset;
		$contents = iconv ( $charset, $this->encode, $contents );
		// return $contents;
		echo $contents;
	}
}

?>
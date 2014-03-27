<?php
class COPYDIR{
/**
* 复制文件夹 
	eg:将D:/wwwroot/下面wordpress复制到
	D:/wwwroot/www/explorer/0000/del/1/
	末尾都不需要加斜杠，复制到地址如果不加源文件夹名，
	就会将wordpress下面文件复制到D:/wwwroot/www/explorer/0000/del/1/下面
* $from = 'D:/wwwroot/wordpress';
* $to = 'D:/wwwroot/www/explorer/0000/del/1/wordpress';
* 
* @link http://yige.org/php/
*/

function copy_dir($source, $dest){
	$result = false;
	if (is_file($source)) {
		if ($dest[strlen($dest)-1] == '/') {
			$__dest = $dest . "/" . basename($source);
		} else {
			$__dest = $dest;
		}
		$result = @copy($source, $__dest);
		//echo iconv( $config['app_charset'],$config['system_charset'], $source);
		@chmod($__dest, 0755);
	}elseif (is_dir($source)) {
		if ($dest[strlen($dest)-1] == '/') {
			$dest = $dest . basename($source);
			@mkdir($dest);
			@chmod($dest, 0755);
		} else {
			@mkdir($dest, 0755);
			@chmod($dest, 0755);
		}
		$dirHandle = opendir($source);
		while ($file = readdir($dirHandle)) {
			if ($file != "." && $file != "..") {
				if (!is_dir($source . "/" . $file)) {
					$__dest = $dest . "/" . $file;
				} else {
					$__dest = $dest . "/" . $file;
				}
				$result = self::copy_dir($source . "/" . $file, $__dest);
			}
		}
		closedir($dirHandle);
	} else {
		$result = false;
	}
	return $result;
}
}
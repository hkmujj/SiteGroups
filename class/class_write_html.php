<?php
class WHTML{
		var $content = "";
		var $file = "";
		var $cha = "GB2312";
		function write($content,$file,$cha)	
		{
			if($content == "" | $file == ""){
				return false;	
			}	
			$file = str_replace("\\","/",$file);
			//$file = $file."/";
			$file = str_replace("//","/",$file);
			$this->content = $content;
			$this->file = $file;
			$this->content = iconv($cha,$this->cha,$this->content);
			if(! $fileo = fopen($this->file,'a')){
				return false;	
			}
			//echo $this->file;
			fwrite($fileo,$this->content);
			fclose($fileo);
			return true;
		}	
	
}



?>
<?php
  class MDB{
  private $link_id;
	function condb($host,$user,$passwd,$dbname){
		$this->link_id=mysql_connect($host,$user,$passwd);
		if(!$this->link_id)
		  $this->error_tip("数据库链接失败:");
		if(!mysql_select_db($dbname,$this->link_id)){
		  $this->error_tip("数据库不存在:");
		}
	     mysql_query("set names 'gb2312'",$this->link_id);
	}
  
  //insert $data_array=array('字段1'=>'值1','字段2'=>'值2')
	public function insert($table,$data_array){
	$field="";
	$value="";
	if(!is_array($data_array)||count($data_array)<=0){
	$this->error_tip("没有要添加的数据");
	return false;
	}
	while(list($key,$val)=each($data_array)){
	$field.="$key,";
	$value.="'$val',";
	}
	$field=substr($field,0,-1);
	$value=substr($value,0,-1);
	$sql="insert into $table ($field) values ($value)";
	if(!$this->query($sql))
	return false;
	return true;
	}
	//update
	public function update($table,$data_array,$condition=""){
	if(!is_array($data_array)||count($data_array)<=0){
	$this->error_tip("没有要更新的数据");
	return false;
	}
	$value="";
	while(list($key,$val)=each($data_array)){
	$value.="$key='$val',";
	}
	$value=substr($value,0,-1);
	$sql="update $table set $value $condition";
	if(!$this->query($sql))
	return false;
	return true;
	}
	  public function error_tip($tip){
	$tip.="\r\n".mysql_error();
	die($tip);
	}
  
	  //释放结果集
	public function free_result(){
	$void=func_get_args();
	foreach($void as $query){
	if(is_resource($query)&&get_resource_type($query)=='mysql_result')
	return mysql_free_result($query);
	}
	}
	//关闭数据库链接
	public function close(){
	return mysql_close($this->link_id);
	}
	//析构函数
	public function __destruct(){
	$this->free_result();
	$this->close();
	}
	  
	  
	 }

?>
<?php
error_reporting(0);
class DB {
private $link_id;
//构造函数,加载类时自动执行函数
public function __construct(){
require('../config/config_db.php');
$this->connect($hostname,$username,$password,$database,$charset);
}
//数据库链接，选择数据库，设置数据库编码
public function connect($hostname,$username,$password,$database,$charset){
$this->link_id=mysql_connect($hostname,$username,$password);
if(!$this->link_id)
$this->error_tip("数据库链接失败:");
if(!mysql_select_db($database,$this->link_id)){
mysql_query("create DATABASE $database CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'",$this->link_id);
mysql_select_db($database,$this->link_id);
}
mysql_query("set names 'utf8'",$this->link_id);
}
//数据库查询
public function query($sql){
$query=mysql_query($sql,$this->link_id);
if(!$query)
$this->error_tip("查询失败：".$sql);
return $query;
}
//返回所有记录$result
public function get_all($sql,$result_type=MYSQL_ASSOC){
$query=$this->query($sql);
$result=array();
if($query){
$i=0;
$result=array();
while($row=mysql_fetch_array($query)){
$result[$i]=$row;
$i++;
}
}
return $result;
}

//获取一条记录（MYSQL_ASSOC，MYSQL_NUM，MYSQL_BOTH）              
public function get_one($sql,$result_type = MYSQL_ASSOC) {
$query = $this->query($sql);
$rt =mysql_fetch_array($query,$result_type);
return $rt;
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
//delete 删除条件$condition=条件1 and 条件2
public function delete($table,$condition=""){
if(empty($condition)){
$this->error_tip("没有删除条件");
return false;
}
$sql="delete from $table $condition";
if(!$this->query($sql))
return false;
return true;
}
//获取记录条数
public function num_rows($sql){
$result=$this->query($sql);
if(!is_bool($result)){
$num=mysql_num_rows($result);
return $num;
}
else
return 0;
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
//错误提示
public function error_tip($tip){
$tip.="\r\n".mysql_error();
//die($tip);
}
}
?>
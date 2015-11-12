<?php
/*
*mysql执行类
*by xtz
*/
class MysqlAction{
	private $dbCon='';
	private $mysql_server_name="localhost"; 
	private $mysql_username="root"; 
    private $mysql_password="";
   //private $mysql_database=""; 
	private $sqlResult;
	public function __construct($mysql_server_name,$mysql_username,$mysql_password){
		$this->mysql_server_name=$mysql_server_name;
		$this->mysql_username=$mysql_username;
		$this->mysql_password=$mysql_password;
	}
	
	public function con(){
		if(!$this->dbCon){
			$this->dbCon=mysql_connect($this->mysql_server_name, $this->mysql_username, $this->mysql_password);
		}
		return $this->dbCon;
	}
	
	#
	#选择数据库
	#
	public function database($mysql_database){
		mysql_select_db($mysql_database, $this->dbCon);  
	}
	
	#
	#执行数据库语句
	#
	public function query($sql){
		$sqlResult = mysql_query($sql);  
		if($sqlResult){
			$count=mysql_fetch_row($sqlResult);
			if(is_array($count)){
				$row=mysql_fetch_array($sqlResult,MYSQL_ASSOC);
				return $row;
			}else{
				return 'success';
			}
		}else{
			return 'sql错误';
		}
	}
	
	function __destruct(){
		mysql_close($this->dbCon); 
	}
	
	function __call($function_name, $args){
		echo "你所调用的函数：$function_name(参数：<br />";
		var_dump($args);
		echo ")不存在！";
	}
	
	
}



?>
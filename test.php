<?php
/*
作用:使用数据库的测试文件
Author:xtz
date:2015-11-13
*/
require_once('mysqlService.php');
require_once('dbconfig.php');
	class IndexC(){
		public $db;
		public function __construct(){
			
		}
		#******************************
		# 函数：Init_Data($dbNum,$dbname)
		# 功能：过滤并获取推荐会员信息
		# 参数：$dbNum，数据库ID
		# 　　　$dbname，数据库名称
		# 返回：return: $db;
		#******************************
		public function Init_Data($dbNum,$dbname){
			$db=new MysqlAction($DbConfig[$dbNum]['host'],$DbConfig[$dbNum]['username'],$DbConfig[$dbNum]['psd']);
			$db->con();
			$db->database($dbname);
			$db->query("set names 'utf8'");//写库 
			return $db;
		}
		
		public testA(){
			$db1=$this->Init_Data(1,'firstDb');
			$sql='select * from ...';
			$data=$db1->query($sql);
		}
		
		
		
		
	}
?>

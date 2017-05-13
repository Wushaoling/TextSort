<?php
	$s_name = $_POST["s_name"];
	$s_id = $_POST["s_id"];
	
	if (inject_check($s_name)==1 or inject_check(file_get_contents("php://input"))==1){
		return;
	}
	if (inject_check($s_id)==1 or inject_check(file_get_contents("php://input"))==1){
		return;
	}
	
	if(null == $s_name || null == $s_id){
		echo "信息输入有误，请重试";
		return;
	}
	
	$link = connectDatabase();
	if(null != $link){
		$sql = "select * from t_token where id = '{$s_id}' and mname = '{$s_name}'";
		$result = mysql_query($sql, $link);
		$row = mysql_fetch_row($result);
		if(null == $row[0]){//id不存在
			echo "用户不存在或信息输入有误，请检查后重试";
		}else{
			$count = $row[5] + 1;
			mysql_query("update t_token set count = {$count} where id = '{$s_id}'", $link);
			echo "姓名：".$row[1]."<br>学号：".$row[0]."<br>token : ".$row[4];
		}
	}else{
		echo "ERROR";
	}
	
	function inject_check($sql_str) {
		return eregi('select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
	}
	
	function connectDatabase(){
		$link = mysql_connect("", "", "");
		mysql_select_db("");
		mysql_query('set names utf8');
		return $link;
	}
?>
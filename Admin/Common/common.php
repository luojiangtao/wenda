<?php
	function p($arr){
		echo("<pre>");
		print_r($arr);
		echo("</pre>");
	}
	//递归重新排序分类
	function resortCategory($arr,$pid=0,$level=0){
		$array=array();
		//echo "111";
		foreach ($arr as $key => $value) {
			if($value['pid'] == $pid){
				$value['html']=str_repeat('|-', $level);
				$value['level']=$level;
				$array[]=$value;
				$array=array_merge($array,resortCategory($arr,$value['id'],$level+1));
			}
		}
		return $array;
	}

	function getChildCategoryById($arr,$pid){
		$array=array();
		$array[]=$pid;
		foreach ($arr as $key => $value) {
			if($value['pid'] == $pid){
				$array[]=$value['id'];
				$array=array_merge($array,getChildCategoryById($arr,$value['id']));
			}
		}
		return $array;
	}
?>
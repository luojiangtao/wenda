<?php
	function p($arr){
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}

	//将数组转化为一维数组
	function one_layer_array($arr,$k){
		$array=array();
		if($arr){
			foreach ($arr as $key => $value) {
				$array[]=$value[$k];
			}
		}
		return $array;
	}
?>
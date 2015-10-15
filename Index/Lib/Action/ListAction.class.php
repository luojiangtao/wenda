<?php
	class ListAction extends Action{
		public function index(){
			$id=$this->_get('id');
			//echo $id;
			$where=array('pid'=>$id);
			$category_list=M('category')->where($where)->select();

			if(!$category_list){
				$where=array('id'=>$id);
				$pid=M('category')->where(array(''));
				$category_list=M('category')->where($where)->select();
			}

			$this->category_list=$category_list;
			$this->display();
		}
	}
?>
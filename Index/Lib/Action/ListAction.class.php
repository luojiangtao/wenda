<?php
	class ListAction extends Action{
		public function index(){
			$id=$this->_get('id');
			//echo $id;
			$where=array('pid'=>$id);
			$category_list=M('category')->where($where)->select();
			$category_id=M('category')->where($where)->select();
			if(!$category_list){
				$pid=M('category')->where(array('id'=>$id))->getField('pid');
				$where=array('pid'=>$pid);
				$category_list=M('category')->where($where)->select();
				//$category_id=M('category')->where($where)->select();
				$category_id[]=$id;


				if(!$category_list){
					$where=array('pid'=>0);
					$category_list=M('category')->where($where)->select();
					$category_id[]=0;
				}
			}
			$db=M('ask');
			$category_id=one_layer_array($category_id,'id');
			$category_id[]=$id;
			//p($category_id);
			$ask_unsolve=$db->where(array('cid'=>array('IN',$category_id),'solve'=>0))->limit(20)->select();
			$ask_solve=$db->where(array('cid'=>array('IN',$category_id),'solve'=>1))->limit(20)->select();
			$ask_high_reward=$db->where(array('cid'=>array('IN',$category_id),'rewoad'=>array('GT',0)))->limit(20)->select();
			$ask_zero_answer=$db->where(array('cid'=>array('IN',$category_id),'answer'=>0))->limit(20)->select();
			//p($ask_unsolve);

			$this->category_list=$category_list;
			$this->ask_unsolve=$ask_unsolve;
			$this->ask_solve=$ask_solve;
			$this->ask_high_reward=$ask_high_reward;
			$this->ask_zero_answer=$ask_zero_answer;
			$this->display();
		}
	}
?>
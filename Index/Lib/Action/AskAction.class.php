<?php
	class AskAction extends CommonAction{
		public function index(){
			$category=M('category')->where(array('pid'=>0))->select();

			$this->category=$category;
			$this->display();
		}
		//根据传过来的id异步获取分类子分类
		public function getCategoryChild(){
			$id=$this->_post('id');

			$childCategory=M('category')->where(array('pid'=>$id))->select();
			if($childCategory){
				echo json_encode($childCategory);
			}else{
				echo 0;
			}
		}

		public function runAddAsk(){
			$ask=$_POST;
			$ask['time']=time();
			$ask['uid']=session('uid');
			p($ask);
			if(M('ask')->add($ask)){
				M('user')->where(array('id'=>session('uid')))->setInc('ask');
				M('user')->where(array('id'=>session('uid')))->setInc('exp',C('LV_ASK'));
				$this->success('提问成功');
			}else{
				$this->error('提问失败');
			}

		}
	}
?>
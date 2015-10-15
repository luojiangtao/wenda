<?php
	class MemberAction extends CommonAction{
		public function index(){
			//p($_GET);
			$uid=$this->_get('uid');
			$where=array('id'=>$uid);
			$user=M('user')->where($where)->find();

			$ask=D('AskView')->where(array('uid'=>$uid))->order('time DESC')->limit(10)->select();
			//p($ask);die;

			$this->user=$user;
			$this->ask=$ask;
			$this->display();
		}
	}
?>
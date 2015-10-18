<?php
	class ShowAction extends CommonAction{
		public function index(){
			$id=$this->_get('id');

			$where=array('id'=>$id);

			$ask=D('AskUserView')->where($where)->find();
			$ask=D('AskUserView')->find();
			//$ask=D('ask')->where($where)->find();
			$answer=D('AnswerUserView')->where(array('aid'=>$id))->select();

			p($ask);
			$this->ask=$ask;
			$this->answer=$answer;
			$this->show();
		}
	}
?>
<?php
	class MemberAction extends CommonAction{
		public function index(){
			//p($_GET);
			$uid=$this->_get('uid');
			$where=array('id'=>$uid);
			$user=M('user')->where($where)->find();

			$ask=D('AskView')->where(array('uid'=>$uid))->order('time DESC')->limit(10)->select();
			//p($ask);die;
			$my_answer_id=M('answer')->where(array('uid'=>$_SESSION['uid']))->select();
			$my_answer_id=one_layer_array($my_answer_id,'aid');
			$my_answer=D('AskView')->where(array('id'=>array('IN',$my_answer_id)))->limit(20)->select();

			//p($my_answer);
			$this->user=$user;
			$this->ask=$ask;
			$this->my_answer=$my_answer;
			$this->display();
		}
	}
?>
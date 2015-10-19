<?php
	class ShowAction extends CommonAction{
		public function index(){
			$id=$this->_get('id');

			$where=array('id'=>$id);

			$ask=D('AskUserView')->where($where)->find();
			//$ask=D('AskUserView')->find();
			//$ask=D('ask')->where($where)->find();
			$answer=D('AnswerUserView')->where(array('aid'=>$id,'adopt'=>0))->select();
			//$answer=D('AnswerUserView')->select();

			$answer_adopt=D('AnswerUserView')->where(array('aid'=>$id,'adopt'=>1))->find();
			//p($answer);
			$this->ask=$ask;
			$this->answer=$answer;
			$this->answer_adopt=$answer_adopt;
			$this->show();
		}

		public function runAddAnswer(){
			$answer=array(
				'content'=>$this->_post('content'),
				'time'=>time(),
				'aid'=>$this->_post('aid'),
				'uid'=>session('uid'),
				);
			//p($answer);
			if(M('answer')->add($answer)){
				$this->success('回答成功');
			}else{
				$this->error('回答失败，请重试。。。');
			}
		}
		//回答采纳
		public function adopt(){
			$id=$this->_get('id');
			$aid=$this->_get('aid');
			$uid=$this->_get('uid');
			$answer=array(
				'id'=>$id,
				'adopt'=>1,
				);

			if(M('answer')->save($answer)){
				M('ask')->where(array('id'=>$aid))->setInc('solve');
				M('user')->where(array('id'=>session('uid')))->setInc('adopt');

				M('user')->where(array('id'=>$uid))->setInc('exp',C('LV_ADOPT'));
				$this->success('采纳成功');
			}else{
				$this->error('采纳失败');
			}
		}
	}
?>
<?php
	class LoginAction extends Action{

		public function index(){
			$this->display();
		}

		public function checkAccount(){
			$account=$this->_post('account');
			$password=$this->_post('password','md5');

			$result=M('admin')->where(array('account'=>$account))->find();
			//p($result);die;

			if($result['password'] == $password){
				session('account',$result['account']);
				//p(session('account'));die;
				$this->success('login success',U('Index/index'));
			}else{
				$this->error('login fails');
			}
		}
	}
?>
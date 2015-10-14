<?php
	class CommonAction extends Action{
		public function _initialize(){
			if(!C('WEB_STATE')){
				halt('维护中...');
				die;
			}
		}

		public function register(){
			if(M('user')->add($_POST)){
				$this->success('注册成功');
			}else{
				$this->error('注册失败');
			}
		}

		public function login(){
			$account=$this->_post('account');
			$password=$this->_post('password');
			$user=M('user')->where(array('account'=>$account))->find();
			//p($user);die;
			if($user && $user['password'] == $password){
				session('uid',$user['id']);
				session('username',$user['username']);
				//p($_SESSION);die;
				$this->success('登录成功');

			}else{
				$this->error('帐号或密码错误');
			}
		}

		public function logout(){
			session_destroy();
			session_unset();
			redirect(__APP__);
		}
	}
?>
<?php
	//公共方法
	Class CommonAction extends Action{

		public function _initialize(){
			if(!isset($_SESSION['account'])){
				$this->redirect('Login/index');
			}
		}
	}
?>
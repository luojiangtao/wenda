<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
    	$ask_unsolve=M('ask')->limit('10')->where(array('solve'=>0))->select();
    	$ask_high_reward=M('ask')->limit('10')->where(array('solve'=>0))->order('reward DESC')->select();

    	$this->ask_unsolve=$ask_unsolve;
    	$this->ask_high_reward=$ask_high_reward;
		$this->display();
	}
}
<?php
	class RewardAction extends CommonAction{
		public function index(){
			$this->display();
		}

		public function editConfig(){
			$file = './Conf/config.php';
			$config = array_merge(include $file, $_POST);
			//p($config);die;
			$str = "<?php\r\nreturn ". var_export($config,true).";\r\n?>";
			//echo $str;die;
			if(file_put_contents($file,$str)){
				$this->success('修改成功',$_SERVER['HTTP_REFERER']);
			}else{
				$this->error('修改失败');
			}
		}
	}
?>
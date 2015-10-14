<?php
$arr = array(
	//'配置项'=>'配置值'
	/*'DB_HOST'=>'localhost',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_NAME'=>'wenda',
	'DB_PREFIX'=>'hd_',
	'ANSWER'=>'1',
	'ADOPT'=>'1',
	'DEL_ANSWER'=>'1',
	'DEL_ASK'=>'2',
	'DEL_ADOPT_ASK'=>'3',
	'DEL_ADOPT_ANSWER'=>'3',*/
);

return array_merge(include './Conf/config.php',$arr);
?>
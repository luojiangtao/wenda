<?php
	class AskViewModel extends ViewModel{
		Protected $viewFields=array(
			'ask'=>array(
				'id',
				'content',
				'time',
				'answer',
				'reward',
				'_type'=>'LEFT'
				),
			'category'=>array(
				'name',
				'_on'=>'ask.cid = category.id'
				),
			);
	}
?>
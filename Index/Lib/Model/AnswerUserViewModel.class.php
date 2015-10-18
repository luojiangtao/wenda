
<?php
	class AnswerUserViewModel extends ViewModel{
		Protected $viewField=array(
			'ask'=>array(
				'id'=>'ask_id',
				'content',
				'reward',
				'solve',
				'time',
				'answer',
				'_type'=>'LEFT'
				),
			'user'=>array(
				'id'=>'user_id',
				'username',
				'face',
				'answer',
				'adopt',
				'ask',
				'point',
				'exp',
				'_on'=>'user.user_id=ask.uid'
				)
			);
	}
?>
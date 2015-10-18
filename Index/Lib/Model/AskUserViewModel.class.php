
<?php
	class AskUserViewModel extends ViewModel{
		Protected $viewFields=array(
			'ask'=>array(
				'id'=>'id',
				'content',
				'reward',
				'solve',
				'time',
				'answer',
				'_type'=>'LEFT',
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
				'_on'=>'user.id=ask.uid',
				),
			);
	}
?>
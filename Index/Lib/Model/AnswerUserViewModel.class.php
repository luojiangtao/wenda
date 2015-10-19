
<?php
	class AnswerUserViewModel extends ViewModel{
		Protected $viewFields=array(
			'answer'=>array(
				'id',
				'content',
				'time',
				'adopt',
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
				'_on'=>'user.id=answer.uid',
				),
			);
	}
?>
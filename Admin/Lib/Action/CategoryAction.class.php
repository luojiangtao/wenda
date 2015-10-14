<?php
	Class CategoryAction extends Action{
		public function index(){
			$category=M('category')->select();
			$category=resortCategory($category);
			//p($category);die;
			$this->category=$category;
			$this->display();
		}

		public function addCategory(){
			$this->display();
		}

		public function runAddCategory(){
			if(M('category')->add($_POST)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}

		public function addChildCategory(){
			$id=$this->_get('id');
			$category=M('category')->where(array('id'=>$id))->getField('name');

			$this->category=$category;
			$this->pid=$id;
			$this->display();
		}

		public function editCategory(){
			$id=$this->_get('id');
			$category=M('category')->where(array('id'=>$id))->find();

			$this->category=$category;
			$this->display();
		}
		public function runEditCategory(){
			if(M('category')->save($_POST)){
				$this->success('修改成功',U('Category/index'));
			}else{
				$this->error('修改失败');
			}
		}



		public function deleteCategory(){
			$id=$this->_get('id');
			$category=M('category')->select();
			$delete_category_id=getChildCategoryById($category,$id);
			//p($category);die;
			if(M('category')->where(array('id'=>array('IN',$delete_category_id)))->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
		}
	}
?>
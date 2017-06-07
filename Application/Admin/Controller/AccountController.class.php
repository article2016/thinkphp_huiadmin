<?php
namespace Admin\Controller;
use Think\Controller;
class AccountController extends Controller {
    public function account_list(){
		$dao = M('Accounts');// 实例化Data数据模型
		$accounts = $dao->order('id asc')->select(); 
		$accountCount = $dao->count();
		
        $this->assign('accounts',$accounts);
		$this->assign('accountCount',$accountCount);
		$this->display();
	}
	
	public function account_add_act(){
        $dao = M('Accounts');// 实例化Data数据模型
		if($dao->create()) {
			$result = $dao->add();
			if($result) {
				$this->success('添加账号成功！', 'account_add');
			}else{
				$this->error('写入错误！');
			}
		}else{
			$this->error($dao->getError());
		}	
	}

	public function account_edit($id=null){
		$dao = M('Accounts');
		$account = $dao->find($id);
		$this->assign('account',$account);
        $this->display();
	}
	
	public function account_update(){
		$dao = M('Accounts');// 实例化Data数据模型
		if($dao->create()) {
			$result = $dao->save();
			if($result) {
				$this->success('修改成功！');
			}else{
				$this->error('写入错误！');
			}
		}else{
			$this->error($dao->getError());
		}	
	}
	
	public function account_del($id=0){
		$dao = M('Accounts');// 实例化Data数据模型
		$result = $dao->where(array('id'=>$id))->delete();
		if($result) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}		
	}



	
}
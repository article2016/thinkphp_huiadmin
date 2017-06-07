<?php
namespace Admin\Controller;
use Think\Controller;
class LayoutController extends Controller {
    public function index(){
        $this->display();
	}
	
	public function layout_nav_list(){
		$navbar = M('Navbar');// 实例化Data数据模型
		$navBars = $navbar->order('navsort asc')->select(); 
		
        $this->assign('navBars',$navBars);
		$this->display();
	}
	
	public function layout_nav_edit(){
		$id=$_GET['id'];
		$Dao = M('Navbar');
		$navBar = $Dao->find($id);
		$this->assign('navBar',$navBar);
		$this->display();
	}
	
	public function layout_nav_update(){
		$navbar = M('Navbar');// 实例化Data数据模型
		if($navbar->create()) {
			$result = $navbar->save();
			if($result) {
				$this->success('修改成功！');
			}else{
				$this->error('写入错误！');
			}
		}else{
			$this->error($navbar->getError());
		}	
	}
	
	public function layout_nav_isenable($id=0,$isenable=""){
		$navbar = M("Navbar"); // 实例化User对象
		// 要修改的数据对象属性赋值
	
		$data['isenable'] = $isenable;
		$result = $navbar->where(array('id'=>$id))->save($data); // 根据条件更新记录
		
	}
	
	public function layout_nav_del($id=0){
		$navbar = M('Navbar');// 实例化Data数据模型
		$result = $navbar->where('id='.$id)->delete();
		if($result) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}		
	}
	
	public function nav_add(){
		$navBar = M('Navbar');// 实例化Data数据模型
		if($navBar->create()) {
			$result = $navBar->add();
			if($result) {
				$this->success('添加成功！');
			}else{
				$this->error('写入错误！');
			}
		}else{
			$this->error($navBar->getError());
		}	
	}
	
	
	public function layout_links_list(){
		$dao = M('Links');// 实例化Data数据模型
		$links = $dao->order('sort asc')->select(); 
		
        $this->assign('links',$links);
		$this->display();
	}
	public function layout_links_edit(){
		$id=$_GET['id'];
		$Dao = M('Links');
		$links = $Dao->find($id);
		$this->assign('links',$links);
		$this->display();
	}
	public function layout_links_update(){
		$links = M('Links');// 实例化Data数据模型
		if($links->create()) {
			$result = $links->save();
			if($result) {
				$this->success('修改成功！');
			}else{
				$this->error('写入错误！');
			}
		}else{
			$this->error($links->getError());
		}	
	}
	public function layout_links_isenable($id=0,$isenable=""){
		$links = M("Links"); // 实例化User对象
		// 要修改的数据对象属性赋值
	
		$data['isenable'] = $isenable;
		$result = $links->where(array('id'=>$id))->save($data); // 根据条件更新记录
		
	}
	public function layout_links_del($id=0){
		$links = M('Links');// 实例化Data数据模型
		$result = $links->where('id='.$id)->delete();
		if($result) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}		
	}
	public function links_add(){
		$links = M('Links');// 实例化Data数据模型
		if($links->create()) {
			$result = $links->add();
			if($result) {
				$this->success('添加成功！');
			}else{
				$this->error('写入错误！');
			}
		}else{
			$this->error($links->getError());
		}	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}
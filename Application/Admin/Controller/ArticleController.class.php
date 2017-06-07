<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function article_list(){
		$dao = M('Articles');// 实例化Data数据模型
		$articles = $dao->order('id asc')->select(); 
		
		$articleCount = $dao->count();
		
		//========================分类==========================
		$daoType = M('Articletype');// 实例化Data数据模型
		$daoCategory = M('Articlecategory');// 实例化Data数据模型
		$types = $daoType->order('id asc')->select(); 
		$categorys = $daoCategory->order('id asc')->select(); 
		
        $this->assign('types',$types);
		$this->assign('categorys',$categorys);
		//=====================================================
		
        $this->assign('articles',$articles);
		$this->assign('articleCount',$articleCount);
		$this->display();
	}
	
	public function article_edit($id=null){
		$daoType = M('Articletype');// 实例化Data数据模型
		$daoCategory = M('Articlecategory');// 实例化Data数据模型
		$types = $daoType->order('id asc')->select(); 
		$categorys = $daoCategory->order('id asc')->select(); 
		
        $this->assign('types',$types);
		$this->assign('categorys',$categorys);
		
		$Dao = M('Articles');
		$article = $Dao->find($id);
		$this->assign('article',$article);
        $this->display();
	}
	
	public function article_add(){
        $daoType = M('Articletype');// 实例化Data数据模型
		$daoCategory = M('Articlecategory');// 实例化Data数据模型
		$types = $daoType->order('id asc')->select(); 
		$categorys = $daoCategory->order('id asc')->select(); 
		
        $this->assign('types',$types);
		$this->assign('categorys',$categorys);
		$this->display();
	}
	public function article_add_act(){
        $dao = M('Articles');// 实例化Data数据模型
		if($dao->create()) {
			$result = $dao->add();
			if($result) {
				$this->success('添加文章成功！', 'article_list');
			}else{
				$this->error('写入错误！');
			}
		}else{
			$this->error($dao->getError());
		}	
	}
	
	public function article_update(){
		$dao = M('Articles');// 实例化Data数据模型
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
	
	public function article_setState($id=null,$state=null){
		$dao = M(Articles); // 实例化User对象
		// 要修改的数据对象属性赋值
		$data['state'] = $state;
		$dao->where(array('id'=>$id))->save($data); // 根据条件更新记录
	}
	
	public function article_del($id=0){
		$dao = M('Articles');// 实例化Data数据模型
		$result = $dao->where(array('id'=>$id))->delete();
		if($result) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}		
	}

	public function article_categorys(){
		$daoType = M('Articletype');// 实例化Data数据模型
		$daoCategory = M('Articlecategory');// 实例化Data数据模型
		$types = $daoType->order('id asc')->select(); 
		$categorys = $daoCategory->order('id asc')->select(); 
		
        $this->assign('types',$types);
		$this->assign('categorys',$categorys);
		$this->display();
	}
	
	public function article_category_add_act(){
		$dao = M('Articlecategory');// 实例化Data数据模型
		if($dao->create()) {
			$result = $dao->add();
			if($result) {
				$this->success('添加栏目成功！');
			}else{
				$this->error('添加栏目错误！');
			}
		}else{
			$this->error($dao->getError());
		}	
	}
	
	public function article_category_edit($id=null){
		$Dao = M('Articlecategory');
		$category = $Dao->find($id);
		$this->assign('category',$category);
        $this->display();
	}
	public function article_category_update(){
		$dao = M('Articlecategory');// 实例化Data数据模型
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
	
	public function article_category_del($id=0){
		$dao = M('Articlecategory');// 实例化Data数据模型
		$result = $dao->where(array('id'=>$id))->delete();
		if($result) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}		
	}
	
	public function article_type_add_act(){
		$dao = M('Articletype');// 实例化Data数据模型
		if($dao->create()) {
			$result = $dao->add();
			if($result) {
				$this->success('添加类型成功！');
			}else{
				$this->error('添加类型错误！');
			}
		}else{
			$this->error($dao->getError());
		}	
	}

	public function article_type_edit($id=null){
		$Dao = M('Articletype');
		$type = $Dao->find($id);
		$this->assign('type',$type);
        $this->display();
	}
	public function article_type_update(){
		$dao = M('Articletype');// 实例化Data数据模型
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
	
	public function article_type_del($id=0){
		$dao = M('Articletype');// 实例化Data数据模型
		$result = $dao->where(array('id'=>$id))->delete();
		if($result) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}		
	}

	public function article_gather(){
		$dao = M('Gather');// 实例化Data数据模型
		$gathers = $dao->order('id asc')->select(); 
		
        $this->assign('gathers',$gathers);
		$this->display();
	}
	
	public function article_gather_add_act(){
		$dao = M('Gather');// 实例化Data数据模型
		if($dao->create()) {
			$result = $dao->add();
			if($result) {
				$this->success('添加采集URL成功！');
			}else{
				$this->error('添加采集URL错误！');
			}
		}else{
			$this->error($dao->getError());
		}
	}
	public function article_gather_del($id=0){
		$dao = M('Gather');// 实例化Data数据模型
		$result = $dao->where('id='.$id)->delete();
		if($result) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}		
	}
	public function article_gather_edit($id=null){
		$Dao = M('Gather');
		$gather = $Dao->find($id);
		$this->assign('gather',$gather);
        $this->display();
	}
	public function article_gather_update(){
		$dao = M('Gather');// 实例化Data数据模型
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

	//使用phpQuery采集文章列表
	public function article_gather_articlelist($id=null){
		Vendor('phpQuery2.phpQuery');
		Vendor('phpQuery2.QueryList');
		if(!$id==null){
			$dao = M("Gather");
			$gather = $dao->find($id);
			//print_r($collection);
			
			$url=$gather['url'];
			$rules=json_decode($gather['rules'],true);
			
			$query = \QL\QueryList::Query($url,$rules);
			$data =$query->data;
			
			$this->assign('gather',$gather);
			$this->assign('data',$data);
			$this->display();
		}else{
			$this->error('采集URL不存在！');
		}
	}
	
	public function article_gather_articleadd($url=null,$rules=null){
		Vendor('phpQuery2.phpQuery');
		Vendor('phpQuery2.QueryList');
		$daoType = M('Articletype');// 实例化Data数据模型
		$daoCategory = M('Articlecategory');// 实例化Data数据模型
		$types = $daoType->order('id asc')->select(); 
		$categorys = $daoCategory->order('id asc')->select(); 
		
        $this->assign('types',$types);
		$this->assign('categorys',$categorys);
		
		$abstract = I('abstract');
		$this->assign('abstract',$abstract);
		$keywords = I('keywords');
		$this->assign('keywords',$keywords);
		$picture = I('picture');
		$this->assign('picture',$picture);
		if(!$url==null){
			
			$rules=json_decode($rules,true);
			
			$query = \QL\QueryList::Query($url,$rules);
			$data =$query->data;
			
			foreach($data as $v){
				$this->assign('content',$v['content']);
				$this->assign('title',$v['title']);
			}
			
			$this->display();
		}else{
			$this->error('采集URL不存在！');
		}
	}
	
	
	
	
	
	
	
	
	
	
}
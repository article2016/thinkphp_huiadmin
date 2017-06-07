<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
        $this->redirect('home');
	}
	
	private function getCofig(){
		$path = 'Application/'.MODULE_NAME .'/Conf/web_config.php';
		//读取配置文件,
		$web_config = include $path;   
		$this->assign('web_config',$web_config);
	}
	
	public function home(){
		//========================网页配置信息==========================
		$this->getCofig();
		//========================友情链接==========================
		$linksDao = M("Links"); 
		$isenable="是";
		// 排序：asc（升序）、desc（降序）
		$links = $linksDao->where(array('isenable'=>$isenable))->order('sort asc')->select(); 
		$this->assign('links',$links);
		//========================导航列表==========================
        $navbar = M("Navbar"); 
		$isenable="是";
		// 排序：asc（升序）、desc（降序）
		$navBars = $navbar->where(array('isenable'=>$isenable))->order('navsort asc')->select(); 
		$this->assign('navBars',$navBars);
		
		//========================文章列表==========================
		$articleDao = M("Articles"); 
		$category=3;//创业资讯
		// 排序：asc（升序）、desc（降序）
		$articles = $articleDao->where(array('category'=>$category))->order('browsetimes desc')->limit(4)->select(); 
		$this->assign('articles',$articles);
		
		
		$popularAs = $articleDao->order('browsetimes desc')->limit(3)->select(); 
		$this->assign('popularAs',$popularAs);
		
		$category=2;//新闻资讯
		// 排序：asc（升序）、desc（降序）
		$newArticles = $articleDao->where(array('category'=>$category))->order('browsetimes desc')->limit(5)->select(); 
		$this->assign('newArticles',$newArticles);
		
		$category=1;//娱乐资讯
		// 排序：asc（升序）、desc（降序）
		$yuleArticles = $articleDao->where(array('category'=>$category))->order('browsetimes desc')->limit(4)->select(); 
		$this->assign('yuleArticles',$yuleArticles);
		

		$category=3;//创业资讯
		// 排序：asc（升序）、desc（降序）
		$articlesRight = $articleDao->where(array('category'=>$category))->order('browsetimes desc')->limit(3)->select(); 
		$this->assign('articlesRight',$articlesRight);
		
		$cond['picture']=array('NEQ','NULL');//字段pic不为空
		$carouselArticles = $articleDao->where($cond)->order('browsetimes desc')->limit(5)->select(); 
		$this->assign('carouselArticles',$carouselArticles);
		$varCount = count($carouselArticles);
		$this->assign('varCount',$varCount);
		//========================分类==========================
		$daoType = M('Articletype');// 实例化Data数据模型
		$daoCategory = M('Articlecategory');// 实例化Data数据模型
		$types = $daoType->order('id asc')->select(); 
		$categorys = $daoCategory->order('id asc')->select(); 
		
        $this->assign('types',$types);
		$this->assign('categorys',$categorys);
		//=====================================================
		$this->display();
	}
	
	public function article($id=null){
	
		
		$navbar = M("Navbar"); 
		$isenable="是";
		// 排序：asc（升序）、desc（降序）
		$navBars = $navbar->where(array('isenable'=>$isenable))->order('navsort asc')->select(); 
		$this->assign('navBars',$navBars);
		
		//========================友情链接==========================
		$linksDao = M("Links"); 
		$isenable="是";
		// 排序：asc（升序）、desc（降序）
		$links = $linksDao->where(array('isenable'=>$isenable))->order('sort asc')->select(); 
		$this->assign('links',$links);
		
		
        $articleDao = M('Articles');
		$articleDao->where(array('id'=>$id))->setInc('browsetimes',1);//添加浏览数
		$article = $articleDao->find($id);
		$this->assign('article',$article);
		
		$category=$article["category"];
		// 排序：asc（升序）、desc（降序），热帖排行
		$hotArticles = $articleDao->where(array('category'=>$category))->order('browsetimes desc')->limit(10)->select(); 
		$this->assign('hotArticles',$hotArticles);
		
		$cond['picture']=array('NEQ','NULL');//字段pic不为空
		$cond['category']=$category;
		$carouselArticles = $articleDao->where($cond)->order('browsetimes desc')->limit(10)->select(); 
		$this->assign('carouselArticles',$carouselArticles);
		
        $this->display();
	}
	
	public function module_article($id=null,$nid=null){
		$this->assign('nid',$nid);//被选中的导航栏
		//========================导航列表==========================
		$navbar = M("Navbar"); 
		$isenable="是";
		// 排序：asc（升序）、desc（降序）
		$navBars = $navbar->where(array('isenable'=>$isenable))->order('navsort asc')->select(); 
		$this->assign('navBars',$navBars);
		//========================文章列表==========================
		$articleDao = M("Articles"); 
		// 排序：asc（升序）、desc（降序）
		$articles = $articleDao->where(array('category'=>$id))->order('id desc')->select(); 
		$this->assign('articles',$articles);
		
		// 排序：asc（升序）、desc（降序），热帖排行
		$hotArticles = $articleDao->order('browsetimes desc')->limit(10)->select(); 
		$this->assign('hotArticles',$hotArticles);
		
		
		$cond['picture']=array('NEQ','NULL');//字段pic不为空
		$cond['category']=$id;
		$carouselArticles = $articleDao->where($cond)->order('browsetimes desc')->limit(10)->select(); 
		$this->assign('carouselArticles',$carouselArticles);
		
		//========================友情链接==========================
		$linksDao = M("Links"); 
		$isenable="是";
		// 排序：asc（升序）、desc（降序）
		$links = $linksDao->where(array('isenable'=>$isenable))->order('sort asc')->select(); 
		$this->assign('links',$links);
		
		$this->display();
		
	}

	

	public function demo(){
		//多表查询：使用table（不推荐使用）查询category.id = article.category的两表和在一起的数据，但是不能添加其他查询条件
		$articleDao = M("Articles"); 
		$list = $articleDao->table('tbl_articles article, tbl_articlecategory category')->
		where('category.id = article.category')->
		field('article.id as id, article.title as title, article.createtime as createtime,category.name as name')->
		order('article.id desc' )->limit(5)->select();
		$this->assign('list',$list);
		
		//多表查询：使用join（推荐使用）查询category.id = article.category的两表和在一起的数据，可以正常添加where其他查询条件
		$list1 = M('Articles as article')->join('tbl_articlecategory as category on category.id = article.category')->
		where('article.category = 1')->
		field('article.id as id, article.title as title, article.createtime as createtime,category.name as name')->
		select();
		$this->assign('list1',$list1);
		

        $this->display();
	}
	
	//删除图片
	public function del(){
		if($_POST['name']!=""){
			$info = explode("/", $_POST['name']);
			//count($info)
			$url='./Public/Plugin/Uploadify/upload/'.$info[count($info)-1];
    		if(unlink($url)){
    			$this->success("success");
    		}
    		else
    			$this->error("unlink fail");
    		}
    	else
    		$this->error("info is gap");
    }
	//上传图片
	public function uploadify(){
    	$targetFolder = $_POST['url']; // Relative to the root

    	$targetPath = "/thinkphp_huiadmin/Public/Plugin/Uploadify/upload/";

		//echo $_POST['token'];
		$verifyToken = md5($_POST['timestamp']);

		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

			import("ORG.Net.UploadFile");
			$name=time().rand();	//设置上传图片的规则

			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Plugin/Uploadify/upload//';// 设置附件上传目录
			$upload->saveRule = $name;  //设置上传图片的规则
			if(!$upload->upload()) {// 上传错误提示错误信息
			//return false;
			echo $upload->getErrorMsg();
			//echo $targetPath;
			}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			echo $targetPath.$info[0]["savename"];
			}
		}

    }

	
	
	public function demo1(){
		//文件路径地址
       $path = 'Application/'.MODULE_NAME .'/Conf/web_config.php';
       
       //thinkphp的配置文件是数组
        
       //读取配置文件,
       $file = include $path;      
        
       //这里获取用户提交上来的配置文件 ,例如 'WEB_NAME' => I('web_name'), 我测试用的静态设置
       $config = array(
           'WEB_NAME' => 'T博客',
           'WEB_AGE' => '我是博主',
           'WEB_TITLE' => '博客管理系统'
       );
        
        
       //合并数组，相同键名，后面的值会覆盖原来的值
       $res = array_merge($file, $config);
        
       //数组循环，拼接成php文件
       $str = '<?php return array(';
        
       foreach($res as $key => $value){
           // '\'' 单引号转义
           $str .= '\''.$key.'\''.'=>'.'\''.$value.'\''.',';
       };
       $str .= '); ?>';
       
       //写入文件中,更新配置文件
       if(file_put_contents($path, $str)){
           echo '保存成功！';
       }else {
           echo '保存失败！';
       }
	}
	
	
}
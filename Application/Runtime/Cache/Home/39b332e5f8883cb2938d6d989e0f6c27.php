<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title>海洋 - 书海 - H-ui.admin v2.4<?php echo ($web_config["WEB_NAME"]); ?></title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">

	<link rel="stylesheet" type="text/css" href="/works/thinkphp_huiadmin/Public/home/css/layout.css">
	<link rel="stylesheet" type="text/css" href="/works/thinkphp_huiadmin/Public/home/css/zzsc.css" />

</head>
<body>

<div id="top">
	<div class="wrap">
		头部
	</div>
</div>
<div id="header">
	<div class="wrap">
		<div id="logo">
			logo、搜索栏
		</div>
	</div>
	<div id="nav-main">
		<div class="wrap">
			<div id="nav">
				<ul>
					<li class="a"><a  class="home" href="home">首页</a></li>
					<?php if(is_array($navBars)): $i = 0; $__LIST__ = $navBars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navBar): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($navBar['navlink']); ?>"><?php echo ($navBar['navname']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<script src="/works/thinkphp_huiadmin/Public/home/js/nv.js" type="text/javascript"></script> 
			</div>
		</div>
	</div>
</div>


<div id="main">
	<div class="wrap">
		<div class="ad" style="display:none">暂时隐藏</div>
	</div>
	<div class="wrap">
		<div class="left">
			<div class="left-up">
				<div id="playimages" class="play">
					<ul class="big_pic">
						<div class="prev"></div>
						<div class="next"></div>
						
						<div class="text">浏览最多的资讯......</div>
						<div class="length">共<?php echo ($varCount); ?>条</div>
						
						<a class="mark_left" href="javascript:;"></a>
						<a class="mark_right" href="javascript:;"></a>
						<div class="bg"></div>
						
						<li style="z-index:1;"><a href="article?id=<?php echo ($carouselArticles[0]["id"]); ?>" target="_blank"><img src="<?php echo ($carouselArticles[0]["picture"]); ?>" /></a></li>
						<?php if(is_array($carouselArticles)): $i = 0; $__LIST__ = array_slice($carouselArticles,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><li><a href="article?id=<?php echo ($article["id"]); ?>" target="_blank"><img src="<?php echo ($article["picture"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<div id="small_pic" class="small_pic">
						<ul style="width:400px;">
							<li style=" filter: alpha(opacity:100); opacity:1;"><img src="<?php echo ($carouselArticles[0]["picture"]); ?>" /></li>
							<?php if(is_array($carouselArticles)): $i = 0; $__LIST__ = array_slice($carouselArticles,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($article["picture"]); ?>" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>       
					</div>
				</div>

				<script src="/works/thinkphp_huiadmin/Public/home/js/move.js"></script>
			</div>
			
			<div class="left-down">
				<div class="content3">
					<div class="blocktitle title"><span class="titletext" style="float:;margin-left:px;font-size:;color: !important;">最新创业经验</span></div>
					<div id="portal_block_2335_content" class="dxb_bc">
						<div class="module cl xl xl1">
						<ul>
						<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><li >
							<a href="#" id="bkys">【
							<?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i; if(($type["id"]) == $article["type"]): echo ($type["name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
							】</a>
							<a href="article?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a>
							</li>
						</ul><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="right">
			<div class="sup">
				<div class="sup-left">
				<div class="content1">
					<?php if(is_array($popularAs)): $i = 0; $__LIST__ = $popularAs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$popularA): $mod = ($i % 2 );++$i;?><dl class="cl">
						<dt><a href="article?id=<?php echo ($popularA["id"]); ?>" title="<?php echo ($popularA["title"]); ?>" target="_blank"><?php echo ($popularA["title"]); ?></a></dt>
						<dd><?php echo ($popularA["abstract"]); ?><a href="article?id=<?php echo ($popularA["id"]); ?>">[详细]</a></dd>
					</dl><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
					
					
				<div class="content2">
					<ul>
					<?php if(is_array($newArticles)): $i = 0; $__LIST__ = $newArticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newArticle): $mod = ($i % 2 );++$i;?><li>
						<em><a href="#" target="_blank"><?php echo ($newArticle["author"]); ?></a></em>
						<a href="#" id="bkys">【
							<?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i; if(($type["id"]) == $newArticle["type"]): echo ($type["name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
						】</a>
						<a href="article?id=<?php echo ($newArticle["id"]); ?>" title="<?php echo ($newArticle["title"]); ?>" target="_blank"><?php echo ($newArticle["title"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
					<!--id=li6和li7是用于分割线-->
					<li id="li6">
						<em><a href="#" target="_blank">来自百度</a></em>
						<a href="#" id="bkys">【 广告推广 】</a>
						<a href="#" title="这是广告推广" >这是广告推广</a>
					</li>
					<li id="li7">
						<em><a href="#" target="_blank">来自百度</a></em>
						<a href="#" id="bkys">【 广告推广 】</a>
						<a href="#" title="这是广告推广" >这是广告推广</a></li>
					<?php if(is_array($yuleArticles)): $i = 0; $__LIST__ = $yuleArticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><li>
						<em><a href="#" target="_blank"><?php echo ($article["author"]); ?></a></em>
						<a href="#" id="bkys">【
							<?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i; if(($type["id"]) == $article["type"]): echo ($type["name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
						】</a>
						<a href="article?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>" target="_blank"><?php echo ($article["title"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
					
					</ul>
					
					
				</div>
			</div>
				<div class="sup-right">
					<div id="" class="content-right">
						<div class="blocktitle title">
							<span class="titletext" style="float:;margin-left:px;font-size:;color: !important;">社区活动</span>
							<span class="subtitle" style="float:;margin-right:px;font-size:">
							<a href="" target="_blank" style="color:#3E3E3E !important;">查看更多</a>
							</span>
						</div>
						<div class="">
							<?php if(is_array($articlesRight)): $i = 0; $__LIST__ = $articlesRight;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><dl class="cl">
								<dd class="m"><a href="article?id=<?php echo ($article["id"]); ?>" target="_blank"><img src="<?php echo ($article["picture"]); ?>" width="95" height="80" alt="<?php echo ($article["title"]); ?>"></a></dd>
								<dt><a href="article?id=<?php echo ($article["id"]); ?>" title="<?php echo ($article["title"]); ?>"  target="_blank"><?php echo ($article["title"]); ?></a></dt>
								<span><?php echo ($article["abstract"]); ?></span>
							</dl><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
			</div>
		   
			
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="wrap">
		<div class="friendLink">
			<div class="title"><span class="titletext">友情链接</span></div>
			
			<div class="dxb_bc">
				<ul class="cl mbm">
					<li id="li1"><a href="home">首页</a></li>
					<?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><li id="li2"><a href="<?php echo ($link["url"]); ?>" target="_blank"><?php echo ($link["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	
    
</div>

<div id="footer">
	<div class="aboutus">页脚</div>
	<div class="wrap" style="display:none">
      <p> 
        <a href="http://182.92.223.135/20151120/archiver/">Archiver</a><span class="pipe">|</span><a href="http://182.92.223.135/20151120/forum.php?mobile=yes">手机版</a><span class="pipe">|</span><a href="http://182.92.223.135/20151120/forum.php?mod=misc&action=showdarkroom">小黑屋</a><span class="pipe">|</span> 
        <a href="http://www.comsenz.com/" target="_blank">Comsenz Inc.</a> 
      </p>
      <p>Powered by 
			<a href="http://www.discuz.net/" target="_blank">Discuz!</a> <em>X3.2</em>      &#169; 2001-2013 
			<a href="http://www.comsenz.com/" target="_blank">Comsenz Inc.</a>
			<span id="debuginfo">All Rights Reserved. </span>
      </p>
      <p class="xs0"></p>
  </div>
</div>
</body>
</html>
<?php /*a:4:{s:72:"D:\phpstudy\phpstudy_pro\WWW\tp5\application\index\view\index\index.html";i:1607301100;s:74:"D:\phpstudy\phpstudy_pro\WWW\tp5\application\index\view\common\header.html";i:1606882706;s:73:"D:\phpstudy\phpstudy_pro\WWW\tp5\application\index\view\common\right.html";i:1607148694;s:72:"D:\phpstudy\phpstudy_pro\WWW\tp5\application\index\view\common\foot.html";i:1605538950;}*/ ?>
<!DOCTYPE html >
<head>
<title>练习</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="http://127.0.0.1:8080/tp5/public/static/index/style/lady.css" type="text/css" rel="stylesheet" />
<script type='text/javascript' src='http://127.0.0.1:8080/tp5/public/static/index/style/ismobile.js'></script>
</head>

<body>

		<div class="ladytop">
            <div class="nav">
                <div class="left"><a href=""><img src="http://127.0.0.1:8080/tp5/public/static/index/images/hunshang.png" alt="wed114婚尚"></a></div>
                <div class="right">
                    <div class="box">
                        <a href="<?php echo url('index/index'); ?>"  rel='dropmenu209'>首页</a>
                    </div>
                    <div class="box">
                    <?php if(is_array($cateres) || $cateres instanceof \think\Collection || $cateres instanceof \think\Paginator): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <a href="<?php echo url('cate/index',array('cateid'=>$vo['id'])); ?>"  rel='dropmenu209'><?php echo htmlentities($vo['catename']); ?></a> 
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div>

<div class="hotmenu">
	<div class="con">热门标签：<a href='qiwenqushi/'>奇闻趣事</a> <a href=''>生活妙招</a> <a href='xingzuo/'>星座</a> <a href='qinzi/'>亲子</a> <a href='qiche/'>汽车</a> <a href='chongwubaike/'>宠物百科</a> <a href='jiaji/'>家居</a> </div>
</div>
<!--顶部通栏-->


<div class="position"></div>

<div class="overall">

	<div class="left">
				<?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<div class="xnews2">
					<div class="pic">
						<a target="_blank" href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>">
							<img src="<?php if($vo['pic'] != ''): ?>http://127.0.0.1:8080/tp5/public/static/admin<?php echo htmlentities($vo['pic']); else: ?>http://127.0.0.1:8080/tp5/public/static/admin/images/zwslt.jpg<?php endif; ?>" alt="<?php echo htmlentities($vo['title']); ?>"/>
						</a>
					</div>
					<div class="dec">
						<h3>
							<a target="_blank" href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>"><?php echo htmlentities($vo['title']); ?></a>
						</h3>
						<div class="time">发布时间：<?php echo htmlentities(date('Y-m-d H:i',!is_numeric($vo['time'])? strtotime($vo['time']) : $vo['time'])); ?></div>
						<p>
							<?php echo htmlentities($vo['brief']); ?>
			 			</p>
			 			<div class="time">
			 				<?php
								$kws=explode(',',$vo['keywords']);
								foreach($kws as $k=>$v){
									echo "<a href='#'>$v</a>" ;
								}
							?>
						</div>
					</div>
				</div>
	
				<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
				
				<div class="right">
                <!--右侧各种广告-->
                <!--猜你喜欢-->
	<div id="hm_t_57953">
		<div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
			<div class="hm-t-container" style="width: 298px;">
				<div class="hm-t-main">
					<div class="hm-t-header">热门点击</div>
					<?php if(is_array($clicks) || $clicks instanceof \think\Collection || $clicks instanceof \think\Paginator): $i = 0; $__LIST__ = $clicks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="hm-t-body">
					<ul class="hm-t-list hm-t-list-img">
						<li class="hm-t-item hm-t-item-img">
							<a data-pos="0" title="<?php echo htmlentities($vo['title']); ?>" target="_blank" href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>" class="hm-t-img-title" style="visibility: visible;">
							<span><?php echo htmlentities($vo['title']); ?></span>
							</a>
						</li>
						
					</ul>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>

		</div>
	</div>
	<div style="height:15px"></div>
	<div id="hm_t_57953">
		<div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
		<div style="width: 298px;" class="hm-t-container">
			<div class="hm-t-main"><div class="hm-t-header">推荐阅读</div>
				<?php if(is_array($tjyd) || $tjyd instanceof \think\Collection || $tjyd instanceof \think\Paginator): $i = 0; $__LIST__ = $tjyd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yd): $mod = ($i % 2 );++$i;?>
				<div class="hm-t-body">
					<ul class="hm-t-list hm-t-list-img">
						<li class="hm-t-item hm-t-item-img"><a style="visibility: visible;" class="hm-t-img-title" href="<?php echo url('article/index',array('arid'=>$yd['id'])); ?>" target="_blank" title="<?php echo htmlentities($yd['title']); ?>" data-pos="0"><span><?php echo htmlentities($yd['title']); ?></span></a></li>
					</ul>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>

		</div>
	</div>

	<div style="height:15px"></div>

	<div id="bdcs">
		<div class="bdcs-container">
			<meta content="IE=9" http-equiv="x-ua-compatible">   <!-- 嵌入式 -->  
			<div id="default-searchbox" class="bdcs-main bdcs-clearfix">      
				<div id="bdcs-search-inline" class="bdcs-search bdcs-clearfix">          
					<form id="bdcs-search-form" autocomplete="off" class="bdcs-search-form" target="_blank" method="get" action="<?php echo url('search/index'); ?>">     
						<input type="text" placeholder="请输入关键词" id="bdcs-search-form-input" class="bdcs-search-form-input" name="keywords" autocomplete="off" style="line-height: 30px; width:220px;">              
						<input type="submit" value="搜索" id="bdcs-search-form-submit" class="bdcs-search-form-submit bdcs-search-form-submit-magnifier">                       
					</form>      
				</div>                
				<div id="bdcs-search-sug" class="bdcs-search-sug" style="top: 552px; width: 239px;">              
					<ul id="bdcs-search-sug-list" class="bdcs-search-sug-list"></ul>          
				</div>                  
			</div>                           
		</div>
	</div>

	<div style="height:15px"></div>


                
</div>
				<div class="pages">
					<div class="plist" >
						<?php echo $articles; ?>
					</div>
				</div>
	

</div>
	
		
	


		<div class="footerd">
<ul>
<li>Copyright &#169; 2008-2016  all rights reserved 版权所有   <a href="http://www.miibeian.gov.cn" target="_blank" rel="nofollow">蜀icp备08107937号</a></li> 
</ul>
</div>

<div style="display:none;"><script src='goto/my-65537.js' language='javascript'></script><script src="images/js/count_zixun.js" language="JavaScript"></script></div>


</body>
</html>
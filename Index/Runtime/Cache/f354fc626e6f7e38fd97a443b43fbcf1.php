<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>涛涛问答首页</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
    <script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>

	<script>
		var getCategoryChild="<?php echo U('Ask/getCategoryChild');?>";
		var isLogin=<?php if(isset($_SESSION['username'])): ?>true<?php else: ?>false<?php endif; ?>;
	</script>

    <script src="__PUBLIC__/js/index_common.js"></script>
</head>

<body>
    <!-- 顶部开始 -->
    <!-- 导航开始 -->
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo U('Index/index');?>">涛涛问答系统</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="button" class="btn btn-default">搜索答案</button>
                        <a href="<?php echo U('Ask/index');?>"><button type="button" class="btn btn-default">？提问</button></a>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(!isset($_SESSION['username'])): ?><li class='login' data-toggle="modal" data-target="#login"><a href="#">登录</a></li>
                            <li data-toggle="modal" data-target="#register"><a href="#">注册</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo U('Member/index',array('uid'=>session('uid')));?>"><?php echo session('username');?></a></li>
                            <li><a href="<?php echo U('Common/logout');?>">退出</a></li><?php endif; ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <!-- 导航结束 -->
    <!-- 二级导航开始 -->
    <?php $category=M('category')->where(array('pid'=>0))->select(); ?>

    <div class="container">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo U('Index/index');?>">问答首页 <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">问题分类 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if(is_array($category)): foreach($category as $key=>$v): ?><li><a href="<?php echo U('List/index',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">累计提问：10086</a></li>
            </ul>
        </nav>
    </div>
    <!-- 二级导航结束 -->
    <!-- 顶部结束 -->
    <!-- 主题部分开始 -->
    <div class="container">
        <div class="row">
            <!-- 左边开始 -->
            <div class="col-md-8">
                <p>全部分类 > 电脑/网络 > 电脑知识 > 电脑配置 </p>
                <h3>待解决 <?php echo ($ask["content"]); ?></h3>
                <span class="glyphicon glyphicon-yen text-muted" aria-hidden="true">123</span>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-4"><?php echo ($ask["username"]); ?></div>
                    <div class="col-md-4"><?php echo ($ask["exp"]); ?></div>
                    <div class="col-md-4"><?php echo (time_format($ask["time"])); ?></div>
                </div>
                <hr>
                <?php if(isset($_SESSION['uid']) AND (!$ask['solve']) AND $_SESSION['uid'] != $ask['user_id']): ?><p class="text-muted">我来回答</p>
                    <form action="<?php echo U('Show/runAddAnswer');?>" method="post">
                        <textarea class="form-control" name='content' rows="3" required></textarea>
                        <input type="hidden" name="aid" value="<?php echo ($ask["id"]); ?>">
                        <br>
                        <p class="text-right">
                            <input type="submit" class="btn-success btn-lg" value="提交回答">
                        </p>
                    </form><?php endif; ?>
                <!-- 满意回答开始 -->
                <?php if(isset($answer_adopt)): ?><h3>满意回答</h3>
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <a href="<?php echo U('Member/index',array('uid'=>$answer_adopt['user_id']));?>"><img src="__PUBLIC__/images/1.jpg" alt="唯美图片1" height="50px" width='50px' /></a>
                            <p class='text-center'><a href="<?php echo U('Member/index',array('uid'=>$answer_adopt['user_id']));?>"><?php echo ($answer_adopt["username"]); ?></a></p>
                        </div>
                        <div class="col-md-9">
                            <?php echo ($answer_adopt["content"]); ?> <small class="text-muted text-lowercase">(<?php echo (time_format($answer_adopt["time"])); ?>)</small>
                        </div>
                    </div><?php endif; ?>
            <!-- 满意回答结束 -->
            <!-- 全部回答开始 -->
            <p class="muted">全部回答 共3条</p>
            <div class="row panel panel-default">
                <hr>
                <?php if(is_array($answer)): foreach($answer as $key=>$v): ?><div class="row">
                        <div class="col-md-3 text-center">
                            <a href="<?php echo U('Member/index',array('uid'=>$v['user_id']));?>"><img src="__PUBLIC__/images/1.jpg" alt="唯美图片1" height="50px" width='50px' /></a>
                            <p class='text-center'><a href="<?php echo U('Member/index',array('uid'=>$v['user_id']));?>"><?php echo ($v["username"]); ?></a></p>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-10"><?php echo ($v["content"]); ?> <small class="text-muted text-lowercase">(<?php echo (time_format($v["time"])); ?>)</small></div>
                                <div class="col-md-2">
                                    <?php if(isset($_SESSION['uid']) && $_SESSION['uid']==$ask['user_id'] && !$ask['solve']): ?><a href="<?php echo U('Show/adopt',array('id'=>$v['id'],'aid'=>$ask['id'],'uid'=>$v['user_id']));?>" class='btn btn-warning btn-sm'>采纳</a><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr><?php endforeach; endif; ?>
            </div>
            <!-- 全部回答结束 -->
        </div>
        <!-- 左边结束 -->
        <!-- 右边开始 -->
        <!-- 右边开始 -->
<div class="col-md-4  panel panel-default">
    <hr>
    <?php if(!isset($_SESSION['username'])): ?><div class="row">
            <div class="col-md-6 text-right">
                <button class="btn">登录</button>
            </div>
            <div class="col-md-6">
                <button class="btn">注册</button>
            </div>
        </div>
        <?php else: ?>

        <?php
 $user=M('user')->where(array('id'=>session('uid')))->find(); ?>

        <div class="row">
            <hr>
            <div class="col-md-6 text-right">
                <a href="<?php echo U('Member/index',array('uid'=>session('uid')));?>"><img src="__PUBLIC__/images/1.jpg" alt="唯美图片1" height="50px" width='50px' /></a>
            </div>
            <div class="col-md-6">
                <b><a href="<?php echo U('Member/index',array('uid'=>session('uid')));?>"><?php echo ($user["username"]); ?></a></b> LV<?php echo ($user["exp"]); ?>
                <br> 金币：<?php echo ($user["point"]); ?>
                <br> 经验值：<?php echo ($user["exp"]); ?>
                <br>
            </div>
        </div>
        <br>
        <div class="row text-center">
            <div class="col-md-4">
                <p>回答数</p><?php echo ($user["answer"]); ?>
            </div>
            <div class="col-md-4">
                <p>采纳率</p><?php echo ($user["adopt"]); ?>
            </div>
            <div class="col-md-4">
                <p>提问数</p><?php echo ($user["ask"]); ?>
            </div>
        </div>
        <p class="text-center">
            <button class="btn btn-sm btn-warning">我的提问</button>
            <button class="btn btn-sm btn-warning">我的回答</button>
        </p><?php endif; ?>
    <hr>

    <?php
 $todayTime = strtotime(date('y-m-d')); $sql = 'SELECT `u`.`id` AS `id`, `username`, `face`, `exp`, `answer`, `u`.`adopt` AS `adopt` FROM `hd_answer` `a` LEFT JOIN `hd_user` `u` ON `a`.`uid` = `u`.`id` WHERE `time` > ' . $todayTime . ' GROUP BY `username` ORDER BY `answer` DESC LIMIT 1'; $answerOnThisDay = M()->query($sql); $starUser = $answerOnThisDay[0]; $starUser['level'] = exp_to_level($starUser['exp']); ?>

    <div class="row">
        <h4 class="text-center">问答之星</h4>
        <hr>
        <p class='text-center'>今日回答最多的人</p>
        <div class="col-md-6 text-right">
            <img src="__PUBLIC__/images/1.jpg" alt="唯美图片1" height="50px" width='50px' />
        </div>
        <div class="col-md-6">
            <?php echo ($starUser["username"]); ?> LV<?php echo ($starUser["level"]); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 text-right">
            回答数；<?php echo ($starUser["answer"]); ?>
        </div>
        <div class="col-md-6">
            采纳率：<?php echo round($starUser['adopt'] / $starUser['answer'] * 100, 1);?>%
        </div>
    </div>
    <hr>
    <div class="row">
        <p class='text-center'>历史回答最多的人</p>
        <?php 'SELECT `id`, `username`, `answer`, `face`, `answer`, `adopt` FROM `hd_user` GROUP BY `username` ORDER BY `answer` DESC LIMIT 1'; $result = M()->query($sql); $result = $result[0]; $result['level'] = exp_to_level($result['exp']); ?>
        <div class="col-md-6 text-right">
            <a href="<?php echo U('Member/index', array('id' => $result['id']));?>"><img src="__PUBLIC__/images/1.jpg" alt="唯美图片1" height="50px" width='50px' /></a>
        </div>
        <div class="col-md-6">
            <?php echo ($result["username"]); ?> LV<?php echo ($result["level"]); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 text-right">
            回答数；<?php echo ($result["answer"]); ?>
        </div>
        <div class="col-md-6">
            采纳率：<?php echo round($result['adopt'] / $result['answer'] * 100);?>%
        </div>
    </div>
    <hr>
    <?php $sql = 'SELECT `id`, `username`, `answer` FROM `hd_user` GROUP BY `username` ORDER BY `answer` DESC LIMIT 10'; $result = M()->query($sql); ?>
    <div class="row">
        <h4 class="text-center">问答助人光荣榜</h4>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 text-right">
            用户名
        </div>
        <div class="col-md-6">
            帮助过的人数
        </div>
    </div>
    <br>
    <div class="row">
                <?php if(is_array($result)): foreach($result as $key=>$v): ?><div class="col-md-6 text-right">
            <a href="<?php echo U('Member/index', array('id' => $v['id']));?>"><?php echo ($v["username"]); ?></a>
        </div>
        <div class="col-md-6">
            <?php echo ($v["answer"]); ?>
        </div><?php endforeach; endif; ?>
    </div>
</div>
<!-- 右边结束 -->

        <!-- 右边结束 -->
    </div>
    </div>
    <!-- 主题部分结束 -->
    <!-- 底部开始 -->
    <!-- 底部开始 -->
<div class="panel panel-default">
    <div class="panel-footer text-center">
        <p class="muted">Copyright © 2013 houdunwang.Com All Rights Reserved 后盾网</p>
        <p class="muted">京ICP备10027771号-1</p>
    </div>
</div>
<!-- 底部结束 -->
<!-- 登录弹出框开始 -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo U('Common/login');?>" class="form-inline" method='post'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">登录</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        用户名：
                        <input class='form-control' name='account' type="text">
                    </p>
                    <p class="text-center">
                        密　码：
                        <input class='form-control' name='password' type="text">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">登录</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 登录弹出框结束 -->
<!-- 注册弹出框开始 -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo U('Common/register');?>" class="form-inline" method='post'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">注册</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        　用户名：
                        <input class='form-control' name='account' type="text">
                    </p>
                    <p class="text-center">
                        　用户名：
                        <input class='form-control' name='username' type="text">
                    </p>
                    <p class="text-center">
                        　密　码：
                        <input class='form-control' name='password' type="text">
                    </p>
                    <p class="text-center">
                        确认密码：
                        <input class='form-control' name='repassword' type="text">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">注册</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 注册弹出框结束 -->

    <!-- 底部结束 -->
</body>

</html>
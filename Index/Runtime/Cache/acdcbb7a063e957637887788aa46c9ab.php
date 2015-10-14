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
    <!-- 导航开始 -->
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">涛涛问答系统</a>
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
                <li class="active"><a href="#">问答首页 <span class="sr-only">(current)</span></a></li>
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
    <!-- 主题部分开始 -->
    <div class="container">
        <div class="row">
            <form action="<?php echo U('Ask/runAddAsk');?>" method="post">
                <input type="hidden" name='cid' value='0'/>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3>向网友提问</h3>
                    <textarea name="content" id="" cols="30" rows="4" class='form-control' required></textarea>
                    <div class="row">
                        <div class="col-md-4">
                            <span class='btn btn-xs btn-warning select_category' data-toggle="modal" data-target="#category">选择分类</span>
                        </div>
                        <div class="col-md-4 text-right">我的金币：0</div>
                        <div class="col-md-4 text-right">悬赏
                            <select name="reward">
                                <option value="0">0</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="80">80</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <p class="text-right">
                        <input type="submit" class="btn btn-primary" value='提交'>
                    </p>
                </div>
                <div class="col-md-3"></div>
            </form>
        </div>
    </div>
    <!-- 主题部分结束 -->
    <hr>
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

    <!-- 分类选择弹出框开始 -->
    <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">选择分类</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="category" size="16">
                                <?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="category" size="16">
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="category" size="16">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
                    <!-- <button type="button" class="btn btn-primary">确定</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- 分类选择弹出框结束 -->
    <!-- 底部结束 -->
</body>

</html>
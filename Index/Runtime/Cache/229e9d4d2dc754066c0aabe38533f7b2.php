<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
    <!-- 主题部分开始 -->
    <div class="container">
        <div class="row">
            <!-- 左边开始 -->
            <div class="col-md-3 panel panel-default">
                <div class="row">
                    <br>
                    <div class="col-md-5 text-center">
                        <img src="__PUBLIC__/images/1.jpg" height='50px' width='50px'>
                    </div>
                    <div class="col-md-7">
                        <p><?php echo ($user["username"]); ?></p>
                        <p class="muted">金币：<?php echo ($user["point"]); ?></p>
                        <p class="muted">经验值：<?php echo ($user["exp"]); ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 text-center">回答数
                        <p><?php echo ($user["answer"]); ?></p>
                    </div>
                    <div class="col-md-4 text-center">采纳率
                        <p><?php echo ($user["adopt"]); ?></p>
                    </div>
                    <div class="col-md-4 text-center">提问数
                        <p><?php echo ($user["ask"]); ?></p>
                    </div>
                </div>
                <hr>
                <div class="list-group">
                    <a href="#" class="list-group-item active">我的首页</a>
                    <a href="#" class="list-group-item">我的提问</a>
                    <a href="#" class="list-group-item">我的回答</a>
                    <a href="#" class="list-group-item">我的等级</a>
                    <a href="#" class="list-group-item">我的金币</a>
                </div>
            </div>
            <!-- 左边结束 -->
            <!-- 右边开始 -->
            <div class="col-md-9">
                <h4 class="text-muted">我的首页</h4>
                <div class="row">
                    <div class="col-md-4">金币：<?php echo ($user["point"]); ?></div>
                    <div class="col-md-4">经验值：<?php echo ($user["exp"]); ?></div>
                    <div class="col-md-4">采纳率：<?php echo ($user["adopt"]); ?></div>
                </div>
                <br>
                <small>我的提问 <span class="text-muted">(共3条)</span></small>
                <hr>
                <div class="row">
                    <div class="col-md-6">标题</div>
                    <div class="col-md-2">回答</div>
                    <div class="col-md-4">更新时间</div>
                </div>
                <br>
                <?php if(is_array($ask)): foreach($ask as $key=>$v): ?><div class="row">
                        <div class="col-md-6"><a href="<?php echo U('Show/index',array('id'=>$v['id']));?>"><?php echo ($v["content"]); ?></a> <span class="text-muted">[<?php echo ($v["name"]); ?>]</span></div>
                        <div class="col-md-2"><?php echo ($v["answer"]); ?></div>
                        <div class="col-md-4"><?php echo ($v["time"]); ?></div>
                    </div>
                    <br><?php endforeach; endif; ?>
                <hr>
                <small>我的回答 <span class="text-muted">(共3条)</span></small>
                <hr>
                <div class="row">
                    <div class="col-md-6">标题</div>
                    <div class="col-md-2">回答</div>
                    <div class="col-md-4">更新时间</div>
                </div>
                <br>
                <?php if(is_array($my_answer)): foreach($my_answer as $key=>$v): ?><div class="row">
                        <div class="col-md-6"><a href="<?php echo U('Show/index',array('id'=>$v['id']));?>"><?php echo ($v["content"]); ?></a> <span class="text-muted">[<?php echo ($v["name"]); ?>]</span></div>
                        <div class="col-md-2"><?php echo ($v["answer"]); ?></div>
                        <div class="col-md-4"><?php echo ($v["time"]); ?></div>
                    </div>
                    <br><?php endforeach; endif; ?>
            </div>
            <!-- 右边结束 -->
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

    <!-- 底部结束 -->
</body>

</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>涛涛问答列表页</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
    <script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <style type="text/css">
    body{
        margin-top: 150px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- 左部开始 -->
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <form action="<?php echo U('Login/checkAccount');?>" class="form-signin" method='post' name="login">
                    <h2 class="form-signin-heading">后台登录</h2>
                    <input type="text" class="form-control" placeholder="用户名" name="account" required autofocus>
                    <input type="password" class="form-control" placeholder="密码" name="password" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- /container -->
</body>

</html>
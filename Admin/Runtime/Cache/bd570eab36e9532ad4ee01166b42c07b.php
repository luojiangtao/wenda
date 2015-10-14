<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>网站设置</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
    <link rel="stylesheet" href="__PUBLIC__/css/admin_index.css">
    <script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="panel panel-info">
        <div class="panel-heading text-center">
            网站设置
        </div>
        <form action="<?php echo U('Reward/editConfig');?>" method="post" class="form-inline">
            <table class="table table-bordered table-hover">
                <tr>
                    <td class='text-right' width="50%">网站名称：</td>
                    <td>
                        <input class='form-control' type="text" name='WEBNAME' value="<?php echo (C("WEBNAME")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">网站关键字：</td>
                    <td>
                        <input class='form-control' type="text" name='KEYWORDS' value="<?php echo (C("KEYWORDS")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">网站描述：</td>
                    <td>
                        <input class='form-control' type="text" name='DISCRIPTION' value="<?php echo (C("DISCRIPTION")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">版权信息：</td>
                    <td>
                        <input class='form-control' type="text" name='COPY' value="<?php echo (C("COPY")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">备案号：</td>
                    <td>
                        <input class='form-control' type="text" name='RECORD' value="<?php echo (C("RECORD")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">是否开放注册：</td>
                    <td>
                       开放：<input class='form-control' type="radio" name='REGIS_ON' value="1" <?php if(C("REGIS_ON")== 1): ?>checked="checked"<?php endif; ?>/>
                       关闭：<input class='form-control' type="radio" name='REGIS_ON' value="0"  <?php if(C("REGIS_ON")== 0): ?>checked="checked"<?php endif; ?>/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">网站状态：</td>
                    <td>
                       开放：<input class='form-control' type="radio" name='WEB_STATE' value="1" <?php if(C("WEB_STATE")== 1): ?>checked="checked"<?php endif; ?>/>
                       维护中：<input class='form-control' type="radio" name='WEB_STATE' value="0" <?php if(C("WEB_STATE")== 0): ?>checked="checked"<?php endif; ?>/>
                    </td>
                </tr>
                <tr class="text-center">
                    <td colspan='2'>
                        <input class='btn btn-info' type="submit" value="确定">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
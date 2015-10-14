<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>添加子分类</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
    <link rel="stylesheet" href="__PUBLIC__/css/admin_index.css">
    <script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="panel panel-info">
        <div class="panel-heading text-center">
            添加<b>【<?php echo ($category); ?>】</b>的子分类
        </div>
        <form action="<?php echo U('Category/runAddCategory');?>" method="post">
            <input type="hidden" name="pid" value="<?php echo ($pid); ?>" />
            <table class="table table-bordered table-hover">
                <tr>
                    <td class='text-right'>分类名称：</td>
                    <td>
                        <input class='form-control' type="text" name='name' />
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
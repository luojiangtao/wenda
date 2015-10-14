<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>奖励规则设置</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
    <link rel="stylesheet" href="__PUBLIC__/css/admin_index.css">
    <script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="panel panel-info">
        <div class="panel-heading text-center">
            奖励规则设置
        </div>
        <form action="<?php echo U('Reward/editConfig');?>" method="post" class="form-inline">
            <table class="table table-bordered table-hover">
                <tr>
                    <td class='text-right' width="50%">回答：</td>
                    <td>
                        + <input class='form-control' type="text" name='ANSWER' value="<?php echo (C("ANSWER")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">回答被采纳：</td>
                    <td>
                        + <input class='form-control' type="text" name='ADOPT' value="<?php echo (C("ADOPT")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">回答被删除：</td>
                    <td>
                        - <input class='form-control' type="text" name='DEL_ANSWER' value="<?php echo (C("DEL_ANSWER")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">提问被删除：</td>
                    <td>
                        - <input class='form-control' type="text" name='DEL_ASK' value="<?php echo (C("DEL_ASK")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">采纳回答被删除：</td>
                    <td>
                       提问者： - <input class='form-control' type="text" name='DEL_ADOPT_ASK' value="<?php echo (C("DEL_ADOPT_ASK")); ?>" required/>
                       回答者： - <input class='form-control' type="text" name='DEL_ADOPT_ANSWER' value="<?php echo (C("DEL_ADOPT_ANSWER")); ?>" required/>
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
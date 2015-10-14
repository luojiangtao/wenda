<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>经验级别规则设置</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
    <link rel="stylesheet" href="__PUBLIC__/css/admin_index.css">
    <script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="panel panel-info">
        <div class="panel-heading text-center">
            经验级别规则设置
        </div>
        <form action="<?php echo U('Reward/editConfig');?>" method="post" class="form-inline">
            <table class="table table-bordered table-hover">
                <tr>
                    <td class='text-right' width="50%">登录：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV_LOGIN' value="<?php echo (C("LV_LOGIN")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">提问：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV_ASK' value="<?php echo (C("LV_ASK")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">回答：</td>
                    <td>
                        -
                        <input class='form-control' type="text" name='LV_ANSWER' value="<?php echo (C("LV_ANSWER")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right' width="50%">采纳：</td>
                    <td>
                        -
                        <input class='form-control' type="text" name='LV_ADOPT' value="<?php echo (C("LV_ADOPT")); ?>" required/>
                    </td>
                </tr>
            </table>
            <p class="text-center">各等级所需经验</p>
            <table class="table table-bordered table-hover">
                <tr>
                    <td class='text-right'>LV1：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV1' value="<?php echo (C("LV1")); ?>" required/>
                    </td>
                    <td class='text-right'>LV2：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV2' value="<?php echo (C("LV2")); ?>" required/>
                    </td>
                    <td class='text-right'>LV3：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV3' value="<?php echo (C("LV3")); ?>" required/>
                    </td>
                    <td class='text-right'>LV4：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV4' value="<?php echo (C("LV4")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right'>LV5：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV5' value="<?php echo (C("LV5")); ?>" required/>
                    </td>
                    <td class='text-right'>LV6：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV6' value="<?php echo (C("LV6")); ?>" required/>
                    </td>
                    <td class='text-right'>LV7：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV7' value="<?php echo (C("LV7")); ?>" required/>
                    </td>
                    <td class='text-right'>LV8：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV8' value="<?php echo (C("LV8")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right'>LV9：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV9' value="<?php echo (C("LV9")); ?>" required/>
                    </td>
                    <td class='text-right'>LV10：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV10' value="<?php echo (C("LV10")); ?>" required/>
                    </td>
                    <td class='text-right'>LV11：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV11' value="<?php echo (C("LV11")); ?>" required/>
                    </td>
                    <td class='text-right'>LV12：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV12' value="<?php echo (C("LV12")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right'>LV13：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV13' value="<?php echo (C("LV13")); ?>" required/>
                    </td>
                    <td class='text-right'>LV14：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV14' value="<?php echo (C("LV14")); ?>" required/>
                    </td>
                    <td class='text-right'>LV15：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV15' value="<?php echo (C("LV15")); ?>" required/>
                    </td>
                    <td class='text-right'>LV16：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV16' value="<?php echo (C("LV16")); ?>" required/>
                    </td>
                </tr>
                <tr>
                    <td class='text-right'>LV17：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV17' value="<?php echo (C("LV17")); ?>" required/>
                    </td>
                    <td class='text-right'>LV18：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV18' value="<?php echo (C("LV18")); ?>" required/>
                    </td>
                    <td class='text-right'>LV19：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV19' value="<?php echo (C("LV19")); ?>" required/>
                    </td>
                    <td class='text-right'>LV20：</td>
                    <td>
                        +
                        <input class='form-control' type="text" name='LV20' value="<?php echo (C("LV20")); ?>" required/>
                    </td>
                </tr>
                <tr class="text-center">
                    <td colspan='8'>
                        <input class='btn btn-info' type="submit" value="确定">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
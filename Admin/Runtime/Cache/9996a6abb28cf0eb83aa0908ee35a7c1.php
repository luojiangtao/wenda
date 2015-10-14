<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>问题分类列表</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
    <link rel="stylesheet" href="__PUBLIC__/css/admin_index.css">
    <script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/js/admin_index.js"></script>
    <style type="text/css">
        .operation{
            cursor: pointer;
            text-align: center;
            border: 1px solid #670768;
        }
    </style>
    <script>
    $(function() {
        $('tr[pid!=0]').hide();
        $('.operation').click(function(){
            var index = $(this).parents('tr').attr('id');
            var isOpen = parseInt($(this).parents('tr').attr('isOpen'));
            if(isOpen){
                $('tr[pid='+index+']').hide(1000);
                $(this).parents('tr').attr('isOpen','0');
                $(this).html('+');
            //alert(isOpen);
            }else{
                $('tr[pid='+index+']').show(1000);
                $(this).parents('tr').attr('isOpen','1');
                $(this).html('-');
            }
            //$(this).html("-");
        });

        $('.delete').click(function(){
            return confirm('确认删除该分类？');
        });
    });
    </script>
</head>

<body>
    <div class="panel panel-info">
        <div class="panel-heading text-center">
            问题分类列表
        </div>
        <table class="table table-bordered table-hover">
            <tr pid="0">
                <td>收缩/展开</td>
                <td>ID</td>
                <td>分类名称</td>
                <td>操作</td>
            </tr>
            <?php if(is_array($category)): foreach($category as $key=>$v): ?><tr id="<?php echo ($v["id"]); ?>" pid="<?php echo ($v["pid"]); ?>" level="<?php echo ($v["level"]); ?>" isOpen="0">
                    <td><?php echo ($v["html"]); ?><span class="operation">+</span></td>
                    <td><?php echo ($v["id"]); ?></td>
                    <td><?php echo ($v["html"]); echo ($v["name"]); ?></td>
                    <td>
                        <a href="<?php echo U('Category/addChildCategory',array('id'=>$v['id']));?>">
                            <button class="btn btn-primary">添加子分类</button>
                        </a>
                        <a href="<?php echo U('Category/editCategory',array('id'=>$v['id']));?>">
                            <button class="btn btn-info">修改</button>
                        </a>
                        <a href="<?php echo U('Category/deleteCategory',array('id'=>$v['id']));?>">
                            <button class="btn btn-danger delete">删除</button>
                        </a>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
        </form>
    </div>
</body>

</html>
$(function() {
    //提问页面，选择分类
    var category_id=0;
    $('select[name=category]').change(function() {
        var obj = $(this);
        var id = obj.val();
        var select_category=$('.select_category');
        var category_name=$(this).find("option:selected").text();
        send_data = {
            id: id,
        };
        $.post(getCategoryChild, send_data, function(get_data) {
            if (get_data) {
                var option = '';
                $.each(get_data, function(i, k) {
                    option += "<option value='" + k.id + "'>" + k.name + "</option>";
                });
                obj.parent().next().children().html(option);
            }
        }, 'json');
        category_id=$(this).val();

        $('input[name=cid]').val(category_id);
        select_category.text(category_name);
    });

    $('input[type=submit]').click(function(){
    	var cid=$('input[type=hidden]').val();
    	if(cid ==0){
    		alert('请选择分类');
    		return false;
    	}

    	if(!isLogin){
    		$('.login').click();
    		return false;
    	}
    });
    var opt = $('select[name=reward] option');
    var reward=parseInt($('.myreward').html());
    for(var i=0;i<opt.length;i++ ){
        if(opt.eq(i).val()>reward){
            opt.eq(i).attr('disabled','disabled');
        }
    }
});

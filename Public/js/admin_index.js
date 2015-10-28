$(function(){
//初始化窗口
	window_resize();
	$(window).resize(function () {
		window_resize();
		//alert($('#right').height());
	});
});
/**
 *  窗口定位
 */
function window_resize(){
	$('#left').height($(window).height() - 101);
	//$('.body').height($(window).height() - 501);
	$('#right').width($(window).width() - 201).height($(window).height() - 101);

}
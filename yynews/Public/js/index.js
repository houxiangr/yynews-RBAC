//图片编号
var pic_no = 0;
window.addEventListener('load', function(){
	//实现自动轮播
	sh = setInterval(auto, 4000);
	//当鼠标悬停在图片上时，停止轮播
	$(".pic").mouseover(function ()
	{
	    clearInterval(sh);
	}
	);
	$("#contral_box").mouseover(function ()
	{
	    clearInterval(sh);
	}
	);
	$(".switch").mouseover(function ()
	{
	    clearInterval(sh);
	}
	);
	//当鼠标离开图片时开始轮播
	$(".pic").mouseout(function ()
	{
	    sh = setInterval(auto, 4000);
	}
	);
	$("#contral_box").mouseout(function ()
	{
	    sh = setInterval(auto, 4000);
	}
	);
	$(".switch").mouseout(function ()
	{
	    sh = setInterval(auto, 4000);
	}
	);
}, true);

	function switchpic(n)
	{
	//改变轮播的样式
	var contral_active = $(".contral_active");
	contral_active.removeClass("contral_active");
	var contral = $("#contral_" + n);
	contral.addClass("contral_active");
	//改变图片样式
	var pic_active = $(".pic_active");
	pic_active.removeClass("pic_active");
	var pic = $("#pic_" + n);
	pic.addClass("pic_active");
	//改变右侧轮换样式
	var switch_active = $(".switch_active");
	switch_active.removeClass("switch_active");
	var switch_ = $("#switch_" + n);
	switch_.addClass("switch_active");
	//改变背景图样式
	var bg_image_active = $(".bg_image_active");
	bg_image_active.removeClass("bg_image_active");
	var bg_image = $("#bg_image_" + n);
	bg_image.addClass("bg_image_active");
	pic_no = n;
	//console.log(pic_no);
	}
	//轮播自动实现
	function auto()
	{
	//改变pic序号
	pic_no = pic_no + 1;
	if (pic_no == 7)
	{
	    pic_no = 1;
	}
	switchpic(pic_no);
	}

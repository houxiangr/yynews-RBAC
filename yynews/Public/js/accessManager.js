window.addEventListener('load', function(){
	$(".modify_access").click(function(){
		var thistr=$(this).parent().parent();
		if($(this).text()=="修改"){
			thistr.children(".name_td").children(".content").addClass("hidden");
			thistr.children(".url_td").children(".content").addClass("hidden");
			thistr.children(".status_td").children(".content").addClass("hidden");
			thistr.children(".name_td").children(".modify_input").removeClass("hidden");
			thistr.children(".url_td").children(".modify_input").removeClass("hidden");
			thistr.children(".status_td").children(".modify_input").removeClass("hidden");
			$(this).text("确认修改");
		}else if($(this).text()=="确认修改"){
			var access_name=thistr.children(".name_td").children(".modify_input")[0].value;
			var access_url=thistr.children(".url_td").children(".modify_input")[0].value;
			var access_status=thistr.children(".status_td").children(".modify_input")[0].value;
			var access_id=thistr.children(".id_td").children(".modify_input")[0].value;
			if(access_name==""){
				alert("权限名不能为空");
				return;
			}
			if(access_url==""){
				alert("权限链接不能为空");
				return;
			}
			if(access_status!=1&&access_status!=0){
				alert("可用状态只能用1或0表示，1表示可用，0表示不可用");
				return;
			}
			thistr.children(".name_td").children(".content").removeClass("hidden");
			thistr.children(".url_td").children(".content").removeClass("hidden");
			thistr.children(".status_td").children(".content").removeClass("hidden");
			thistr.children(".name_td").children(".modify_input").addClass("hidden");
			thistr.children(".url_td").children(".modify_input").addClass("hidden");
			thistr.children(".status_td").children(".modify_input").addClass("hidden");
			$.ajax({
				type:"POST",
                url:"http://localhost/yynews/index.php/Admin/RBAC/accessModify",
                data:{
                    newName:access_name,
                    accessId:access_id,
                    url:access_url,
                    status:access_status
                },
                dataType:"json",
                success:function(data){
            		thistr.children(".name_td").children(".content").text(access_name);
            		thistr.children(".url_td").children(".content").text(access_url);
            		thistr.children(".status_td").children(".content").text(access_status);
            		$("#updata_time_content").text(data[0].updata_time);
                },
                error:function(jqXHR){
                    alert("发生错误：" + jqXHR.status + "服务器连接错误");
                },
			});
			$(this).text("修改");
		}
	});
}, true);
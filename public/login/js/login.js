// JavaScript Document
//支持Enter键登录
		document.onkeydown = function(e){
			if($(".bac").length==0)
			{
				if(!e) e = window.event;
				if((e.keyCode || e.which) == 13){
					var obtnLogin=document.getElementById("submit_btn")
					obtnLogin.focus();
				}
			}
		}

    	$(function(){
			//提交表单
			$('#submit_btn').click(function(){

				var checkbox = '';
				if($("input[type='checkbox']").is(':checked')){
					checkbox = 'ok';
				}
				if($('#username').val() == ''){
					show_err_msg('用户名还没填呢！');
					$('#username').focus();
				}else if($('#password').val() == ''){
					show_err_msg('密码还没填呢！');
					$('#password').focus();
				}else{
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
//                设置laravel的CSFR验证
					$.post("http://webchat.joker1996.com/User/judge",
//                          ajax的post请求到User/judge路由
						{
							username: $('#username').val(),
//                          传用户名
							password: $('#password').val(),
//                          传用户密码
							code:$('#j_captcha').val(),
//							传验证码
							checkbox: checkbox
						//	传cookie
						},
						function (data, status) {
							if (status == 'success'){
								switch(data)
								{
									case 'username':
										show_err_msg('用户名不存在，请重新输入！');
										break;
									case 'password':

										show_err_msg('密码错误！请重新输入！');
										break;
									case 'code':
										show_err_msg('验证码错误，请重新输入！');
										break;
									default:

									show_loading();
									show_msg('登录成功咯！  正在为您跳转...','http://webchat.joker1996.com/User/chatlist');
								}
							}
							
						});
					//ajax提交表单，#login_form为表单的ID。 如：$('#login_form').ajaxSubmit(function(data) { ... });
					// show_msg('登录成功咯！  正在为您跳转...','http://webchat.joker1996.com/User/judge');
				}
			});
		});
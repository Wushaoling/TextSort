<?php
require_once 'ihome/cs.php';
echo '<img src="'._cnzzTrackPageView(1260107436).'" width="0" height="0"/>';
?>
<!DOCTYPE html>
<head>
	<title>获取token</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">获取token</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30">				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<input type="text" class="form-control" id="id_name" placeholder="姓名">
		            </div>		            	            
		          </div>              
		        </div>
				<div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<input type="text" class="form-control" id="id_id" placeholder="12位学号" onkeypress="getKey();">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input style="float:right" type="button" onclick="sendMsg()" value="确定" class="btn btn-info" id="id_ok">
		          	</div>
		          </div>
		        </div>
		        <hr>
		        <div class="form-group">
		        </div>
		      </form>
			  <div class="text-center">
				<font size="6" color="#000000" id="show"></font>
		      </div>
		</div>
	</div>
	<script>
		function getKey(){
			if (event.keyCode == 13){
				event.returnValue=false;
				event.cancel = true;
				var btn = document.getElementById('id_ok');
				btn.focus();
				btn.click();
			}
		}
		function sendMsg() {	
			var s_name = document.getElementById('id_name').value;
			var s_id = document.getElementById('id_id').value;
			if("姓名" == s_name){
				alert("姓名不能为空");
				return;
			}
			if("学号" == s_id){
				alert("学号不能为空");
				return;
			}
			$.ajax({
				type:"POST",
				url:"getToken.php",
				data:{s_name: s_name,  s_id : s_id},
				dataType:"text",
				success: function(data){ 
					$('#show').empty();
					$('#show').append(data);
				}
			});
		}
	</script>
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>

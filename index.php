<html>
	<head>
		<title>OPEN DESK - UOJ</title>
		
		<script language="javascript" type="text/javascript">
					
			
			var httpObject=false;
			if(window.XMLHttpRequest){
				httpObject = new XMLHttpRequest();
			}else if(window.ActiveXObject){
				httpObject = new ActiveXObject("Microsoft.XMLHttp");
			}
			
			function send_login(){
				
				var uname = document.getElementById('uname').value;
				var pword = document.getElementById('pword').value;
				var queryString = "?uname=" + uname ;
				queryString +=  "&pword=" + pword;
	
				httpObject.onreadystatechange = function(){
					if(httpObject.readyState == 4 && httpObject.status == 200){
						var error = document.getElementById('error');
						var response = httpObject.responseText;
						
						if(response == "1"){
							window.location.href="home.php";
						}
						else{
							error.innerHTML = "Sorry, Invalid Login.";
						}
					}
				}
				httpObject.open("GET", "login.php"+queryString ,true);
				httpObject.send(null);
				var loadingdiv = document.getElementById('loading');
				loadingdiv.style.display = "none";
			}
		</script>
		
		
	</head>
	
	<body>
	
		<input type="text" id="uname" placeholder="username" />
		<input type="password" id="pword" placeholder="password" />
		<input type="button" onclick="send_login()" value="Login">
		<div id='loading' style='display: none'><img src="loading.gif" title="Loading" /></div>
		<div id="error"></div>
	</body>
</html>
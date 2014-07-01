<?php
session_start();
	if(!isset($_SESSION['id'])){
		header("Location:index.php");
	}
?>

<html>
	<head>
		<script language="javascript" type="text/javascript">
			var httpObject=false;
			if(window.XMLHttpRequest){
				httpObject = new XMLHttpRequest();
			}else if(window.ActiveXObject){
				httpObject = new ActiveXObject("Microsoft.XMLHttp");
			}
			
			function logout(){
				if(httpObject.readyState == 4 && httpObject.status == 200){
						var response = httpObject.responseText;
						
						if(response == "logout"){
							window.location.href="index.php";
							
						}
						else{
							error.innerHTML = "Sorry, Invalid Login.";
						}
					}
			}
			httpObject.open("GET", "logout.php" ,true);
			httpObject.send(null);
		</script>
		
		<!-- Prevent from Back -->
		<script>
			function preventBack(){window.history.forward();}
			setTimeout("preventBack()", 0);
			window.onunload=function(){null};
		</script>
		<!-- end -->
		
	</head>
	<body>
		<input type="button" value="Logout" onclick="logout()"/>
	</body>
</html>
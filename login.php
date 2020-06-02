<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<link href="style/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class="header-w3l">
		<img src="images/DBase_Logo.png" width="70%">
	</div>
<div class="main-content-agile">
	<div class="sub-main-w3">	
		<form method="POST" name="login" action="config\server.php?p=login">
			<input placeholder="Username" name="Username" class="user" type="text" required=""><br>
			<input  placeholder="Password" name="Password" class="pass" type="password" required=""><br>
			<input type="submit" value="">
		</form>
	</div>
</div>
<div class="footer">
	<p>&copy; <?php echo date('Y');?> | Dito Cahya Pratama</p>
</div>
</body>
</html>
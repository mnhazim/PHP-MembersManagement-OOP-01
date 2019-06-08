<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistem Pengurusan Ahli</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link href="bootstrap/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
	<div class="container">
		<form class="form-signin" method="post" action="controller/control.php?mod=login">
		    <h1 class="h3 mb-3 font-weight-normal">SISTEM<br>PENDAFTARAN AHLI</h1>
		    <label for="inputEmail" class="sr-only">Email address</label>
		    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus autocomplete="off">
		    <label for="inputPassword" class="sr-only">Password</label>
		    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
		    <div class="checkbox mb-3">
		      <p class="text-danger">admin@gmail.com|admin</p>
		    </div>
		    <button class="btn btn-lg btn-primary btn-block" type="submit">Log Masuk</button>
		    Tiada akaun? sila klik <a href="ahli/daftar.php">Daftar Baru</a>
		
		    	
		   
		    
		    <div class="mt-5 mb-3">
			    <img class="" src="store/bootstrap.png" width="30%" height="auto">
			    <img class="" src="store/php.png" width="30%" height="auto">
			    <img class="" src="store/mysql.png" width="30%" height="auto">
			    <p class="text-muted"><a href="https://github.com/mnhazim">github.com/mnhazim</a> &copy; 2019</p>
		    </div>
		</form>
	</div>
</body>
</html>
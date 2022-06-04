
<html>
<head>
<title>Prijavi se</title>
	<meta name="author" content="Karlo Klaic 0246095024">

	<style>
	   
        h2{
            font-size:50px;
            text-align: center;
        }
        .forma{
            margin:auto;
            width:50%;
        }
        form{
            width:25%;
            margin:0 auto;
            
        }
        input{
            margin:15px auto;
        }
        button{
            width:50%;
            margin:0 auto;
        }
       

		
	</style>
</head>
<body>
<h2>Prijavi se</h2>
<div class="forma">
<form action="" method="post">
	<div class="block">
		<input id="name" name="username" type="text" placeholder="korisničko ime">
	</div>
	<div class="block">
		<input id="password" name="password" placeholder="lozinka" type="password">
	</div>
	<input name="submit" type="submit" value=" Prijavi se "> </br>
	<a href="register.php">Izradi korisnički račun</a> 
</form>
</div>
</body>
</html>

<?php
$username="";
$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["username"]) || (empty($ans["password"])))  {
        	echo "Ispunite sva polja";
    		}
	else {
		$username= $ans["username"];
		$password= $ans["password"];
	
		auth($username,$password);
	}
}
function auth($username, $password) {
	$xml=simplexml_load_file("users.xml");
	foreach ($xml->user as $user) {
  	 	$usrn = $user->username;
		$usrp = $user->password;
		if($usrn==$username){
			if($usrp == $password){
				header("Location: test.html");
				return;
				}
			else{
				echo "Pokusaj ponovo!";
				return;
				}
			}
		}
		
	echo "Korisnik ne postoji.";
	return;
}
?>

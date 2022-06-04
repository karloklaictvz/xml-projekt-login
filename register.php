
<!DOCTYPE html>    
<html>    
<head>    
    <meta name="author" content="Karlo Klaic 0246095024">
    <title>Registracija</title>
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
    <h2>Registriraj se</h2>   
    <div class="forma">    
    <form method="post">    
        <input type="text" name="username" placeholder="Korisnicko ime">           
        <input type="Password" name="password" placeholder="Sifra"> </br>
        <button type="submit" name="button">Registriraj se</button> </br>  </br>  
        <a href="login.php">Prijavi se</a>  
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
		append($username,$password);
	}
    }
function append($username, $password) {
$xml = simplexml_load_file("users.xml");
    foreach ($xml->user as $user) {
        $usrn = $user->username;
     $usrp = $user->password;
     if($usrn==$username){
        echo "Korisnik je vec registriran!";
        }
    }
       
        $child = $xml->addChild("user");
        $child->addChild("username", $username);
        $child->addChild("password", $password);
        $doc = new DOMDocument("1.0");
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;
        $doc->loadXML($xml->asXML());
        $doc->save("users.xml");


}
?>
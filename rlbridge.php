<!DOCTYPE HTML>

<?php 
 session_start();
 $id=$_SESSION["id"];
 if(isset($_POST['logout']))
 {
	 //$_SESSION["id"].unset();
	 session_destroy();
	 header("location:homepage.html");
 }
?>





<html>
<head>
	<meta charset="UTF-8">
	<title>Successfull</title>
	<link rel="stylesheet" href="style.css" type="text/css"><link rel="stylesheet">
    <style>	
	.mdiv{

		position:absolute;
		top:320px;
		right:480px;
		z-index:125
		
	}

	.txt{
		
		color:white;
		font-family:gabriola;
		 font-size:20px;

	}

  .rotateIn {
   color:MediumSpringGreen;
  -webkit-animation-name: rotateIn;
  animation-name: rotateIn;
  -webkit-animation-duration: 10s;
  animation-duration: 5s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  }
  @-webkit-keyframes rotateIn {
  0% {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-transform: rotate3d(0, 0, 1, -200deg);
  transform: rotate3d(0, 0, 1, -200deg);
  opacity: 0;
  }
  100% {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-transform: none;
  transform: none;
  opacity: 1;
  }
  }
  @keyframes rotateIn {
  0% {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-transform: rotate3d(0, 0, 1, -200deg);
  transform: rotate3d(0, 0, 1, -200deg);
  opacity: 0;
  }
  100% {
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-transform: none;
  transform: none;
  opacity: 1;
  }
  } 
  
  input[type=text]:focus,[type=password]:focus
{
    border: 2px solid blue;
    border-radius: 4px;
    background-color:black;
    color: white;
    font-size:20px;
    font-family:Monotype;
}

    input[type=button], input[type=submit], input[type=reset] {
    background-color: yellowgreen;
    border: none;
    color: blue;
    padding: 0px;
    margin: 0px;
    cursor: pointer;
    font-size:20px;
    font-family:Comic Sans MS;
    font-variant:small-caps;
    
}
	</style>
	
	<style>
	<link rel="stylesheet"  href="animate.css"  type="text/css">
	
	</style>
	
	<script>
	function f1()
	{
	 var fn=document.getElementById("fname").value;
     var ln=document.getElementById("lname").value;       
	 var mno=document.getElementById("mno").value;
  	 var ano=document.getElementById("ano").value;
	
	 
	 if (fn=="" || ln=="" || (!(isNaN(fn))) ||  (!(isNaN(ln))))
        {
         var msg=fn+" "+ln+" please fill your firstname and lastname details correctly ";
		 alert(msg);
		 return false;
		}		

     if ((mno.length<10)||(isNaN(mno)))
     {
       alert("Enter a valid mobile no");
       return false;
     } 
	  var RegE= /\d{4}\s\d{4}\s\d{4}\b/g;
	  if(ano.match(RegE))
	 {
		//alert("Valid Ano");
	 }
	 else
	 {
		 
		 alert("Invalid Aadhar number");
		 return false;
		 
	 }
	 
	 
      	
	}
	
	</script>
</head>


<body onsubmit="return f1()">
<?php 
$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name= "logreg";

$db_host="localhost";

$conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


	?>


    <div id="background">
		<div id="header">
			<div>
				<div>
					<a href="../../index.php" class="logo"><img src="logo.png" alt=""></a>
					<ul>
						<li>
							<a href="../../index.php" id="menu1">Home</a>
						</li>
						<li class="selected">
							<a href="../../register.php" id="menu2">Register</a>
						</li>
						<li>
							<a href="../../vote.php" id="menu3">Vote</a>
						</li>
						<li>
							<a href="../../announcements.php" id="menu4">Announcements</a>
						</li>
						<li>
							<a href="../../about.php" id="menu5">About</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="body">
		 <div>
		  <div>
		   <div class="media">
			   <div class="mdiv" style="height:10000px;">
                              <form method="post">
							    <h2> Your uniqid/Password is :</h2>
								<?php
								echo $id
								
								?>
								
								<br>
								<h2>The uniqid has  also been sent to your mail address </h2>
								
							  
							  
								</div>
								</div>
								
			
					
				 </div>
			</div>
		
		
		
	  </div>
	</div>
</body>
</html>
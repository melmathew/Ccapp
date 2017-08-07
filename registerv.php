<html>
<head>
	<meta charset="UTF-8">
	<title>Voter Registration</title>
	<link rel="stylesheet" href="style.css" type="text/css"><link rel="stylesheet" href="style.css" type="text/css">
    <style>	
.mdiv{
		
		position:absolute;
		top:320px;
		left:400px;
		right:400px;
		z-index:0;
		margin: 0 auto;
		background-color:white;
		border:12px  brown;
        border-top-style: ridge;  
        border-right-style: ridge;
        border-bottom-style: ridge;
        border-left-style: ridge;
		color:black
	}
	

	.txt{
		
		color:black;
		font-family:gabriola;
		 font-size:20px;

	}
	
	
	.mq{
		position:fixed;
		top:380px;
		right:110px;
		
	}
	
	
	.mq1{
		position:fixed;
		top:380px;
		left:110px;
		
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
    background-color:lightblue;
    color: black;
    font-size:15px;
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
    session_start();
    if( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])&& isset($_POST['mno'])
		&& isset($_POST['gr']) && isset($_POST['ano']))
	
   {
		
		    $fname = $_POST['fname'];
		    $lname = $_POST['lname'];
		    $email = $_POST['email'];
		    $gr = $_POST['gr'];
		    $mno = $_POST['mno'];
			$ano = $_POST['ano'];
		    $id=uniqid();
			
			$_SESSION["id"]=$id;
			
			$sql = "SELECT ano FROM info1 WHERE ano='$ano'";
			$query_run=$conn->query($sql);
			$esql = "SELECT email FROM info1 WHERE email='$email'";
			$equery_run=$conn->query($esql);
			
		 if ($equery_run->num_rows ==0)
		 {			 
           	if($query_run->num_rows == 0)
			{
		           
				$query = "INSERT INTO info1 (fname,lname,gr,email,mno,ano,id) 
				VALUES('$fname','$lname','$gr','$email','$mno','$ano','$id')";
				
				if($conn->query($query) == TRUE)
				{ 
				 echo '<h2><centre> Registration Succesful , Login to start </center></h2>';
			     $to = $email;
                 $subject  = 'Your uniqid';
                 $message  = 'Your unique id is  '.$id.'  Please note it down as 
				 this id will be used for future references';
                 $headers  = 'From:proj5014@gmail.com' . "\r\n" .
                            'MIME-Version: 1.0' . "\r\n" .
                            'Content-type: text/html; charset=utf-8';
                 if(mail($to, $subject, $message, $headers))
				    {   echo "Email sent";
				        header("location:rlbridge.php"); 
					}
                 else
                    {  echo "Email sending failed";			
				    } 	
                }		
				else 
				{ 
				echo '<h2> Couldn\'t Register :( </h2>'; 
				} 
			}
			else 
			{
				echo '<h2> Aadhar Id already registered. </h2>';
			}
		 }
		 else
		 {
				echo '<h2> Email Id already registered. </h2>';
			 
			 
		 }
			
	   
	}
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
		          
				   <div class="mq" style="height:380px;">
				    <MARQUEE direction="up" scrollamount="5"><IMG SRC="register/pic2.jpg"
				   HEIGHT=300 WIDTH=300 ALT="Idocs Guide to HTML"> </MARQUEE>
				   
				   </div>
				   
				   
				   
				   <div class="mq1" style="height:380px;">
				    <MARQUEE direction="up" scrollamount="5"><IMG SRC="register/pic4.jpg"
				   HEIGHT=300 WIDTH=300 ALT="Idocs Guide to HTML"> </MARQUEE>
				   
				   </div>
				   
				   
				   
				   
				   
			   <div class="mdiv" style="height:380px;">
                              <center> 
                              <span><h1 class="rotateIn">Voter Registration</h1></span>
                              <form method="post">
         
             
                               <span class="txt"> First Name : </span><br>
                                  <input type="text" name="fname"  id="fname"
								  placeholder="Enter your First name" size="50" required/> 
                                   <br>
              
                               <span class="txt">Last Name :</span><br>
                                   <input type="text" name="lname" id="lname"
								   placeholder="Enter your Last name" size="50" required/> 
                                   <br>
		                        <span class="txt">Gender :</p>
                                  <input type="radio" name="gr" value="male" id="gr"
								  required>Male</input>
                                  <input type="radio" name="gr"
								  value="female" required>Female</input>
                                  <br>
                                <span class="txt">Email :</span> <br>
                                <input type="text" name="email"
								id="email" placeholder="Enter your email"
								size="50" required
								pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required
								/> 
                                <br>
			 
			                     
			 
                                <span class="txt">Mobile No :</span><br>
                                <input type="text" name="mno" id="mno" 
								placeholder="Enter your Mobile no."  size="50" required/> 
                                <br>
								
								
								<span class="txt">Aadhar Number:</span><br>
                                <input type="text" name="ano" id="ano" 
								placeholder="Aadhar No : XXXX XXXX XXXX"  size="50" required/> 
                                <br>
								
                               <br>
                               <input type="submit" 
							   placeholder="Submit"/><br>
                               All fields are required.
							    </form>
                                </center> 
								</div>
								</div>
								
								
								
        

						
					
				 </div>
			</div>
		
		
		
	  </div>
	</div>
</body>
</html>
<html>

 <head>
 <title>RARA Service</title>
  <link rel="stylesheet" href="style.css" type="text/css">
 </head>

 <body>
		<div class="main">
			<div class="logo">
				<img src="logo.png">
			</div>
			<ul>
				<div class="lista">
				<li><a href="../Account/form.php">MyAccount</a></li>
				<li><a href="comments.html">Chat</a></li>
				<li><a href="../Contact/contact.html">Contact</a></li>
				<li><a href="../../home.php">Home</a></li>
				<li><a href="../../logout.php"> LOGOUT </a></li>
				</div>
			</ul>	
		</div>

  <form action="" method="POST">

   <label> Name: 
    <input type="text" name="Name" class="Input" style="width: 225px" required>
   </label>
   <br><br>
   <label> Message: <br>
    <textarea name="Comment" class="Input" style="width: 500px" required></textarea>
   </label>
   <br><br>
   <input type="submit" name="Submit" value="Sent message" class="Submit">

  </form>

 </body>

</html>

<?php

//if($_POST['submit'])

 {
  print "<h1>Your message has been sent!</h1>";
  $Name = $_POST['Name'];
  $Comment = $_POST['Comment'];
  $id = ''; 
if( isset( $_GET['id'])) {
    $id = $_GET['id']; 
} 

  #Get old comments
  $old = fopen("comments.txt", "r+t");
  $old_comments = fread($old, 1024);

  #Delete everything, write down new and old comments
  $write = fopen("comments.txt", "w+");
  $string = "<b>".$Name."</b><br>".$Comment."<br>\n".$old_comments;
  fwrite($write, $string);
  fclose($write);
  fclose($old);
 }

 #Read comments
 $read = fopen("comments.txt", "r+t");
 echo "<br><br>Comments<hr>".fread($read, 1024);
 fclose($read);

?>
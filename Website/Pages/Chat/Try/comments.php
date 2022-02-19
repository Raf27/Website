<html>

 <head>
  <link rel="stylesheet" href="style.css" type="text/css">
 </head>

 <body>
		<div class="main">
			<div class="logo">
				<img src="logo.png">
			</div>
			<ul>
				<div class="lista">
				<li><a href="../Account/account.html">MyAccount</a></li>
				<li><a href="../Chat/chat.html">Chat</a></li>
				<li><a href="contact.html">Contact</a></li>
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
    <textarea name="Comment" class="Input" style="width: 300px" required></textarea>
   </label>
   <br><br>
   <input type="submit" name="Submit" value="Sent message" class="Submit">

  </form>

 </body>

</html>


<?php
 
 if($_POST['Submit']){
  print "<h1>Your message has been sent!</h1>";

  $Name = $_POST['Name'];
  $Comment = $_POST['Message'];

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
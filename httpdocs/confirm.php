<?php
	use PHPMailer\PHPMailer\PHPMailer;
	function redirect() {
		header('Location: login.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		redirect();
	} else {
		$conn = new mysqli('198.71.225.62', 'bhupinderteach', 'Bhinda123', 'db');

		$email = $conn->real_escape_string($_GET['email']);
		$token = $conn->real_escape_string($_GET['token']);		
		$name = $conn->real_escape_string($_GET['name']);


		$sql = $conn->query("SELECT id FROM users WHERE email='$email' AND token='$token' AND isEmailConfirmed=0");

		if ($sql->num_rows > 0) {
			$conn->query("UPDATE users SET isEmailConfirmed=1, token='' WHERE email='$email'");
			echo 'Your email has been verified! You can log in now!';
			
                include_once "PHPMailer/src/PHPMailer.php";
			 $mail = new PHPMailer();
                $mail->setFrom('bhupindersingh7551@gmail.com');
                $mail->addAddress('bhupindersingh7551@gmail.com', $name);
                $mail->Subject = "New user register with Bhupinder Tech!";
                $mail->isHTML(true);  
				$mail->Body = "
			  <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<title>bhupindertech.</title>
</head>
<body style=\" font-family:'Trebuchet MS', Tahoma; margin: 0px; padding: 0px; font-size: 10pt; border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none;\">
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
	<tr>
    	<td width=\"322\" rowspan=\"18\">&nbsp;</td> 
        <td width=\"700\" align=\"center\">&nbsp;</td>
        <td width=\"386\" rowspan=\"18\">&nbsp;</td>    
	</tr>
    <tr>
    	</tr>
    <tr height=\"35\">
    	<td height=\"35\" align=\"right\" bgcolor=\"#036\" width=\"700\">
			<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"5\" style=\"font-size:18px; color:#FFFFFF; font-weight:bold; height:35px;\" bgcolor=\"#036\">
			<tr>
			  <td align=\"center\">
			New User Registered With Bhupinder Tech:
				 
				 </td>
        	</tr></table>    
		</td>
	</tr>
    <tr>
    	<td bgcolor=\"#FFFFFF\">
        	<table width=\"100%\" border=\"2px solid #036\" align=\"center\" cellpadding=\"5\" cellspacing=\"0\" height=\"100\">
            	<tr>
                	<td valign=\"top\">    
	                    					
						<p>User Name: ".$name."</p>
						<p>User Email: ".$email."</p>
						
	
					
					</td>
				</tr>
		  </table>
	  </td>
	</tr>
    <tr>
    	<td>
        	<table width=\"100%\" height=\"30\" border=\"0\" cellpadding=\"5\" cellspacing=\"5\" bgcolor=\"#036\" style=\"color:#FFFFFF;\">
           	  <tr><td height=\"30\" align=\"center\"><a href=\"http://www.bhupindertech.com\" style=\"color:#FFF; text-decoration:none;\">www.bhupindertech.com</a></td></tr>
			</table>        
        </td>
    </tr>  
</table>
   
                
</body>
</html>";
			   

                if ($mail->send())
                    $msg = "You have been registered! Please verify your email!";
                else
                    $msg = "Something wrong happened! Please try again!";
			
	                     header("Location: login.php"); 
		} else
			redirect();
	}
?>

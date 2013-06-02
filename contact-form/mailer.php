<?php

	//Includo Variabili
	$thanks 	= "www.sitename.com";

	session_start();
		
		$name 		= 	$_POST['name'];
		$email 		= 	$_POST['email'];
		$object 	= 	$_POST['object'];
		$message 	= 	$_POST['message'];
		$ip		=	$_SERVER['REMOTE_ADDR'];

	//Antispam 
	if($_POST['hidden'] != ""){
		echo('<p style="color: #000; font-size: 25px; font-weight: bold;">I imagine that you are a spammer!!!</p>');    
	}
	
	//Send mail
	else{
		$emailto 	= 'write@mail.here';
		$sbj 		= "ContactForm - $object";
		$msg 		= "
			<html>
			<head>
			<style type='text/css'>
				body{
				font-family:'Lucida Grande', Arial;
				color:#333;
				font-size:15px;
				}
			</style>
			</head>
			<body>
				<table width='600' border='0' cellspacing='0' cellpadding='5'>
				  <tr>
				    <td width='121' align='right' valign='baseline'><strong>Name:</strong></td>
				    <td width='459'>$name</td>
				  </tr>

				  <tr>
				    <td align='right' valign='baseline'><strong>Email:</strong></td>
				    <td>$email</td>
				  </tr>

				  <tr>
 				   <td width='121' align='right' valign='baseline'><strong>Object:</strong></td>
 				   <td width='459'>$object</td>
				  </tr>

				  <tr>
				    <td align='right' valign='baseline'><strong>Message:</strong></td>
				    <td>$message</td>
				  </tr>
   
 				  <tr>
 				    <td align='right' valign='baseline'><strong>IP:</strong></td>
				    <td>$ip</td>
				  </tr>
  
				  <tr>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				  </tr>
  
			    	 <tr>
				   <td>&nbsp;</td>
				   <td><small>Copyright 2012 MtxLab.us</small></td>
				 </tr>

				</table>
			</body>
			</html>
";

$from 		= $email;
$headers	= 'MIME-Version: 1.0' . "\n";
$headers	.= 'Content-type: text/html; charset=iso-8859-1' . "\n";
$headers 	.= "From: $from";

mail($emailto,$sbj,$msg,$headers); //Send principal mail.
//End mail to admin

//Start confermation mail
$toClient		 = $email;
$msgClient		 = "
			<html>
				<head>
				<style type='text/css'>
					body{
					font-family:'Lucida Grande', Arial;
					color:#333;
					font-size:15px;
					}
				</style>
				</head>
				<body>

				<h1>SITENAME</h1>
				<br />
  
				<p>Thanks for contact us, $nome</p>
				<p>We received your email. We respond as soon as possible.</p>  
				<br/>
				<br/>
				
				<hr>

				<p><small>Copyright 2012 MtxLab.us</small></p>
				 
				</body>
			</html>
";
$fromClient 	 = 'ADMIN';
$sbjClient 	 = "Thanks, $name ";
$headersClient	 = 'MIME-Version: 1.0' . "\r\n";
$headersClient	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headersClient 	.= "From: $fromClient";

mail($toClient,$sbjClient,$msgClient,$headersClient); //send email to client
//End confermation mail

//Reset errors
session_destroy();
exit;

} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="description" content="jiit website"/>
<meta name="keywords" content="HTML, CSS, php"/>
<meta name="author" content="Lathika"/>
<title>JIIT</title>
<!-- other meta stuff -->
<link href= "style.css" rel="stylesheet"/>
</head>
<body>
<?php
$current = 'contact';
include("common.php");
header8();
include("menu.php");
?>
<hr/>
<img src="images/contact.jpg">
<hr/>

<h2>CONTACT US</h2>

<h3>Address:</h3>
<p>Jaffna Institute of Information Technology <br/>
No 03, KKS Road, <br/>
Jaffna, <br/>
Sri Lanka. </p>

<h3>Phone:</h3>
<p>Fixed:	0094 21 222 3520 <br/>
Mobile:	0094 77 826 4025 <br/>
Fax:	0094 21 222 3520 </p>

<h3>E-mail:</h3>
<p>jiit@gmail.com</p>

<h3>Skype:</h3>
<p>jiit.jaffna</p>

<h3>Facebook:</h3>
<p>www.facebook.com/JIITJaffna</p>

<h3>Twitter:</h3> 
<p>www.twitter.com/JIITJafna</p>

<br/>
<br/>
<footer>
<hr/>
<?php
footer();
?>
</footer>
</body>
</html>

<?php
$current = 'contact us'; 
?>
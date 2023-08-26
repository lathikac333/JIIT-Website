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
$current = 'about';
include("common.php");
header8();
include("menu.php");
?>
<style>
img { 
        width: 100%;
        height: auto;
    }
</style>
<hr/>
<img src="images/about.jpg" width="1500" height="265">
<hr/>

<h2>ABOUT US</h2>

<h3>Who we are </h3>
<p>JIIT defines Jaffna Institute of Information Technology. 
It is located in No 03, KKS Road, Jaffna. This is an institute which provides degree level Information Technology courses. 
It contains 3 year Information Technology degree program in 4 major areas such as Software Development, System Administration, Information Technology, and Data Management. </p>
<p>JIIT is a leading degree awarding institute approved by the University Grants Commission (UGC) under the Universities Act. 
JIIT was established in 2018 December, opened our doors to 100 students. Currently, they offer undergraduate courses, and accommodate over 500 students, including students from various regions in Sri Lanka. 
The institute takes great pride in producing graduates who make meaningful contributions to their communities and professions. 
JIIT is located in 3 acre land and having 5 fully furnished lecture halls with 60 seats in each. </p>

<h3>Vision</h3> 

<p>To advance knowledge foster and promote innovation to our society through Quality learning system.</p>

<h3>Mission</h3>

<p>To create a learning and research environment with best possible resources for our students and staff to be innovative and dedicated to excellence and to produce graduates with strong analytical, problem solving and communication skills.</p>

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


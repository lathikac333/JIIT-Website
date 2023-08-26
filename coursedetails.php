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
$current = 'coursedetails';
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
<img src="images/coursedetails.jpg" width="1500" height="265">
<hr/>

<h2>COURSE DETAILS</h2>
<h3>Bachelor of Information Technology</h3>
<p>The Bachelor of Information Technology provides students with the knowledge and skills to be an information technology professional, with particular skills
 in a chosen area. The course focuses on computer and network configurations, web and application programming, and database design and maintenance. Students 
 also have the opportunity to specialise in a particular aspect of ICT-related work. This course is ideal for students who are seeking an ICT course with 
 flexible outcomes.</p>

 <?php
$DBConnect = @mysqli_connect("localhost", "root", "", "jiit", 3307)
Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

$sql_table="course_details";
$query = "select CourseNo, CourseName, Major, Duration, StudyOption, Intake, StartDate FROM course_details";

$result = @mysqli_query($DBConnect, $query)
		Or die ("<p>Unable to insert in the course registration table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
		

echo "<table border=\"1\">";
echo "<tr>"
."<th scope=\"col\">Course No</th>"
."<th scope=\"col\">Course Name</th>"
."<th scope=\"col\">Major</th>"
."<th scope=\"col\">Duration</th>"
."<th scope=\"col\">Study Option</th>"
."<th scope=\"col\">Intake</th>"
."<th scope=\"col\">Start Date</th>"
."</tr>";

while ($row = mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td>",$row["CourseNo"],"</td>";
echo "<td>",$row["CourseName"],"</td>";
echo "<td>",$row["Major"],"</td>";
echo "<td>",$row["Duration"],"</td>";
echo "<td>",$row["StudyOption"],"</td>";
echo "<td>",$row["Intake"],"</td>";
echo "<td>",$row["StartDate"],"</td>";
echo "</tr>";
}
echo "</table>";

mysqli_free_result($result);

mysqli_close($DBConnect);
?>
<br/><br/>
<p><strong>Course structure</p></strong>
<p>Successful completion of the Bachelor of Information Technology requires students to complete units of study to the value of 300 credit 
points. All units of study are valued at 12.5 credit points unless otherwise stated.</p> 
<p>Core studies - 8 units (100 credit points)</p>
<p>Major - 8 units (100 credit points)</p>
<p>Other studies - 8 units (100 credit points)</p><br/>
<p><strong>Course learning outcomes</strong></p>
<p>Students who successfully complete this course will be able to:</p>
<ul>
<li>Identify the need for IT solutions, elicit information from the relevant stakeholders about the requirements for the solution and research and plan 
solutions according to the requirements identified</li>
<li>Assess and analyse the appropriateness of methodologies and technologies for the design and implementation of IT solutions</li>
<li>Research, evaluate and discuss the suitability and procurement options of alternatives for a given purpose</li>
<li>Identify and analyse situations that require investigations about methodologies, practices, technologies, ethical and legal issues and source the generic 
and specialised software tools used by IT professionals</li>
<li>Communicate effectively using written and spoken English in a professional context, adapt personal interaction style to a given audience, work efficiently 
in a team, guide and direct other team members, identify the pertinent legal and ethical issues and be familiar with the generic and specialised software tools 
used by IT professionals</li>
<li>Demonstrate problem-solving skills to apply technologies to new situations when implementing, maintaining, documenting and troubleshooting small-scale 
systems</li>
<li>Demonstrate an appropriate knowledge of the technologies that make up IT infrastructure and articulate the relationships and interdependencies between 
technologies</li>
<li>Software Development major only - participate in a software development project, design and implement object-oriented software, including software for mobile 
applications and consider relevant security and usability aspects</li>
<li>System Administration major only - learn about the various aspects of organizations’ information technology setups. Studies will cover hardware, software, 
networks, and operating systems.</li>
<li>Information Technology major only - ocuses on the practical and theoretical dimensions of information technology, and prepares students for careers 
in the fields of information technology, IT management and cyber security.</li>
<li>Data Management major only - design, build and manage database and to respond to new challenges in managing digital data</li>
</ul><br/>
<p><strong>Career opportunities</strong></p>
<p>There is a large number of job roles available for those with software development qualifications and experience including enterprise systems application 
developer, quality assurance analyst, project manager, systems architect, business requirements analyst, technical writer, application 
integration specialist, user interface analyst, contract manager, data warehouse architect, data mining specialist and help desk manager.</p>

<br/><br/>
<footer>
<hr/>
<?php
footer();
?>
</footer>
</body>
</html>


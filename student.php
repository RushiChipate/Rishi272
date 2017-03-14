<?php
include_once 'config.php';
?>
<html>
<head>
<title>Add Student</title>
<style type="text/css">
.heading
{
margin-top:0px;
background-color:#006480;
padding-top:10px;
padding-bottom:10px;
color:white;
width:100%;
text-align:center;
}
.main
{
text-align:center;
}
</style>
</head>

<body>
<div  class="heading">
<h1>Student Information</h1>
</div>
<hr>
<div class="main">
<h3>Add Student</h3>
<center>
<form name="studentInfo" action="student.php" method="post">
<table>
<tr><td>Studnent Name:</td><td><input type="text" id="studentName" name="studentName" /></td></tr>
<tr><td>Studnent Address:</td><td><input type="text" id="studentAdd" name="studentAdd" /></td></tr>
<tr><td></td><td><input type="button" onclick="validData()" value="Add Student"></td></tr>
</table>
</form>
</center>
</div>
<hr>
<center>
<a href="subject.php">Add Subject</a></center>
</body>
<script type="text/javascript">
function validData(studentInfo)
{
	var studentName=document.getElementById("studentName").value;
	var studentAdd=document.getElementById("studentAdd").value;
	if (studentName == "") {
		document.getElementById("studentName").focus();
		alert("Enter Student Name!");
		return false;
		}
	if (studentAdd == "") {
		document.getElementById("studentAdd").focus();
		alert("Enter Student Address!");
		return false;
		}
	document.studentInfo.submit();
}
</script>
<?php 
if(isset($_POST['studentName'])&&isset($_POST['studentAdd']))
{
	$studentName=$_POST['studentName'];
	$studentAdd=$_POST['studentAdd'];
	$query=mysqli_query($con,"Insert into students (name,address) values('$studentName','$studentAdd')") or die(mysqli_error());
	 echo "<script>alert('Student added Successfull!')</script>";
	 echo "<script>window.open('student.php','_self');</script>";
}
?>
</html>
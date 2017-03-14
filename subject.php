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
<h1>Subject Information</h1>
</div>
<hr>
<div class="main">
<h3>Add Subject</h3>
<center>
<form name="addSubject" action="subject.php" method="post">
<table>
<tr><td>Select Name:</td>
<td>
<select name="studId" id="studId">
<option value="" disabled selected>Select Student</option>
<?php 
$query=mysqli_query($con,"Select * from students") or die(mysqli_error());
while ($row=mysqli_fetch_assoc($query))
{
?>
<option value="<?php echo $row['sid'];?>"><?php echo $row['name'];?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr><td>Subject 1 Mark:</td><td><input type="text" id="sub1" name="sub1" /></td></tr>
<tr><td>Subject 2 Mark:</td><td><input type="text" id="sub2" name="sub2" /></td></tr>
<tr><td>Subject 3 Mark:</td><td><input type="text" id="sub3" name="sub3" /></td></tr>
<tr><td></td><td><input type="button" onclick="validMark()" value="Add Marks"></td></tr>
</table>
</form>
</center>
</div>
<hr>
<center>
<a href="student.php">Add Student</a></center>
</body>
<script type="text/javascript">
function validMark(addSubject)
{
	var studId=document.getElementById("studId").value;
	var sub1=document.getElementById("sub1").value;
	var sub2=document.getElementById("sub2").value;
	var sub3=document.getElementById("sub3").value;
	if (studId == "") {
		document.getElementById("studId").focus();
		alert("Select Student Name!");
		return false;
		}
	if((/[^0-9]/g.test(sub1)) || sub1== "") {
		document.getElementById("sub1").focus();
		alert("Select Subject 1 Mark. Must be Number!");
		return false;
	       }
	if((/[^0-9]/g.test(sub2)) || sub2== "") {
		document.getElementById("sub2").focus();
		alert("Select Subject 2 Mark. Must be Number!");
		return false;
	       }
	if((/[^0-9]/g.test(sub3)) || sub3== "") {
		document.getElementById("sub3").focus();
		alert("Select Subject 3 Mark. Must be Number!");
		return false;
	       }
	document.addSubject.submit();
}
</script>
<?php 
if(isset($_POST['studId'])&&isset($_POST['sub1'])&&isset($_POST['sub2'])&&isset($_POST['sub3']))
{
	$studentID=$_POST['studId'];
	$sub1=$_POST['sub1'];
	$sub2=$_POST['sub2'];
	$sub3=$_POST['sub3'];
	$query=mysqli_query($con,"Insert into subject (sid,sub1,sub2,sub3) values('$studentID','$sub1','$sub2','$sub3')") or die(mysqli_error());
	 echo "<script>alert('Marks Added Successfully!!!')</script>";
	 echo "<script>window.open('subject.php','_self');</script>";
}
?>
</html>
<html>
<head>
	
<title>Welcome</title>	
</head>
<body>


<table width="1200">
				<tr>
					<td width="300">Course Name</td>
					<td width="200">Category</td>
					<td width="300">Duration</td>
					<td width="100">Members</td>
				</tr>
				<?php foreach($courses as $course){  ?>
				<tr>
					<td width="300"><?php echo $course->cname;?></td>
					<td width="200"><?php echo $course->catagory;?></td>
					<td width="300"><?php echo $course->duration;?></td>
					<td width="100"><a href='<?php echo "/course_signup/view_members/$course->id";?>'>View Members</a></td>
				</tr>
				<?php } ?>				
</table>




</body>
</html>
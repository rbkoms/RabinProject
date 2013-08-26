<!DOCTYPE html>
<html lang="en">
<head>
	
<title>login</title>

	
</head>
<body>

<?php 
	if($this->session->flashdata('error')){
	echo $this->session->flashdata('error');
	}
	if($this->session->flashdata('in')){
	echo $this->session->flashdata('in');
	}
?>

<div id="organization">

		<p>
			<table width="1200">
				<tr>
					<td width="300">Organization Name</td>
					<td width="300">Location</td>
					<td width="200">Contact Number</td>
					<td width="100">Members</td>
				</tr>
				<?php foreach($organizations as $organization){  ?>
				<tr>
					<td width="300"><?php echo $organization->org_name;?></td>
					<td width="300"><?php echo $organization->org_location;?></td>
					<td width="200"><?php echo $organization->org_contact_no;?></td>
					<td width="100"><?php echo "<a href='/org_signup/viewmembers/$organization->id'>view members</a>";?></a></td>
				</tr>
				<?php } ?>				
			</table>
			<?php echo $organization->org_name;?><br>
			<a href="<?php echo "/subscribecourse/add_org_enrollment/$organization->id";?>">Subscribe Courses For The Very Organization</a>
			   
		</p>
		
		</div>
</body>
</html>
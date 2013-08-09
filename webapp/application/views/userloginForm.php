<html>
<body>
<?php if(isset($message)) {

	echo $message;
} 
?>

	<? if($this->session->flashdata("error")): ?>
		<div class="error">
		<?= $this->session->flashdata("error"); ?>
		</div>
	<?endif?>

	
	<? if($this->session->flashdata("in")): ?>
		<div class="success">
		<?= $this->session->flashdata("in"); ?>
		</div>
	<?endif?>

<?php echo form_open('userlogin'); ?>

Username: <input typpe="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="submit">


</body>
</html>

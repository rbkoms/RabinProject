
<html>
<body>
<?php if(isset($message)) {

	echo $message;
} ?>


<form method='post'>
Course Name: <input type="text" name="cname"><br>
Catagory: <input type="text" name="catagory"><br>
Duration: <input type="text" name="duration"><br>
<input type="submit" value="submit">

</form>
</body>
</html>

<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['class']) === 0){
		$errors['class'] = "* Class is required.";
	}
	if(preg_match("/\S+/", $_POST['streem']) === 0){
		$errors['streem'] = "* Streem is required.";
	}
	if(preg_match("/\S+/", $_POST['teacher']) === 0){
		$errors['teacher'] = "* Teacher is required.";
	}
	if(count($errors) === 0){


	$class=$_POST['class'];
	$streem=$_POST['streem'];
	$teacher=$_POST['teacher'];
	$user= $_SESSION['ID'];
	if($_POST['class_id'] == ""){

	if ($sql=mysqli_query($conn, "INSERT into class (CLASS, streem, teacher) 
		VALUES ( '$class', '$streem', '$teacher' )")){
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $class in the class list','$user',NOW() )");
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>New Class Successfully Added.</h4></center></div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='rms.php?page=class';  }, 2000);</script>";
	} else {
		echo "<script>
		alert('New Class failed to record!" .$sql."');
		window.location.href='rms.php?page=class';
		</script>";
		unset($_POST);

	}
	}else{
		$id=$_POST['id'];
		$sql = "UPDATE class SET CLASS='$class',streem='$streem',teacher='$teacher' WHERE class_id='$class_id'";
		mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the class list','$user',NOW() )");

		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Class Successfully Updated.</h4></center></div>";
			echo "<script>
			document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
			setTimeout(function(){	window.location.href='rms.php?page=class';  }, 2000);</script>";

		} else {
    echo "Error updating record: " . mysqli_error($conn);
		}
	}
}else{
	echo "<script>setTimeout(function(){	$('.erlert').hide()  }, 3000);</script>";
}

}

	mysqli_close($conn);

 ?>
<?php 
include 'db.php';
$class_id = $_POST['class_id'];
$class = $_POST['class'];
$streem = $_POST['streem'];
$teacher = $_POST['teacher'];
$user = $_SESSION['ID'];

$sql = "UPDATE class SET class='$class',streem='$streem',teacher='$teacher' WHERE class_id='$class_id'";
mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the class list','$user',NOW() )");

if (mysqli_query($conn, $sql)) {
	header("location:".$_SERVER['HTTP_REFERER']);

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

 ?>
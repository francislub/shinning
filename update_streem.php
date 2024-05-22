<?php 
include 'db.php';
$id = $_POST['id'];
$streem = $_POST['streem'];
$user = $_SESSION['ID'];

$sql = "UPDATE streem SET STREEM='$streem' WHERE STREEM_ID='$id'";
mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the streem list','$user',NOW() )");

if (mysqli_query($conn, $sql)) {
	header("location:".$_SERVER['HTTP_REFERER']);

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

 ?>
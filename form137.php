&nbsp<!DOCTYPE html>
<html>
<?php 
include 'db.php';
session_start();
$user = $_SESSION['ID'];


	$id = $_GET['id'];

	$query = mysqli_query($conn,"SELECT * FROM student_info where STUDENT_ID = '$id' ");
	$row = mysqli_fetch_assoc($query);
	$student = $row['FIRSTNAME'].' '. $row['LASTNAME'];

	mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('printed $student permanent record','$user',NOW() )");



?>
<?php
// Database connection
include 'db.php';
// Fetch data from the database
$query = "SELECT `from`, `to`, `grade` FROM grade";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Store fetched data in arrays
$grades = [];
$marks = [];

while ($row = mysqli_fetch_assoc($result)) {
    $grades[] = $row['grade'];
    $marks[] = $row['from'] . ' - ' . $row['to'];
}

// Close the database connection
mysqli_close($conn);
?>
<head>
    <link rel="icon" href="images/logo.jpg">

    <title>Student Grading System</title>

     <!-- Bootstrap Core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/styles.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="asset/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="asset/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
        <link href="datatables/dataTables.bootstrap.css" rel="stylesheet">

    <script src="assets/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="assets/js/jq.js"></script>
	<style>
	@media print {  
		@page {
			size:8.5in 13in;
			border: 5px solid black;
		}
		
		head{
			height:0px;
			display: none;
		}
		#head{
			display: none;
			height:0px;
		}
		#print{
		position:fixed;
		top:0px;
		margin-top:20px;
		margin-bottom:30px;
		margin-right:50px;
		margin-left:50px;
		}
		}
		#print{
		width:7.5in;
		}
		input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}
.body {
		background-color: white;
		background-image: url('logo1.PNG');
		background-size: cover;
		background-position: center;
		margin: 0;
		border: 5px solid black; /* Thick black border */
        }
.foo{
	font-family: "Bodoni MT", Didot, "Didot LT STD", "Hoefler Text", Garamond, "Times New Roman", serif;
	font-size: 24px;
	font-style: italic;
	font-variant: normal;
	font-weight: bold;
	line-height: 24px;
	}
	.p {
	font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
	font-size: 14px;
	font-style: italic;
	font-variant: normal;
	font-weight: 550;
	line-height: 20px;
	 letter-spacing: 2px;
}
	</style>

</head> 
<!-- <body style="background-color:white;  background-image: url('logo1.PNG'); background-size: cover; background-position: center;margin: 0;">  -->
<body style="background-color:white;"> 
<span id='returncode'></span>
<div class="col-md-2" id="head">
	<button class="btn btn-info" onclick="print()"><i class="glyphicon glyphicon-print"></i>PRINT</button>
	<a class="btn btn-info" onclick="window.close()">Cancel</a>
	
</div>
<center>
<div id='print'>
<div style="width:800px; margin-left:.1in;margin-right:.1in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">

<center><p><b><h4>SHINING STARS NURSERY AND PRIMARY SCHOOL - VVUMBA</h4></b></p></center>

		  </div>
		  <div class="row">
			 <!-- Left Image -->
			 <div class="col-md-3">
                <img src="logo1.PNG" alt="Left Image" class="img-fluid">
            </div>
            <!-- Center Text -->
            <div class="col-md-6 text-center">
                <div>
                    <p><b><h6>Mixed day and boarding</h6></b></p>
                </div>
                <div>
                    <p><h6><b>P.O.BOX 31007, TEL:</b> 0753753179, 0773297951, 0772413164,</h6></p>
                </div>
                <div>
                    <p><b><h6>"Arise and shine"</h6></b></p>
                </div>
                <div>
                    <p><b><h5>Email: shiningstars.school2022@gmail.com</h5></b></p>
                </div>
                <div>
                    <p><b><h6>"A Centre for Guaranteed excellence"</h6></b></p>
                </div>
            </div>
            <!-- Right Image Placeholder -->
            <div class="col-md-3">
                <div class="image-placeholder" style="width:70%; height:20%; border:1px solid #ddd; display:flex; align-items:center; justify-content:center;">
                    <p>Image Placeholder</p>
                </div>
            </div>
          <!-- </div> -->
          </div>

		  <div class="row">
			<div class="col-md-12">
			<hr style="border-color:black;border:1px solid black"></hr>
			</div>
          </div>

		  <div class="col-md-12">
			<center><p><b><h4>END OF TERM 1 ASSESSMENT REPORT</h4></b></p></center>
			</div>

          <div class="row">
		  <div class="col-md-12">

		  <table style="line-height:5mm">
		<?php 
		include 'db.php';
		$id = $_GET['id'];
		$sql = mysqli_query($conn,"SELECT * from student_info where STUDENT_ID = '$id'");
		while($row = mysqli_fetch_assoc($sql)){
			$mid = $row['MIDDLENAME'];
		?>
			<tr>
				<td style="width:600px;font-size:12px">
					<label for="" style="">PUPIL'S NAME: &nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:13px;text-transform: uppercase;"><?php echo $row['LASTNAME'].", " .  $row['FIRSTNAME']. " " .  substr("$mid",0,1) . "."; ?></b>
					
				</td>
				<td style="width:600px;font-size:12px">
				<label for="">CLASS:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:12px"><?php echo date("F d,Y") ?></h>
					
				</td>
				
			</tr>

			
			</table> 
			
			
			<table>
			<tr>
            <br>
			<td style="width:300px;font-size:12px">

				
					<label for="">SEX:&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['INT_COURSE_COMP'] ?></h>
				
			</td>
			<td style="width:200px;font-size:12px">
				<label for="">Year:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['SCHOOL_YEAR'] ?></h>
			</td>
			<td style="width:200px;font-size:12px">
				<label for="">LIN NO:&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['GEN_AVE'] ?></h>
			</td>

			<td style="width:200px;font-size:12px">
				<label for="">DIV:&nbsp</label>
					<h style="text-transform: capitalize"><?php echo $row['GEN_AVE'] ?></h>
			</td>
			
			
			</tr>
		</table>
		<br>
		<?php } ?>
		  </div>
          </div>

          <p style="">
          <?php
		$sql1 = mysqli_query($conn,"SELECT * FROM student_year_info left join grade on student_year_info.YEAR=grade.grade_id where STUDENT_ID = '$id'");
		$num1 = mysqli_num_rows($sql1);

		

		while($row1 = mysqli_fetch_assoc($sql1)){
		?>
		<table style="float:left;margin-left:5px;margin-bottom:20px;">
		<tr>
		<td>  
		<!-- <table>
			<tr style="width:100%">
			<td>
         
			<label style="font-size:12px">School:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			</td>
			<td style="border-bottom:1px solid black;width:280px">
		<label style="font-size:12px"><?php echo $row1['SCHOOL'] ?> </label>
		</td>
		</tr>
		</table> -->
		
		
		<table style="border-collapse:collapse">
			<tr>
			<td style="width:150px;border:1px solid black;font-size:12px;"><center><b>SUBJECT</b></center></td>
			<td style="width:60px;border:1px solid black;font-size:12px;"><center><b>FULL MARKS</b></center></td>
			<td style="width:160px;border:1px solid black;font-size:12px;"><center><b>MID TERM II EXAMS</b></center></td>
			<td style="width:140px;border:1px solid black;font-size:12px;"><center><b>END OF TERM II EXAMS</b></center></td>
			<td style="width:30px;border:1px solid black;font-size:12px;"><center><b>TEACHER'S COMMENT</b></center></td>
			<td style="width:20px;border:1px solid black;font-size:12px;"><center><b>INITIALS</b></center></td>
			</tr>
		<?php
		$syi = $row1['SYI_ID'];
		$sql2 = mysqli_query($conn,"SELECT * FROM total_grades_subjects where SYI_ID = '$syi' order by SUBJECT");
		$num4 = mysqli_num_rows($sql2);
		while($row2 = mysqli_fetch_assoc($sql2)){
			$sub = $row2['SUBJECT'];
		$sql3 = mysqli_query($conn,"SELECT * FROM subjects where SUBJECT_ID = '$sub'");
		while($row3 = mysqli_fetch_assoc($sql3)){

		?>
		<tr>
		<td style="width:150px;border:1px solid black;font-size:10px;height:15px">
			<?php
           if($row3['SUBJECT'] == "     *Music"){
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['SUBJECT'];}
            elseif($row3['SUBJECT'] == "     *Arts"){
              echo "&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['SUBJECT'];
            }
            elseif($row3['SUBJECT'] == "     *Physical Education"){
              echo "&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['SUBJECT'];
            }
            elseif($row3['SUBJECT'] == "     *Health"){
              echo "&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['SUBJECT'];
            }	
            else{
              echo $row3['SUBJECT'];

            }
            ?>
		</td>
		<td style="width:160px;border:1px solid black;font-size:10px;height:15px;text-align:center"><?php echo $row2['FINAL_GRADES'] ?></td>
		<td style="width:140px;border:1px solid black;font-size:10px;height:15px"><?php echo $row2['UNITS'] ?></td>
		<td style="width:83px;border:1px solid black;font-size:10px;height:15px"><center><?php echo $row2['PASSED_FAILED'] ?></center></td>
		<td style="width:83px;border:1px solid black;font-size:10px;height:15px"><center><?php echo $row2['PASSED_FAILED'] ?></center></td>
		<td style="width:83px;border:1px solid black;font-size:10px;height:15px"><center><?php echo $row2['PASSED_FAILED'] ?></center></td>
		</tr>
		
		<?php
	}
			
	}	
			// for($q = $num4; $q < 15 ; $q++){
		 ?>
		
		<!-- <tr>
		<td style="width:150px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:83px;border:1px solid black;font-size:12px;height:15px"></td>
		</tr> -->
		<?php
	

// }
	
		?>
		<!-- <tr>
		<td style="width:150px;font-size:12px;height:15px">Days of School:</td>
		<td style="width:60px;border-bottom:1px solid black;font-size:12px;height:15px"><center><?php echo $row1['TDAYS_OF_CLASSES'] ?></center></td>
		<td style="width:60;font-size:12px;height:15px;text-align:right">No. of Ye</td>
		<td style="width:83px;font-size:12px;height:15px">ars in</td>
		</tr>
		<tr>
		<td style="width:150px;font-size:12px;height:15px">Days of Present:</td>
		<td style="width:60px;border-bottom:1px solid black;font-size:12px;height:15px"><center><?php echo $row1['TDAYS_PRESENT'] ?></center></td>
		<td style="width:60;font-size:12px;height:15px;text-align:right">School</td>
		<td style="width:83px;border-bottom:1px solid black;font-size:12px;height:15px"><center><?php echo $row1['TOTAL_NO_OF_YEAR'] ?></center></td>
		</tr> -->

		</table>
		<br>
		

		<!-- <table style="border-collapse:collapse">
			<tr>
		<td style="width:150px;font-size:12px;height:15px">To be classified as:</td>
		<td style="width:120px;border-bottom:1px solid black;font-size:12px;height:15px"><center><?php echo $row1['TO_BE_CLASSIFIED'] ?></center></td>
		<td style="width:83px;font-size:12px;height:15px"></td>
		</tr>
		</table>
		</td>
		</tr>

		</table> -->


		
         
          
          <?php
	}
	?>
	<?php
	for($c =  $num1;$c < 3; $c++){
		?>
		<table style="float:left;margin-left:5px;margin-bottom:20px;">
		<tr>
		<td>
		
	
		<table style="border-collapse:collapse">
		<center><p><h4><b>PUPIL'S GENERAL CONDUCT</b></h4></p></center>
			<tr>
			<td style="width:180px;border:1px solid black;font-size:12px;"><center><b>DISCIPLINE</b></center></td>
			<td style="width:180px;border:1px solid black;font-size:12px;"><center><b>TIME MANAGEMENT</b></center></td>
			<td style="width:180px;border:1px solid black;font-size:12px;"><center><b>SMARTNESS</b></center></td>
			<td style="width:180px;border:1px solid black;font-size:12px;"><center><b>ATTENDANCE</b></center></td>
			</tr>
			
			
			<tr>
			<td style="width:150px;border:1px solid black;font-size:12px;height:15px"></td>
			<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
			<td style="width:60px;border:1px solid black;font-size:12px;height:15px"></td>
			<td style="width:83px;border:1px solid black;font-size:12px;height:15px"></td>
			</tr>
			
		
		
        
        <tr>
		<td style="width:150px;font-size:12px;height:15px">Class teacher's Comment:</td>
		<td style="width:60px;border-bottom:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60;font-size:12px;height:15px;text-align:right">Signature</td>
		</tr>
		<tr>
		<td style="width:150px;font-size:12px;height:15px">Head teacher's Comment:</td>
		<td style="width:60px;border-bottom:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:60;font-size:12px;height:15px;text-align:right">Signature</td>
		</tr>

		</table>
		<br>
		<center><p><h4><b>GRADING SCALE</b></h4></p></center>
        <!-- <br> -->
		<table style="width:750px;border-collapse:collapse">
		
		<tr>
			
		</tr>
			<tr>
			<?php foreach ($grades as $grade): ?>
				<td style="width:80px;border:1px solid black;font-size:15px;"><center><b><?php echo htmlspecialchars($grade); ?></b></td>
			<?php endforeach; ?>
			</tr>

			<tr>
			<?php foreach ($marks as $mark): ?>
				<td style="width:80px;border:1px solid black;font-size:12px;height:15px"><center><b><?php echo htmlspecialchars($mark); ?></b></td>
			<?php endforeach; ?>
			</tr>
        <!-- <br> -->
		<table style="width:750px;border-collapse:collapse">
		
		<div class="row">
		    <td style="width:400px;font-size:12px">

				<br>
			<label for="">Next term Begins on: ......................</label>
			<!-- <h style="text-transform: capitalize"><?php echo $row['INT_COURSE_COMP'] ?></h> -->
		
			</td>
			<br>
			<td style="width:400px;font-size:12px">
				<label for="">and ends on: .............................</label>
					<!-- <h style="text-transform: capitalize"><?php echo $row['SCHOOL_YEAR'] ?></h> -->
			</td>
	    </div>
		<!-- <table style="border-collapse:collapse">
			<tr>
		<td style="width:150px;font-size:12px;height:15px">To be classified as:</td>
		<td style="width:120px;border-bottom:1px solid black;font-size:12px;height:15px"></td>
		<td style="width:83px;font-size:12px;height:15px"></td>
		</tr>
		</table> -->
		</td>
		</tr>

		</td>
		</tr>
		<br>
		<table style="width:750px;border-collapse:collapse">
		<center><p><h4><b>THIS REPORT IS NOT VALID WITHOUT A SCHOOL STAMP</b></h4></p></center>

		</table>
		
		<?php 
	

		}
	
	

		?>
      	<p>




<?php

 mysqli_close($conn);
?>
</center>
</body>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;

	$.ajax({
		url:'print_log.php?act=form137&id=<?php echo $_GET['id'] ?>',
		success:function(html){
			$('#returncode').html(html);
		}
	});
}
</script>
</html>
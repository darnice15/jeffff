<?php 
	require_once("database.php");
	$id=$_POST['id'];


	$sql = "SELECT DISTINCT application,module,remarks,deployed_date,modified_date,description,features FROM reports_tbl WHERE id=$id ORDER BY version DESC";

	// echo $sql;

	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	  while($row = mysqli_fetch_assoc($result)) {
	  	echo "{$row['application']}"; 
	  }
	}
 ?> 
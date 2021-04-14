<?php 

require_once('database.php');
  
$fapp = $_POST['optgen']; 
$sql = "SELECT DISTINCT application,version,deployed_date,modified_date FROM reports_tbl WHERE application='{$fapp}' ORDER BY id DESC";
	$result = mysqli_query($conn, $sql);
	//$list = array(array("Application","Module","Description","Features","Remarks","Deployed Date"));
	$concatsqldate="";
	$list = array();
	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
	  	if($row["modified_date"]==NULL){
	  		$date=date_create($row["deployed_date"]);
	  		// AND deployed_date="2021-3-10" AND modified_date is NULL
	  		$concatsqldate="AND application='{$row["application"]}' AND deployed_date='{$row["deployed_date"]}' AND modified_date is NULL";
	  	}else{
	  		$date=date_create($row["modified_date"]);
	  		$concatsqldate="AND application='{$row["application"]}' AND modified_date='{$row["modified_date"]}'"; 
	  	}
		$created_date = date_format($date,"M d, Y");
		
	  	array_push($list,array($row["application"] ." v". $row["version"] . " (" . $created_date . ")"));
		array_push($list,array("================================"));

		$sql_data = "SELECT DISTINCT id, application, module, description, features, remarks,version, deployed_date,modified_date FROM reports_tbl 
			WHERE version=" . $row["version"] . " {$concatsqldate} ORDER BY id DESC";// LIMIT 3 OFFSET 0";

		$result_data = mysqli_query($conn, $sql_data);	
		if (mysqli_num_rows($result_data) > 0) {
	  	// output data of each row
		  while($data = mysqli_fetch_assoc($result_data)) { 

		  	array_push($list,array($data["remarks"] . " " . $data["application"] . " - " . $data["features"]));

		  	}
		}
 
		array_push($list,array(""));
	  }

		$mkd=mktime(0,0,0,02,03,2021);
		//date("Y-m-d h:i:sa", $d);
			$d = date("ymd");
		// print_r (explode(" ",$str));

	  $ds = "reports/{$fapp}_CL{$d}.csv";
		// $file=fopen("","w");

	  $file = fopen("{$ds}","w");

	  foreach ($list as $line) {
		  fputcsv($file, $line);
	  }
	  fclose($file);
	} else {
	  echo "0 results";
	}
	
	mysqli_close($conn);


	// $href = "<a href={$ds} download> Generate Report </a>";

	// echo $href;
?>

<script type="text/javascript">
	alert("File Has been Generated!");
	window.location="index.html";
</script>
<?php
	require_once('database.php');

	//echo "<b>this text is for text font style monitoring only.</b>";

	$sql = "SELECT DISTINCT version,deployed_date FROM reports_tbl ORDER BY id DESC";// LIMIT 3 OFFSET 0";
	$result = mysqli_query($conn, $sql);
	$file = fopen("QAMonitoring_CL210203.csv","w");
	//$list = array(array("Application","Module","Description","Features","Remarks","Deployed Date"));
	$list = array();
	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
	  	$date=date_create($row["deployed_date"]);
		$created_date = date_format($date,"M d, Y");

	  	echo "<ul style='list-style-type:circle';>
	  			<li><h4 >
	  				<a>v1." . $row["version"] . " (" . $created_date . ")</a>
	  				</h4>";

	  	array_push($list,array("v". $row["version"] . " (" . $created_date . ")"));
		array_push($list,array("================================"));
		// $sql_data = "SELECT id, application, module, description, features, remarks,version, deployed_date FROM reports_tbl WHERE version=" . $row["version"] . " AND application='qa monitoring' ORDER BY id ASC";
		$sql_data = "SELECT id, application, module, description, features, remarks,version, deployed_date FROM reports_tbl WHERE version=" . $row["version"] . " ORDER BY id ASC";// LIMIT 3 OFFSET 0";
		$result_data = mysqli_query($conn, $sql_data);	
		if (mysqli_num_rows($result_data) > 0) {
	  	// output data of each row
		  while($data = mysqli_fetch_assoc($result_data)) { 
		  	$bclass="red";
		  	$bfeatures="";
		  	// added,enhancement,removed,changed
		  	if($data["remarks"]==="Added"){
		  		$bclass = "added";
		  	}else if($data["remarks"]==="Enhanced"){
		  		$bclass = "enhanced";
		  	}else if($data["remarks"]==="Changed"){
		  		$bclass = "changed";
		  	}else if($data["remarks"]==="Removed"){
		  		$bclass = "removed";
		  	}

		  	 echo  "<ul style='list-style-type:none';>
						<li>
							<b class=".$bclass.">" . $data["remarks"] . "</b> ". $data["features"]. "
						</li>
						<li>	
							<ul class=circle>
								<!--li>" . $data["module"]  ." - ". $data["description"]."</li-->
								<!--li><b class=".$bfeatures.">Features</b> - " . $data["features"] . "</li-->
							</ul>
						</li>
					</ul>"; 
					array_push($list,array($data["remarks"] . " " . $data["application"] . " - " . $data["features"]));
					// array_push($list,array($data["module"] . " - " . $data["description"]));
					// array_push($list,array("Features - " . $data["features"])); 
					// array_push($list,array($data["application"], $data["module"], $data["description"], $data["features"], $data["remarks"]));
					
		  }
		}

		echo	"</li>
			</ul> ";
		array_push($list,array(""));

	}

	  // This must generate a text file for the specific deployment date ex: QAMonitoring_CL210203 
	//(Application_CLYEARMONTHDAY)
		//date("l jS \of F Y h:i:s A")
	//$mkd=mktime(hour, minute, second, month, day, year)
		$mkd=mktime(0,0,0,02,03,2021);
	//date("Y-m-d h:i:sa", $d);
		$d = date("ymd");
	// print_r (explode(" ",$str));

		$ds = "QAMonitoring_CL$d.csv";

	  $file = fopen("$ds","w");

	  foreach ($list as $line) {
		  fputcsv($file, $line);
		}

	} else {
	  echo "0 results";
	}
	fclose($file);
	mysqli_close($conn);



	// $href = "<a href=$ds download> Generate Report </a>";

	// echo $href;

?>
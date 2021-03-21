<?php
	//$q = intval($_GET['q']);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "qamonitoring";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	// echo "Connected successfully";

	//echo "<b>this text is for text font style monitoring only.</b>";

	$sql = "SELECT DISTINCT version,deployed_date FROM reports_tbl ORDER BY version DESC";// LIMIT 3 OFFSET 0";
	$result = mysqli_query($conn, $sql);
	$file = fopen("QAMonitoring_CL210203.csv","w");
	//$list = array(array("Application","Module","Description","Features","Remarks","Deployed Date"));
	$list = array();
	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
	  	

	  	
	  	echo "<ul style='list-style-type:circle';>
	  			<li><h4 >
	  				<a>v1." . $row["version"] . " (" . $row["deployed_date"] . ")</a>
	  				</h4>";
		$sql_data = "SELECT id, application, module, description, features, remarks,version, deployed_date FROM reports_tbl WHERE version=" . $row["version"] . " ORDER BY id DESC";// LIMIT 3 OFFSET 0";
		$result_data = mysqli_query($conn, $sql_data);	
		if (mysqli_num_rows($result_data) > 0) {
	  	// output data of each row
		  while($data = mysqli_fetch_assoc($result_data)) { 
		  	$bclass="red";
		  	// added,enhancement,removed,changed
		  	if($data["remarks"]==="Added"){
		  		$bclass = "added";
		  	}else if($data["remarks"]==="Enhancement"){
		  		$bclass = "enhanced";
		  	}else if($data["remarks"]==="Changed"){
		  		$bclass = "changed";
		  	}else if($data["remarks"]==="Removed"){
		  		$bclass = "removed";
		  	}else{
		  		$color = "red";  
		  	}
		  	 echo  "<ul style='list-style-type:none';>
						<li class='accordion'>
							<b class=".$bclass.">" . $data["remarks"] . "</b> - ". $data["application"]. "
						</li>
						<li class=panel>	
							<ul class=circle>
								<li>" . $data["module"]  ." - ". $data["description"]."</li>
								<li>Features - " . $data["features"] . "</li>
							</ul>
						</li>
					</ul>";
		  }
		}

		echo	"</li>
			   </ul> ";

			  
			  
	    
		// array_push($list,array("v(". $row["version"] .")"));
		// array_push($list,array("================================"));
	 //    array_push($list,array($row["application"] . " - " . $row["module"] ));
	 //    array_push($list,array($row["remarks"] . " - " . $row["description"]));
	 //    array_push($list,array("Features - " . $row["features"])); 
		// array_push($list,array($row["application"], $row["module"], $row["description"], $row["features"], $row["remarks"]));
		// array_push($list,array(""));

	    //array_push($list,array($row["application"], $row["module"], $row["description"], $row["features"], $row["remarks"], $row["deployed_date"]));
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
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

	$sql = "SELECT id, application, module, description, features, remarks, deployed_date FROM reports_tbl ORDER BY id DESC";
	$result = mysqli_query($conn, $sql);
	$file = fopen("QAMonitoring_CL210203.csv","w");
	//$list = array(array("Application","Module","Description","Features","Remarks","Deployed Date"));
	$list = array();
	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
	  	$bclass="red";
	  	// added,enhancement,removed,changed
	  	if($row["remarks"]==="Added"){
	  		$bclass = "added";
	  	}else if($row["remarks"]==="Enhancement"){
	  		$bclass = "enhanced";
	  	}else if($row["remarks"]==="Changed"){
	  		$bclass = "changed";
	  	}else if($row["remarks"]==="Removed"){
	  		$bclass = "removed";
	  	}else{
	  		$color = "red";  
	  	}
	  	echo "<ul style='list-style-type:circle';><li><h4 ><a>v1." . $row["id"] . " (" . $row["deployed_date"] . ")</a></h4>
				<ul style='list-style-type:none';>
					<li class='accordion'><b class=".$bclass.">" . $row["remarks"] . "</b> - ". $row["application"]. "
					<li class=panel>	
						<ul class=circle>
							<li>" . $row["module"]  ." - ". $row["description"]."</li>
							<li>Features - " . $row["features"] . "</li>
						</ul>
						</li>
					</li>
				</ul>
				</li>
				</ul>

			";
	    // echo "<tr>
	    // 		<td>" . $row["application"].	" </td>
	    // 		<td>" . $row["module"] . 		" </td> 
    	// 		<td>" . $row["description"] . 	" </td> 
    	// 		<td>" . $row["features"] . 		" </td> 
    	// 		<td>" . $row["remarks"] . 		" </td> 
    	// 		<td>" . $row["deployed_date"] .	" </td>
	    // 	</tr>";

	    // array_push($list,array("v(". $row["deployed_date"] .")"));
	    // array_push($list,array($row["application"] . " - " . $row["module"] ));
	    // array_push($list,array($row["remarks"] . " - " . $row["description"]));
	    // array_push($list,array("Features - " . $row["features"]));
	    // array_push($list,array(""));
		array_push($list,array($row["application"], $row["module"], $row["description"], $row["features"], $row["remarks"], $row["deployed_date"]));

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
<?php

require_once('database.php');

$sql = "SELECT DISTINCT application FROM reports_tbl ORDER BY id DESC";  
$result = mysqli_query($conn, $sql);
echo "<form method='post' action='exec_generatereport.php' style='margin: 0 0 0 0' ><div class='row'><div class='6u 12u$(xsmall)'></div>
		<div class='3u 12u$(xsmall)'>
		<b>Generate Report</b>;
 		<select name=optgen id=optgen>
 			<option value=''> - Select Application - </option>";
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {  
  	echo "<option value='".$row["application"]."'>".$row["application"]."</option>";
  }
}
echo "	</select>
		</div>
		<div class='3u$'>
		<ul class='actions vertical'>
				<b>&nbsp;</b>
				<button id='apply' type='submit' class='button small fit'>Generate</button> 
			</ul>
		</div>
	   </div></form>";

// $href = "<a href=$ds download> Generate Report </a>";

// echo $href;
?>


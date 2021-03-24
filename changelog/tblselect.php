<?php
	require_once("database.php");

	$sql = "SELECT id,version,application,module,description,features,deployed_date,modified_date,remarks FROM reports_tbl ORDER BY id DESC";


	$result = mysqli_query($conn, $sql);
	echo "<table class=table>
				<tr>
					<th>Version</th>
					<th>Remarks</th>
					<th>Application</th>
					<th>Module</th>
					<th>Description</th>
					<th>Features</th>
					<th>Dated Created</th> 
					<th>Dated Modified</th> 
				</tr>";
	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
	  	echo " <tr id={$row["id"]}>
					<td>{$row["version"]}</td>
					<td>{$row["remarks"]}</td>
					<td>{$row["application"]}</td>
					<td>{$row["module"]}</td>
					<td >{$row["description"]}</td>
					<td>{$row["features"]}</td>
					<td>{$row["deployed_date"]}</td>
					<td>{$row["modified_date"]}</td>
				</tr> ";
	  }
	}

		echo "</table>";
?>


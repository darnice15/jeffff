<?php  
	require_once('database.php');

	$ver = $_POST["txtver"];
 	$app= $_POST["txtapp"];
 	$mod= $_POST["txtmod"];
 	$rem=""; //remarks that change the query
 	$d= $_POST["txtdate"]; 
 	$md=date("Y-m-d");
 	$desc= $_POST["txtdesc"];
 	$fea= $_POST["txtfea"];
 	
 	if($_POST["txtrem"]=="Add"){
 		$rem="Added";
 	}else if($_POST["txtrem"]=="Enhance"){
 		$rem="Enhanced";
 	}else if($_POST["txtrem"]=="Change"){
 		$rem="Changed";
 	}else if($_POST["txtrem"]=="Remove"){
 		$rem="Removed";
 	}

 	//$id=$_POST["txtid"]; //supporting data
 	// $sql = "SELECT id,version FROM reports_tbl WHERE id={$id}"; 
 	// $result = mysqli_query($conn, $sql);
 	// 	if (mysqli_num_rows($result) > 0) {
		//   // output data of each row
		//   while($row = mysqli_fetch_assoc($result)) {
		//   	$ver=$row["version"];
		//   }
 	// 	}
 	echo "<br/>" . $ver . "<br/>" . $app . "<br/>" . $mod . "<br/>" . $rem . "<br/>" 
 	. $d . "<br/>" .  $md . "<br/>" . $desc . "<br/>" . $fea . "<br/>" ;
 	 
	echo "<br/> add! <br/> ";
	echo $sql = "INSERT INTO `reports_tbl` 
				(`application`, `module`, `description`, `features`, `remarks`, `deployed_date`, `version`) 
		VALUES ('".$app."', '".$mod."', '".$desc."', '".$fea."', '".$rem."', '".$d."','".$ver."')"; 
	$result = mysqli_query($conn, $sql);
 
?>

<script type="text/javascript">
	window.location.href="index.html";

</script>

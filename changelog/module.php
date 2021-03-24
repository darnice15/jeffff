 <?php 
 require_once("database.php");

 	$sql = "SELECT DISTINCT version FROM `reports_tbl` ORDER BY `ID` DESC LIMIT 2 OFFSET 0";

 	$ver = array();
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	  while($row = mysqli_fetch_assoc($result)) {
	  	array_push($ver,$row["version"]);
	  	
	  }
	}
 ?>

 <form method="post" action="exec.php">
	<div class="row uniform 50%">
		<input type="text" name="txtid" id="txtid" style="display:none">
		<div class="3u 12u$(xsmall)">
			<b>Version</b>
			<!-- <input type="text" class=""  name="txtver" id="txtver" placeholder="Version"> -->
			<select class="" name="txtver" id="txtver" >
				<option value="<?=number_format($ver[0],2) ?>" data-toggle="tooltip" data-placement="right" title="Current Version"> v<?=number_format($ver[0],2)?></option>
				<option value="<?=number_format($ver[0]+0.01,2)?>" data-toggle="tooltip" data-placement="right" title="New Version"> v<?=number_format($ver[0]+0.01,2) ?></option> 
				<option value="<?=number_format($ver[1],2)?>" data-toggle="tooltip" data-placement="right" title="Old Version"> v<?=number_format($ver[1],2)?></option> 
			</select> 
		</div> 
		<div class="3u 12u$(xsmall)"> 
		</div>
		<div class="2u 12u$(xsmall)"> 
			<b>Remark</b>
			<select class="rem" name="txtrem" id="txtremarks" >
				<option value="">- Remarks -</option>
				<option value="Add">Add</option>
				<option value="Enhance">Enhance</option>
				<option value="Change">Change</option>
				<option value="Remove">Remove</option>
			</select> 
			<!-- <input type="text" name="txtrem" id="txtremarks" style="display:none">
			<input type="text" name="dummyrem" id="dummyrem"> -->
			 <!-- class="bi bi-chat-left-quote" -->
		</div> 
		<div class="1u 12u$(xsmall)"></div>
		<div class="3u 12u$(xsmall)">
			<b>Date Post</b>
			<input type="date" name="txtdate" id="date" >
		</div>  
		<div class="6u 12u$(xsmall)">
			<b>Application</b>
			<input type="text" name="txtapp" id="txtapp" value="" placeholder="Application">
		</div>
		<div class="6u 12u$(xsmall)">
			<b>Module</b>
			<input type="text" name="txtmod" id="txtmod" value="" placeholder="Module">
		</div> 
		
		<div class="6u$">
			<b>Description</b>
			<textarea name="txtdesc" id="txtdesc" placeholder="Enter your description here..." rows="6"></textarea>
		</div>
		<div class="6u$">
			<b>Features</b>
			<textarea name="txtfea" id="txtfea" placeholder="Enter your features here..." rows="6"></textarea>
		</div>
		<div class="3u$"></div>
		<div class="6u$"></div>
		<div class="3u$">
			<ul class="actions vertical">
				<button id="apply" type="submit" class="button fit">APPLY</button>
				<!-- <li><a href="#"	class="button fit">Apply</a></li>  -->
			</ul>
		</div> 
</form> 


 
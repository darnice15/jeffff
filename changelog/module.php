 <form method="post" action="exec.php">
	<div class="row uniform 50%">
		<input type="text" name="txtid" id="txtid" style="display:none">
		<div class="3u 12u$(xsmall)">
			<b>Version</b>
			<!-- <input type="text" class=""  name="txtver" id="txtver" placeholder="Version"> -->
			<select class="" name="txtver" id="txtver" >
				<option value="1.11" data-toggle="tooltip" data-placement="right" title="Current Version">v1.11</option>
				<option value="1.12" data-toggle="tooltip" data-placement="right" title="New Version"> v1.12</option> 
				<option value="1.10" data-toggle="tooltip" data-placement="right" title="Old Version"> v1.10</option> 
			</select> 
		</div> 
		<div class="3u 12u$(xsmall)"> 
		</div>
		<div class="2u 12u$(xsmall)"> 
			<!-- <select class="rem" name="txtrem" id="txtremarks" >
				<option value="">- Remarks -</option>
				<option value="Added">Add</option>
				<option value="Enhanced">Enhance</option>
				<option value="Changed">Change</option>
				<option value="Removed">Remove</option>
			</select>  -->
			<b>Remark</b>
			<input type="text" name="txtrem" id="txtremarks" style="display:none">
			<input type="text" name="dummyrem" id="dummyrem">
			 <!-- class="bi bi-chat-left-quote" -->
		</div> 
		<div class="1u 12u$(xsmall)"></div>
		<div class="3u 12u$(xsmall)">
			<b>Date Post</b>
			<input type="date" name="txtdate" id="date">
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


 
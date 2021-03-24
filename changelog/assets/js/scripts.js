// $(document).ready(function(){
// 	$(document).on('keydown','#myName',function(){
// 		var name = $('#myName').val();
		
// 		$.post("quicksearch.php"){
			
// 		}
// 	})

// });

$(document).ready(function(){
	
		var str;
		if(str ==" "){
			$("#txtbody").text(" ");
			return;
		}else{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if(this.readyState==4&&this.status==200)
				{
					$("#txtbody").html(""+this.responseText);
					
				} 
			};
			xmlhttp.open("GET","changelog.php?=q"+str,true);
			xmlhttp.send(); 
		}

	    var str;
		if(str ==" "){
			$("#txtmodule").text(" ");
			return;
		}else{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if(this.readyState==4&&this.status==200)
				{
					$("#txtmodule").html(""+this.responseText); 
				} 
			};
			xmlhttp.open("GET","module.php",true);
			xmlhttp.send();  
		}
 
		var str;
		if(str ==" "){
			$("#txtselect").text(" ");
			return;
		}else{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if(this.readyState==4&&this.status==200)
				{
					$("#txtselect").html(""+this.responseText); 
				} 
			};
			xmlhttp.open("GET","tblselect.php",true);
			xmlhttp.send();  
		}

		// $(document).on('click','#apply',function(){
		// 	alert("Successfully Added!"); 
		// });  
		
		 

		$(document).on('change','#txtremarks',function(){ 
			// $("#txtremarks").attr("display","none");
			// clearfield();

			var rem= $("#txtaction");  
			dateValue(); 
			$(".bgoverlay").css("display","none");
			$(".overlayremarks").css("display","none");
			// $("#dummyrem").val($("#txtaction").val());
			// $("#txtremarks").val($("#txtaction").val());  
			// $("#date").val(d);
		});

		$(document).on('click','#dummyrem',function(){ 
			$(".bgoverlay").css("display","block");
			$(".overlayremarks").css("display","block");
		});

		// $(document).on('click','.xclose',function(){ 
		// 	$(".bgoverlay").css("display","none");
		// 	$(".overlay").css("display","none");
		// });
 	
 		$(document).on('click','tr',function(){ 
 			var trid=this.getAttribute("id"); 
 			
 			var tdver=document.getElementById(trid).childNodes[1].innerHTML; 
 			var tdrem=document.getElementById(trid).childNodes[3].innerHTML; 
 			var tdapp=document.getElementById(trid).childNodes[5].innerHTML; 
 			var tdmod=document.getElementById(trid).childNodes[7].innerHTML; 
 			var tddesc=document.getElementById(trid).childNodes[9].innerHTML;  
 			var tdfea=document.getElementById(trid).childNodes[11].innerHTML;  
 			var tddcreate=document.getElementById(trid).childNodes[13].innerHTML; 
 			var tddmodify=document.getElementById(trid).childNodes[15].innerHTML;  
 			// alert(document.getElementById(trid).childNodes[5].innerHTML);
 			
 			$("#txtver").val(tdver);  
 			$("#txtid").val(trid);  
 			$("#txtapp").val(tdapp);
 			$("#txtmod").val(tdmod); 
 			$("#txtdesc").val(tddesc); 
 			$("#txtfea").val(tdfea);
 			if(tddmodify!=""){
				$("#date").val(tddmodify);
 			}else{ 
 				$("#date").val(tddcreate); 
 			}
 			
 				$(".bgoverlay").css("display","none");
 				$(".overlay").css("display","none"); 
		});	

 		var str;
		if(str ==" "){
			$("#divgen").text(" ");
			return;
		}else{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if(this.readyState==4&&this.status==200)
				{
					$("#divgen").html(""+this.responseText);
					
				} 
			};
			xmlhttp.open("GET","generatereport.php?=q"+str,true);
			xmlhttp.send(); 
		}

		// $('#btn').tooltip({ boundary: 'window' });
 	
 			
});

		
function clearfield(){
	// $("#txtver").val("");  
	$("#txtid").val("");  
	$("#txtapp").val("");
	$("#txtmod").val(""); 
	$("#txtdesc").val(""); 
	$("#txtfea").val("");
	$("#date").val("");
}

// $(function () {
//   $('[data-toggle="tooltip"]').tooltip()
// })

function dateValue(){
	var d=new Date();
	var yr = d.getFullYear();
	var day = d.getDate();
	var mnth = ""+(d.getMonth()+1);
	if(mnth.length==1){
		mnth="0"+mnth;
	}  
	d=yr+"-"+mnth+"-"+day; 
	document.getElementById("date").value = d; 
	// alert(d); 
}


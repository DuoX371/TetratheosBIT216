//loginBtn
var frm = $('#loginForm');
frm.submit(function(e) {
	var user = document.getElementById('username').value;
	var pass = document.getElementById('password').value;
	e.preventDefault();
	if(user === "" || pass === "") {document.getElementById("modalContent").innerHTML = "Please fill in username/password"; return;}
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: frm.serialize()+"&login=",
		success: function(response){
			console.log("success");
			if(response == 'a'){
				document.getElementById("modalContent").innerHTML = "Login Successful... Redirecting.."
				setTimeout(function(){window.location.href='/tetratheos/recordbatch.php';},1000);

			}else if(response == 'p'){
				document.getElementById("modalContent").innerHTML = "Login Successful... Redirecting.."
				setTimeout(function(){window.location.href='index.php';},1000);
			}else document.getElementById("modalContent").innerHTML = "Login Failed..."
		},
		error: function(data) {
			console.log("fail");
		}
	});
});

//registerAdmin
var adminFrm = $('#adminRegForm');
adminFrm.submit(function(e) {
	console.log(adminFrm.serialize());
	var centerName = document.getElementById('centreName').value;
	var userA = document.getElementById('usernameA').value;
	var passA = document.getElementById('passA').value;
	var emailA = document.getElementById('emailA').value;
	var fnameA = document.getElementById('fnameA').value;
	var staffid = document.getElementById('staffid').value;
	e.preventDefault();
	if(centerName === "validate"){
		document.getElementById("modalContent").innerHTML = "Please select a center name.";
		return;
	}
	if(userA === "" || passA === "" || emailA === "" || fnameA === "" || staffid === "") {
		document.getElementById("modalContent").innerHTML = "Please fill in all the blanks";
		return;
	}
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: adminFrm.serialize()+"&registerAdmin=",
		success: function(response){
			console.log(response);
			if(response){
				document.getElementById("modalContent").innerHTML = "Successful registered. Please login to continue";
				setTimeout(function(){window.location.href='login.php';},3000);
			}else {
				document.getElementById("modalContent").innerHTML = "Username is already in use...";
			}
		},
		error: function(data) {
			console.log("fail");
		}
	});
});

//registerPatient
var patientFrm = $('#registerPatient');
patientFrm.submit(function(e) {
	console.log(patientFrm.serialize());
	var userP = document.getElementById('usernameP').value;
	var passP = document.getElementById('passP').value;
	var emailP = document.getElementById('emailP').value;
	var fnameP = document.getElementById('fnameP').value;
	var icp = document.getElementById('icp').value;
	e.preventDefault();
	if(userP === "" || passP === "" || emailP === "" || fnameP === "" || icp === "") {
		document.getElementById("modalContent").innerHTML = "Please fill in all the blanks";
		return;
	}
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: patientFrm.serialize()+"&registerPatient=",
		success: function(response){
			console.log(response);
			if(response){
				document.getElementById("modalContent").innerHTML = "Successful registered. Please login to continue";
				setTimeout(function(){window.location.href='login.php';},3000);
			}else {
				document.getElementById("modalContent").innerHTML = "Username is already in use...";
			}
		},
		error: function(data) {
			console.log("fail");
		}
	});
});

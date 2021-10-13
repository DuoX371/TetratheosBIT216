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
			console.log(response);
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
	var inputCentre = document.getElementById('inputCentre').value;
	var inputCentreAdd = document.getElementById('inputCentreAdd').value;
	var userA = document.getElementById('usernameA').value;
	var passA = document.getElementById('passA').value;
	var emailA = document.getElementById('emailA').value;
	var fnameA = document.getElementById('fnameA').value;
	var staffid = document.getElementById('staffid').value;
	e.preventDefault();
	if(inputCentre.length === 0 || inputCentreAdd.length === 0){
		if(centerName === "validate"){
			document.getElementById("modalContent").innerHTML = "Please select a center name.";
			return;
		}
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

//display healthcarecentre and address
var tableLocation = $('#tableLocation');
var toastTrigger ="";
var toastLiveExample="";
function displayVacccine(vaccineID){
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: {
			vaccineID: vaccineID,
			selectVaccine: "",
		},
		success: function(response){
			tableLocation[0].hidden = false;
			document.getElementById("batchInfo").hidden = true;
			document.getElementById("batchInfoDetailer").hidden = true;
			tableLocation[0].getElementsByTagName('tbody')[1].innerHTML = "";
			data = JSON.parse(response);
			data.forEach(d => {
				document.getElementById("tableLocation").getElementsByTagName('tbody')[1].innerHTML +=
				`<tr>
				<td>${d.centreName}</td>
		    <td>${d.address}</td>
				<td><button type='button' class='btn btn-primary'
				onclick='availableVaccines(this.value,this.getAttribute("data-value"))' value='${d.centreName}' data-value='${d.vaccineID}'>Select</button></td>
				</tr>`;
			});
		},
		error: function(data) {
			console.log("fail");
		}
	});
}

//display batch information
var batchInfo = $('#batchInfo');
function availableVaccines(centreName,vaccineID){
	console.log(centreName,vaccineID);
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: {
			centreName: centreName,
			vaccineID: vaccineID,
			selectCentre: "",
		},
		success: function(response){
			console.log(response.length);
			if(response.length > 2){
				if(response){
					batchInfo[0].removeAttribute("hidden");
					document.getElementById("batchInfoDetailer").hidden = true;
					batchInfo[0].getElementsByTagName('tbody')[1].innerHTML = "";
					data = JSON.parse(response);
					console.log(data);
					data.forEach(d => {
						document.getElementById("batchInfo").getElementsByTagName('tbody')[1].innerHTML +=
						`<tr>
						<td>${d.batchNo}</td>
						<td><button type='button' class='btn btn-primary' onclick='batchInfoDetailed(this.value)' value='${d.batchNo}'>Select</button></td>
						</tr>`;
					});
				}
			}else if (response.length === 0) {
				console.log("Please Log in to continue");
				var toastLiveExample = document.getElementById('liveToast');
				var toast = new bootstrap.Toast(toastLiveExample);
    		toast.show();
			}else{
				batchInfo[0].removeAttribute("hidden");
				document.getElementById("batchInfoDetailer").hidden = true;
				document.getElementById("batchInfo").getElementsByTagName('tbody')[1].innerHTML = `
				<tr>
				<td>No available batch for selected options</td>
				<td></td>
				</tr>`;
			}
		},
		error: function(data) {
			console.log("fail");
		}
	});
}

//display expirydate and quantityAvailable
var batchInfoDetailer = $('#batchInfoDetailer');
function batchInfoDetailed(batchNo){
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: {
			batchNo: batchNo,
			batchInfoDetailed: "",
		},
		success: function(response){
			console.log(response);
			data = JSON.parse(response);
			console.log(data);
			batchInfoDetailer[0].removeAttribute("hidden");
			batchInfoDetailer[0].getElementsByTagName('tbody')[1].innerHTML = "";
			data.forEach(d => {
				document.getElementById("batchInfoDetailer").getElementsByTagName('tbody')[1].innerHTML +=
				`<tr>
				<td>${d.expiryDate}</td>
				<td>${d.quantityAvailable}</td>
				<td><button type='button' class='btn btn-primary'  onclick='displayAppointmentDetails(this.value)' data-bs-toggle="modal" data-bs-target="#confirmation" value='${d.batchNo}'>Select</button></td>
				</tr>`;
			});
		},
		error: function(data) {
			console.log("fail");
		}
	});
}

//confirmation box appointment
function displayAppointmentDetails(batchNo){
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: {
			batchNo: batchNo,
			displayAppointmentDetails: "",
		},
		success: function(response){
			console.log(response);
			data = JSON.parse(response);
			document.getElementById("selectedVaccine").innerHTML =
			`<input value='${data[0].vaccineName}' readonly><input name='batchNo' value='${batchNo}' hidden>`;
			document.getElementById("selectedCentre").innerHTML = `<input value='${data[0].centreName}' readonly>`;
			document.getElementById("selectedExpiryDate").innerHTML = `<input name='expiryDate' value='${data[0].expiryDate}' readonly>`;
		},
		error: function(data) {
			console.log("fail");
		}
	});
}

//submit appointment
var appFrm = $('#submitAppointment');
appFrm.submit(function(e){
	document.getElementById("btnSub").disabled = true;
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "functions/process.php",
		data: appFrm.serialize()+"&submitAppointment=",
		success: function(response){
			console.log(response);
			if(response === "a"){
				document.getElementById("responseI").innerHTML = `
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Registration Successful!</strong> Thank you for registering your vaccination with Thetratheos.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>`;
				setTimeout(function(){window.location.href='findVex.php';},3000);
			}else if(response === "b"){
				document.getElementById("responseI").innerHTML = `
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Registration Failed!</strong> Please select a valid date.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>`;
				document.getElementById("btnSub").disabled = false;
			}else if(response === "c"){
				document.getElementById("responseI").innerHTML = `
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Registration Failed!</strong> You have already made an appointment for this batch.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>`;
				document.getElementById("btnSub").disabled = false;
			}
		},
		error: function(data) {
			console.log("fail");
		}
		})
});

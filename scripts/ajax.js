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

//login
function loginBtn(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	$.ajax({
		url: 'functions/process.php',
		type: 'POST',
		data:{
			username: username,
			password: password,
			login:'',
		},
		success:function(response){
			console.log(response);
			if(response == 'a'){
				window.location.href='index.php';
			}else if(response == 'p'){
				window.location.href='index.php';
			}else alert("Incorrect login details");
		},
		error: function(data) {
			console.log("fail");
		}
	});
}

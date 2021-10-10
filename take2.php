<html>
	<form action="functions/process.php" method="POST" id="loginForm">
	  <label for="username"><b>Username</b></label>
	  <input type="text" placeholder="Enter Username" name="username" required>

	  <label for="pass"><b>Password</b></label>
	  <input type="password" placeholder="Enter Password" name="pass" required>

	  <button type="submit" name="test">Login</button>
	</form>
	<button type="button" onclick="test()">test</button>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
var frm = $('#loginForm');
frm.submit(function(e) {
	console.log(frm.serialize());
    e.preventDefault(); // avoid to execute the actual submit of the form.
    $.ajax({
           type: "POST",
           url: "functions/process.php",
           data: frm.serialize()+"&test=", // serializes the form's elements.
           success: function(response){
               console.log(response); // show response from the php script.
							 console.log("success");
           },
					 error: function(data) {
			 			console.log("fail");
			 		}
         });
});

function test(){
	console.log("a");
}
</script>

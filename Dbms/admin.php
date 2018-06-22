<?php

require_once 'core/init.php';

$user= new user();
if(!($user->isLoggedIn() && $user->data()->group== 2))
{
	Redirect::to('login.php');
}

?>
<p><a href="logout.php">Logout</a></p><br>
<p>Add the sales employee</p>
<form id='form1' method="post" action="form1.php">
	<label>Name : </label><input type="text" name="name" minlength="4" maxlength="20" id='e_name'>
	<label>Username : </label><input type="text" name="username" minlength="4" maxlength="10" id='e_uname'>
	<label>Password : </label><input type="password" name="pass" minlength="4" maxlength="20" id='e_pass'>
	<button type="submit" id='button1'>Submit</button>
</form>
<br>
<p>Add the inventory manager</p>
<form id='form2' method="post" action="form2.php">
	<label>Name : </label><input type="text" name="name" minlength="4" maxlength="20" id='i_name'>
	<label>Username : </label><input type="text" name="username" minlength="4" maxlength="10" id='i_uname'>
	<label>Password : </label><input type="password" name="pass" minlength="4" maxlength="20" id='i_pass'>
	<button type="submit" id='button2'>Submit</button>
</form>
<br>
<p>Add the Supplier</p>
<form id='form3' method="post" action="form3.php">
	<label>Name :</label><input type="text" name="name" minlength="4" maxlength="20" id='s_name'>
	<label>Address :</label><input type="text" name="addr" minlength="5" maxlength="100" id='s_addr'>
	<label>Email :</label><input type="email" name="email" minlength="3" maxlength="20" id='s_email'>
	<label>Contact :</label><input type="number" name="contact" minlength="10" maxlength="13" id='s_contact'>
	<button type="submit" id='button3'>Submit</button>
</form>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$("#form1").submit(function(){
			var uname = $("#form1 input[name='username']").val();
			var name= $("#form1 input[name='name']").val();
			var pass= $("#form1 input[name='pass']").val();
			// alert(uname);
			$.ajax({
    				
    				url:'form1.php',
    				data: 'name ='+ name + '&uname ='+ uname + '&pass ='+ pass,
    				method: 'post',
    				success: function(result){
    					// alert('Sales employee successfully inserted');
    					alert(result);
    				}
    			});
		});



	});
</script> -->
<?php

require_once 'core/init.php';

$user= new user();
if(!($user->isLoggedIn() && $user->data()->group== 1))
{
	Redirect::to('login.php');
}
?>


<p><a href="logout.php">Logout</a></p><br><br><br>
<form action="test.php" method="get">
<label>Enter the customer information</label>
<br><br>
<label>Name :</label><input type="text" name="name" id='name' minlength="4" maxlength="20">
<label>Contact :</label><input type="number" name="contact" id='contact' minlength="10" maxlength="13">
<label>Address :</label><input type="text" name="addr" id='addr' minlength="5" maxlength="100">
<label>Email :</label><input type="email" name="email" id='email' minlength="4" maxlength="20">
<br><br>
<label>Enter the information about the product bought</label><br><br>
<label>Product ID :</label><input type="number" name="pid" id='pid' minlength="1" maxlength="10">
<label>Quantity :</label><input type="number" name="quantity" minlength="1" maxlength="10">
<label>Cost of each unit :</label><input type="number" name="cost" id='cost' minlength="1" maxlength="10">
<button type="submit">Submit</button>
</form>
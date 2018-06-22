<?php

require_once 'core/init.php';

$user= new user();
if(!($user->isLoggedIn() && $user->data()->group== 3))
{
	Redirect::to('login.php');
}
?>
<?php
if(Input::exists('post'))
{
	$supemail=Input::get('email');
	$db=DB::getInstance();
	$sup=$db->get('supplier',array('e_mail','=',$supemail));
	$supid=$sup->results()[0]->supid;

	$purchases=$db->insert('purchases',array(
		'supid'=>$supid,
		'pid'=>Input::get('pid'),
		'dop'=>Input::get('dop'),
		'quantity'=>Input::get('quantity'),
		'cost_item'=>Input::get('cost')
		));

	$product=$db->insert('product',array(
			'pid'=>Input::get('pid'),
			'pname'=>Input::get('pname'),
			'cost'=>Input::get('cost'),
			'category'=>Input::get('category'),
			'brand'=>Input::get('brand')

		));


	$units=Input::get('quantity');
	$pid=Input::get('pid');
	$units_available=$db->query('update product set units_avail = units_avail +'.$units.'where pid ='.$pid);
	Redirect::to('inventory_manager.php');

}





?>
<p><a href="logout.php">Logout</a></p><br>


<form action="#" method="post">
<label>Enter the information about Supplier</label>
<br><br>
<label> Supplier Email :</label><input type="email" name="email" id='email' minlength="4" maxlength="20">
<br><br>
<label>Enter the information about the product</label><br><br>
<label> Product ID :</label><input type="number" name="pid" id='pid' minlength="1" maxlength="10">
<label> Product Name :</label><input type="text" name="pname" id='pname' minlength="4" maxlength="20">
<label> Product Category :</label><input type="text" name="category" id='category' minlength="4" maxlength="20">
<label> Brand of product :</label><input type="text" name="brand" id='brand' minlength="4" maxlength="20">
<label> Quantity :</label><input type="number" name="quantity" id='quantity' minlength="1" maxlength="10">
<label> Date of purchase :</label><input type="date" name="dop" id='dop'>
<label> Cost of each unit :</label><input type="number" name="cost" id='cost' minlength="1" maxlength="10">

<button type="submit"> Submit</button>
</form>
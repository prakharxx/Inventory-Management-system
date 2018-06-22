<?php

require_once 'core/init.php';

if(Input::exists('get'))
{	
	$rand= mt_rand(10,10000000);
	$sid=substr(md5($rand),18);
	$total_cost=Input::get('quantity')*Input::get('cost');
	$date= date('Y-m-d H:i:s');

	$db=DB::getInstance();
	
		$sales= $db->insert('sales',array(
		'pid'=>Input::get('pid'),
		'date_sale'=>$date,
		'quantity'=>Input::get('quantity'),
		'cost'=>Input::get('cost'),
		'sid'=>$sid
		));
	
	$db=DB::getInstance();
	$customer=$db->insert('customer',array(
		'sid'=>$sid,
		'name'=>Input::get('name'),
		'phone'=>Input::get('contact'),
		'address'=>Input::get('addr'),
		'e_mail'=>Input::get('email'),
		'total_cost'=>$total_cost
		));


	$units=Input::get('quantity');
	$pid=Input::get('pid');
	$units_available=$db->query('update product set units_avail = units_avail -'.$units.'where pid ='.$pid);
	Redirect::to('sales_employee.php');
	
}
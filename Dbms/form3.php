<?php
require_once 'core/init.php';

if(Input::exists('post'))
{
	$db=DB::getInstance();

	$sup=$db->query('select * from supplier order by supid desc;');
	$supid=$sup->results()[0]->supid;


	try {$data=$db->insert('supplier',array(
			'supid'=>$supid+1,
			'sname'=>Input::get('name'),
			'address'=>Input::get('addr'),
			'e_mail'=>Input::get('email'),
			'phone_num'=>Input::get('contact')

		));
		}catch(EXception $e)
			{die($e->getMessage());}


		Redirect::to('admin.php');
}
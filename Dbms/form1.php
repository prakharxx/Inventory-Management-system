<?php

require_once 'core/init.php';

if(Input::exists('post'))
{


 			$user = new User();
            $salt = Hash::salt(32);

            try {
                $user->create(array(
                    'name' => Input::get('name'),
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('pass'), $salt),
                    'salt' => $salt,
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1
                ));
            }catch (Exception $e){die($e->getMessage());}

            Redirect::to('admin.php');


}
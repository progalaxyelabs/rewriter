<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('home_index');
	}
	public function create_form()
	{
		return view('home_create_form.php');
	}
	public function form()
	{
		return view('home_form.php');
	}


}
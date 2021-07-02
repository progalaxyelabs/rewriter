<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('home_index');
	}
	public function rewriter()
	{
		return view('home_index.php');
	}
	public function create_form()
	{
		return view('home_create_form.php');
	}
	public function template()
	{
		return view('template.php');
	}


}

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
		return view('home_create_form');
	}
	public function Nav()
	{
		return view('home_nav');
	}
	public function templates()
	{
		return view('home_templates');
	}


}

<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('home_nav');
	}
	public function create_form()
	{
		return view('home_create_form');
	}
	public function home_index()
	{
		return view('home_index');
	}
	public function templates()
	{
		return view('home_templates');
	}
	public function new_templates()
	{
		$data = $_POST["fname"];
		
		$file=fopen(APPPATH."Views/$data.php","w");
		
		
		return view('new_screen');
	}


}

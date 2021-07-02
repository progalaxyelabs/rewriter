<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
	public function rewriter()
	{
		return view('rewriter.php');
	}
	public function rewriter1()
	{
		return view('create_form.php');
	}
	public function create_textbox()
	{
		return view('create_textbox.php');
	}


}

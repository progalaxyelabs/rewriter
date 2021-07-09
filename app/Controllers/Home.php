<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('templates');
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
		$templates_query = $this->db->query('select * from templates');
		$templates = $templates_query->getResult();
		return view('home_templates', ['templates' => $templates],);
		
	}
	public function template()
	{
		$id = $this->request->getGet('id');
		$template_query = $this->db->query('select * from templates where id = ?', [$id]);
		$template = $template_query->getRow();
		return view('home_template', ['template' => $template]);
	}
	public function new_template_submit()
	{
		$template_name = $this->request->getPost('fname');

		$this->db->table('templates')->insert(['name' => $template_name]);

		$template_id = $this->db->insertID();

		return redirect()->to('/home/template?id=' . $template_id);
	}
	public function new_screen()
	{
		return view('new_screen_submit');
	}


}

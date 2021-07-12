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
	public function all_templates()
	{
		$templates_query = $this->db->query('select * from templates');
		$templates = $templates_query->getResult();
		return view('home_all_templates', ['templates' => $templates],);
		
	}
	public function template()
	{
		$template_id = filter_input(INPUT_GET, 'template_id', FILTER_SANITIZE_STRING);
		$template = $this->db->query('select * from templates where id = ?', [$template_id])->getRow();
		return view('home_template', ['template' => $template]);
	}
	public function new_template_submit()
	{
		$template_name = filter_input(INPUT_POST, 'template_name', FILTER_SANITIZE_STRING);
		$template = ['name' => $template_name];
		$this->db->table('templates')->insert($template);
		$template_id = $this->db->insertID();
		return redirect()->to('/home/template?template_id=' . $template_id);
	}
	public function new_screen_submit()
	{
		$screen_name = filter_input(INPUT_POST, 'screen_name', FILTER_SANITIZE_STRING);
		$template_id = filter_input(INPUT_POST, 'template_id', FILTER_SANITIZE_STRING);
		$screen = ['name' => $screen_name,'template_id' => $template_id];
		$this->db->table('screens')->insert($screen);
		$screen_id = $this->db->insertID();
		return redirect()->to('/home/screen?screen_id=' . $screen_id);
	}
	public function screen()
	{
		$screen_id = filter_input(INPUT_GET, 'screen_id', FILTER_SANITIZE_STRING);
		$screen = $this->db->query('select s.id as screen_id, s.name as screen_name, s.template_id, t.name as template_name from screens s join templates t on s.template_id = t.id where s.id = ?', [$screen_id])->getRow();
		return view('home_screen', ['screen' => $screen]);
	}

}

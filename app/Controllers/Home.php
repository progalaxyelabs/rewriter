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
	public function all_templates()
	{
		$templates_query = $this->db->query('select * from templates');
		$templates = $templates_query->getResult();
		return view('home_all_templates', ['templates' => $templates],);
	}
	public function template()
	{
		$template_id = filter_input(INPUT_GET, 'template_id', FILTER_SANITIZE_STRING);
		$sql = "
		select t.id as template_id,
		t.name as template_name,
		s.id as screen_id,
		s.name as screen_name
		from templates t
		left join screens s on s.template_id = t.id
		where t.id = ?
		";
		$template_screens = $this->db->query($sql, [$template_id])->getResult();
		return view('home_template', ['template_screens' => $template_screens]);
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
		$screen = ['name' => $screen_name, 'template_id' => $template_id];
		$this->db->table('screens')->insert($screen);
		$screen_id = $this->db->insertID();
		return redirect()->to('/home/screen?screen_id=' . $screen_id);
	}
	public function new_form_submit()
	{
		$form_name = filter_input(INPUT_POST, 'form_name', FILTER_SANITIZE_STRING);
		$screen_id = filter_input(INPUT_POST, 'screen_id', FILTER_SANITIZE_STRING);
		$form = [
			'name' => $form_name,
			'screen_id' => $screen_id
		];
		$this->db->table('forms')->insert($form);
		$form_id = $this->db->insertID();
		log_message('debug', 'Home::form() - $form is ' .  print_r($form, true));
		return redirect()->to('/home/form?form_id=' . $form_id);
	}
	public function screen()
	{
		$screen_id = filter_input(INPUT_GET, 'screen_id', FILTER_SANITIZE_STRING);
		//$form_id = filter_input(INPUT_GET,'form_id',FILTER_SANITIZE_STRING);
		$sql = "
		select s.id as screen_id,
		s.name as screen_name,
		s.template_id,
		t.name as template_name
		from screens s
		join templates t on s.template_id = t.id
		where s.id = ?
		";
		$screen_forms_sql = "select * from forms where screen_id = ?";
		$screen = $this->db->query($sql, [$screen_id])->getRow();
		$screen_forms = $this->db->query($screen_forms_sql,[$screen_id])->getResult();
		log_message('debug', '$form is ' .  print_r($screen_forms,true));
		return view('home_screen', ['screen' => $screen,'screen_forms' => $screen_forms]);
	}
	public function form()
	{
		$form_id = filter_input(INPUT_GET, 'form_id', FILTER_SANITIZE_STRING);
		$sql = "
		select f.id as form_id,
		f.name as form_name,
		s.id as screen_id,
		s.name as screen_name,
		t.id as template_id,
		t.name as template_name
		from forms f
		join screens s on s.id = f.screen_id
		join templates t on t.id = s.template_id
		where f.id = ?
		";
		$form = $this->db->query($sql, [$form_id])->getRow();
		return view('home_form', ['form' => $form]);
	}
	public function save_form()
	{
		$form_id = filter_input(INPUT_POST, 'form_id', FILTER_SANITIZE_STRING);
		$config = filter_input(INPUT_POST, 'config', FILTER_SANITIZE_STRING);
		$this->db->query('update forms set config = ? where id = ?', [$config, $form_id]);
	}
}
<?php

namespace App\Controllers;

use App\Libraries\FormConfig;
use App\Libraries\Queries;

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
		$templates_query = $this->db->query('select * from generic_templates');
		$templates = $templates_query->getResult();
		return view('home_all_templates', ['templates' => $templates],);
	}
	public function template()
	{
		$template_id = filter_input
		(INPUT_GET, 'generic_template_id', FILTER_SANITIZE_STRING);
		$template_screens = $this->db->query(
			Queries::GetGenericScreensByTemplateId,
			[$template_id])->getResult();
		log_message('debug', 'Home::templates - template_screens are ' . print_r($template_screens, true));
		return view('home_template', ['template_screens' => $template_screens]);
	}
	public function new_template_submit()
	{
		$template_name = filter_input
		(INPUT_POST, 'generic_template_name', FILTER_SANITIZE_STRING);
		$template = ['name' => $template_name];
		$this->db->table('templates')->insert($template);
		$template_id = $this->db->insertID();
		return redirect()->to('/home/template?generic_template_id=' . $template_id);
	}
	public function new_screen_submit()
	{
		$screen_name = filter_input
		(INPUT_POST, 'generic_screen_name', FILTER_SANITIZE_STRING);
		$template_id = filter_input
		(INPUT_POST, 'generic_template_id', FILTER_SANITIZE_STRING);
		$screen = ['name' => $screen_name, 'template_id' => $template_id];
		$this->db->table('screens')->insert($screen);
		$screen_id = $this->db->insertID();
		return redirect()->to('/home/screen?generic_screen_id=' . $screen_id);
	}
	public function new_form_submit()
	{
		$form_name = filter_input
		(INPUT_POST, 'generic_form_name', FILTER_SANITIZE_STRING);
		$screen_id = filter_input
		(INPUT_POST, 'generic_screen_id', FILTER_SANITIZE_STRING);
		$form = [
			'generic_form_name' => $form_name,
			'generic_screen_id' => $screen_id
		];
		$this->db->table('generic_forms')->insert($form);
		$form_id = $this->db->insertID();
		log_message('debug',
		 'Home::form() - $form is ' .  print_r($form, true));
		return redirect()->to('/home/form?generic_form_id=' . $form_id);
	}
	public function screen()
	{
		$screen_id = filter_input
		(INPUT_GET, 'generic_screen_id', FILTER_SANITIZE_STRING);
		$screen = $this->db->query(
			Queries::GetGenericScreenByTemplateId,
			[$screen_id])->getRow();
		$screen_forms_sql = "select * from generic_forms where generic_screen_id = ?";
		$screen_forms = 
		$this->db->query($screen_forms_sql, [$screen_id])->getResult();
		log_message('debug', '$form is ' .  print_r($screen_forms, true));
		return 
		view('home_screen', ['screen' => $screen, 'screen_forms' => $screen_forms]);
	}
	public function form()
	{
		$form_id = filter_input(INPUT_GET, 'generic_form_id', FILTER_SANITIZE_STRING);
		$form = $this->db->query(
			Queries::GetGenericFormByFormId,
			[$form_id])->getRow();
		return view('home_form', ['form' => $form]);
	}
	public function save_form()
	{
		$fc = FormConfig::init();
		if ($fc->form_id) {
			$this->db->query('update generic_forms set config = ? where generic_form_id = ?',
			 [$fc->config, $fc->form_id]);
		}
		$result = ['status' => 'ok'];
		return $this->response->setJSON($result);
	}
	public function form_config()
	{
		$input = json_decode(file_get_contents('php://input'));
		$form_id = $input->form_id ?? '';
		$form_id = filter_var($form_id, FILTER_SANITIZE_STRING);
		$config_row = $this->db->query('select config from generic_forms where generic_form_id = ?', [$form_id])->getRow();
		log_message('debug', 'Home::form_config, db result is ' . print_r($config_row, true));
		$config = json_decode($config_row->config);
		$result = ['status' => 'ok', 'config' => $config];
		return $this->response->setJSON($result);
	}
	public function customers()
	{
		return view('home_customers');
	}
	public function new_customer()
	{
		return view('home_new_customer');
	}
	public function new_customer_submit()
	{
		return view('customer');
	}
	public function customer_screen()
	{
		return view('customer_screen');
	}
}

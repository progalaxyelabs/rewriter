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
		$templates = $this->db->query(
			Queries::GetAllGenericTemplates
		)->getResult();

		return view('home_all_templates', ['templates' => $templates],);
	}

	public function template()
	{
		$template_id = filter_input(
			INPUT_GET,
			'generic_template_id',
			FILTER_SANITIZE_STRING
		);

		$template_screens = $this->db->query(
			Queries::GetGenericScreensByTemplateId,
			[$template_id]
		)->getResult();

		return view('home_template', ['template_screens' => $template_screens]);
	}

	public function new_template_submit()
	{
		$template_name = filter_input(
			INPUT_POST,
			'generic_template_name',
			FILTER_SANITIZE_STRING
		);

		$template = ['generic_template_name' => $template_name];
		$this->db->table('generic_templates')->insert($template);
		$template_id = $this->db->insertID();

		return redirect()
			->to('/home/template?generic_template_id=' . $template_id);
	}

	public function new_screen_submit()
	{
		$screen_name = filter_input(
			INPUT_POST,
			'generic_screen_name',
			FILTER_SANITIZE_STRING
		);

		$template_id = filter_input(
			INPUT_POST,
			'generic_template_id',
			FILTER_SANITIZE_STRING
		);

		$screen = [
			'generic_screen_name' => $screen_name,
			'generic_template_id' => $template_id
		];

		$this->db->table('generic_screens')->insert($screen);
		$screen_id = $this->db->insertID();

		return redirect()->to('/home/screen?generic_screen_id=' . $screen_id);
	}

	public function new_form_submit()
	{
		$form_name = filter_input(
			INPUT_POST,
			'generic_form_name',
			FILTER_SANITIZE_STRING
		);

		$screen_id = filter_input(
			INPUT_POST,
			'generic_screen_id',
			FILTER_SANITIZE_STRING
		);

		$form = [
			'generic_form_name' => $form_name,
			'generic_screen_id' => $screen_id
		];

		$this->db->table('generic_forms')->insert($form);
		$form_id = $this->db->insertID();

		return redirect()->to('/home/form?generic_form_id=' . $form_id);
	}

	public function screen()
	{
		$screen_id = filter_input(
			INPUT_GET,
			'generic_screen_id',
			FILTER_SANITIZE_STRING
		);

		$screen = $this->db->query(
			Queries::GetGenericScreenByTemplateId,
			[$screen_id]
		)->getRow();

		$screen_forms = $this->db->query(
			Queries::GetGenericFormsByScreenId,
			[$screen_id]
		)->getResult();

		return view('home_screen', [
			'screen' => $screen,
			'screen_forms' => $screen_forms
		]);
	}

	public function form()
	{
		$form_id = filter_input(
			INPUT_GET,
			'generic_form_id',
			FILTER_SANITIZE_STRING
		);

		$form = $this->db->query(
			Queries::GetGenericFormByFormId,
			[$form_id]
		)->getRow();

		return view('home_form', ['form' => $form]);
	}

	public function save_form()
	{
		$fc = FormConfig::init();

		if ($fc->form_id) {
			$this->db->query(
				Queries::UpdateGenericFormConfig,
				[$fc->config, $fc->form_id]
			);

			$result = ['status' => 'ok'];
			return $this->response->setJSON($result);
		}

		return $this->response->setJSON(['status' => 'fail']);
	}

	public function form_config()
	{
		$input = json_decode(file_get_contents('php://input'));
		$form_id = $input->form_id ?? '';
		$form_id = filter_var($form_id, FILTER_SANITIZE_STRING);

		$config_row = $this->db->query(
			Queries::GetGenericFormConfigById,
			[$form_id]
		)->getRow();
		
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

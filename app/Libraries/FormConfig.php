<?php

namespace App\Libraries;

class FormConfig
{
	public $form_id;
	public $config;



	private function __construct($input)
	{
		$this->form_id = $input->form_id ?? '';
		$this->config = $input->config ?? [];

		$this->form_id = filter_var($this->form_id, FILTER_SANITIZE_STRING);
		$this->config = $this->sanitize_config();
	}

	protected function sanitize_config()
	{
		log_message('warning', 'FormConfig::sanitize_config: satinize not implemented');
		return json_encode($this->config);
	}

	public static function init()
	{
		try {
			$input = json_decode(file_get_contents('php://input'));
			$form_config = new FormConfig($input);
			return $form_config;
		} catch (\Exception $ex) {
			log_message('error', 'input_sanitizer exception ' . $ex->getMessage());
		}
		return null;
	}
}

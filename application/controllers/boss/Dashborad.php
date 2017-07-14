<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Sistema_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('atendimentos_model', 'atendimentos');//model diferente
	}


	public function index()
	{
		$data = array(
			'title' => 'GetDoctors - Seus atendimentos!',
			'description' => 'GetDoctors levará um médico para onde você quiser! Sem filas, sem burocracia, sem esperas. Esqueça o desconforto dos pronto-atendimentos, tenha atendimento médico no conforto de sua casa.',
			'csrf_name' => $this->security->get_csrf_token_name(),
			'csrf_hash' => $this->security->get_csrf_hash(),
			'atendimentos' => $this->atendimentos->atendimentos()
		);
		$data += $this->atendimentos->dados();

		$this->load->view('paciente/header', $data);
		$this->load->view('paciente/atendimentos', $data);
		$this->load->view('paciente/footer.php');
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		# DEPURAR PÁGINAS:
		//$this->output->enable_profiler(TRUE);

	}


	public function index()
	{
		$data = array(
			'title' => 'Title',
			'description' => 'Description',
			'csrf_name' => $this->security->get_csrf_token_name(),
			'csrf_hash' => $this->security->get_csrf_hash()
		);
		$this->load->view('login/header', $data);
		$this->load->view('login/index', $data);
		$this->load->view('login/footer.php', $data);

		if($this->session->flashdata('autenticar')){
			$this->output->append_output('');
		}
		if($this->session->flashdata('newsletter')){
			$this->output->append_output('');
		}
		if($this->session->flashdata('criar_conta')){
			$this->output->append_output('');
		}
		if($this->session->flashdata('recuperar_senha_paciente')){
			$this->output->append_output('');
		}
		if($this->session->flashdata('recuperar_senha_medico')){
			$this->output->append_output('');
		}
	}


	public function recuperar_senha()
	{

		$data['email'] = $this->input->post('email');
		$data['cpf'] = $this->input->post('cpf');
		$senha = $this->site->recuperar_senha_paciente($data);

		if($senha != 'false'){
			$this->email->from("contato@getdoctors.com.br", 'GetDoctors.com.br');
			$this->email->subject("Recuperação de senha");
			$this->email->to($data['email']);
			$this->email->message("<b>SUA SENHA: </b>" . $senha);
			if($this->email->send()){
				$this->session->set_flashdata('recuperar_senha_paciente', 'Sua senha foi enviada para seu e-mail!');
			}else{
				$this->session->set_flashdata('recuperar_senha_paciente', 'Ops! Sua senha não foi enviada. Tente novamente! Se o erro persistir entre em contato com nossa equipe!');
			}
			redirect('', 'refresh');
		} else {
			$this->session->set_flashdata('recuperar_senha_paciente', 'Email ou CPF não possuem conta vinculada!');
			redirect('', 'refresh');
		}
	}



    public function autenticar()
	{
		$autenticacao = $this->site->autenticar_paciente();
		if($autenticacao){
			$this->session->set_userdata(array(
											'User_type' => 'paciente',
											'id' => $autenticacao['id'],
											'email' => $autenticacao['email'],
											'nome' => $autenticacao['nome'],
											'telefone' => $autenticacao['telefone'],
											'celular' => $autenticacao['celular'],
											'nascimento' => $autenticacao['data_de_nascimento'],
											'cidade' => $autenticacao['cidade'],
											'estado' => $autenticacao['estado'],
											'cidade' => $autenticacao['cidade'],
											'bairro' => $autenticacao['bairro'],
											'rua' => $autenticacao['rua'],
											'numero' => $autenticacao['numero'],
											'complemento' => $autenticacao['complemento'],
											'foto' => $autenticacao['foto'],
											'ultimo_login' => $autenticacao['ultimo_login']
										));
			$this->site->setar_ultimo_login();
			redirect('paciente/perfil', 'refresh');
		} else {
			$this->session->set_flashdata('autenticar', 'Falha ao autenticar, credenciais inválidas!');
			redirect('', 'refresh');
		}
	}

	public function cadastrar()
	{
		$data = $this->input->post();
		$data['recovery'] = $data['senha'];
		$data['senha'] = hash('whirlpool', $data['senha']);
		$data['data_de_nascimento'] = data_db($data['data_de_nascimento']);

		if($this->site->cadastrar($data)){
			$this->session->set_flashdata('criar_conta', 'Perfeito! Sua conta foi criada com sucesso, você já pode fazer login.');
			redirect('', 'refresh');
		} else {
			$this->session->set_flashdata('criar_conta', 'Algo de errado ocorreu! Tente novamente ou entre em contato.');
			redirect('', 'refresh');

		}
	}


}

<?php
/*
CONTROLLERS DO SISTEMA QUE PRECISAM ESTAR AUTENTICADOS DEVEM DEIXAR DE
EXTENDER CI_Controller, EXTENDENDO ESTE CONTROLLER.
*/
class Sistema_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        switch ($this->uri->segment(1)) {
            case 'paciente':
                if($this->session->User_type !== 'paciente'){
                    $this->session->set_flashdata('autenticar', 'Para acessar esta página é necessário autenticar-se!');
                    redirect('', 'refresh');
                    break;
                }
                break;

            case 'medico':
                if($this->session->User_type !== 'medico'){
                    $this->session->sess_destroy();
                    redirect('auth.user_Type', 'refresh');
                }
                break;

            case 'boss':
                if($this->session->User_type !== 'boss'){
                    $this->session->sess_destroy();
                    redirect('auth.user_Type', 'refresh');
                }
                break;
        }

    }

}

?>

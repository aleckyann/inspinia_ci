<?php

class Site_model extends CI_Model
{

        public function dados()
        {
            $this->db->where('id', $this->session->id);
            $query = $this->db->get('clientes');
            return $query->result_array()[0];
        }


        public function autenticar()
        {
            $email = $this->input->post('autenticar_email');
            $senha = hash('whirlpool', $this->input->post('autenticar_senha'));

            $query = $this->db->get_where('clientes', array(
                'email'   => $email,
                'senha' => $senha,
            ));
            return $query->result_array()[0];
        }


        public function setar_ultimo_login()
        {
            $data = array('ultimo_login' => date('d/m/Y H:i:s'));
            $this->db->where('id', $this->session->id);
            $this->db->update('clientes', $data);
        }


        public function assinar_newsletter($data)
        {
            $query = $this->db->get_where('newsletter', $data);

            if(!$query->result_array()){
                $this->db->insert('newsletter', $data);
        		return true;
            } else {
                return false;
            }
        }


        public function cadastrar($data)
        {
            $query = $this->db->get_where('clientes', array('email' => $data['email']));

            if(!$query->result_array()){
                $this->db->insert('clientes', $data);
        		return true;
            } else {
                return false;
            }
        }


        public function recuperar_senha($data)
        {
            $this->db->select('recovery');
            $query = $this->db->get_where('clientes', $data);
            if($query->result_array()){
                return implode($query->result_array('recovery')[0]);
            } else {
                return 'false';
            }
        }

}

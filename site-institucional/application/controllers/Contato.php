<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contato extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('form_validation','session'));

        $this->load->helper('form');
    }

    public function FaleConosco()
    {
        $data['title']       = "LCI | Fale Conosco";
        $data['description'] = "Exercício de exemplo do CodeIgniter";

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('assunto', 'Assunto', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required|min_length[30]');

        if ($this->form_validation->run() == false) {
            $data['formErrors'] = validation_errors();
        } else {
            $this->session->set_flashdata('success_msg', 'Contato recebido com sucesso!');
            $data['formErrors'] = null;
        }

        $this->load->view('fale-conosco', $data);
    }

    public function TrabalheConosco()
    {
        $data['title']       = "LCI | Trabalhe Conosco";
        $data['description'] = "Exercício de exemplo do CodeIgniter";

        $this->load->view('trabalhe-conosco', $data);
    }
}

/* End of file Contato.php */
/* Location: ./application/controllers/Contato.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contato extends CI_Controller
{
    public function FaleConosco()
    {
        $data['title'] = "LCI | Fale Conosco";
        $data['description'] = "Exercício de exemplo do CodeIgniter";

        $this->load->view('fale-conosco',$data);
    }

    public function TrabalheConosco()
    {
        $data['title'] = "LCI | Trabalhe Conosco";
        $data['description'] = "Exercício de exemplo do CodeIgniter";

        $this->load->view('trabalhe-conosco',$data);
    }
}

/* End of file Contato.php */
/* Location: ./application/controllers/Contato.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Institucional extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        $data['title'] = "LCI | Home";
        $data['description'] = "Exercício de exemplo do CodeIgniter";

        $this->load->view('home', $data);
    }

    public function Empresa() {
        $data['title'] = "LCI | A Empresa";
        $data['description'] = "Informações sobre a empresa";

        $this->load->view('empresa', $data);
    }

    public function Servicos() {
        $data['title'] = "LCI | Serviços";
        $data['description'] = "Informações sobre os serviços prestados";

        $this->load->view('servicos', $data);
    }
}

/* End of file Institucional.php */
/* Location: ./application/controllers/Institucional.php */

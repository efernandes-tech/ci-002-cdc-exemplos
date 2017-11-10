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
        $this->load->view('home');
    }

    public function Empresa() {
        $this->load->view('empresa');
    }

    public function Servicos() {
        $this->load->view('servicos');
    }
}

/* End of file Institucional.php */
/* Location: ./application/controllers/Institucional.php */

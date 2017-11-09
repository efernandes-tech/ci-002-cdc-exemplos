<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Institucional extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        $this->load->view('home');
    }

}

/* End of file Institucional.php */
/* Location: ./application/controllers/Institucional.php */
<?php

class Hash extends CI_Controller
{
    public function index()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('hash', 'Hash', 'callback_hash_check');

        // Validação usando uma model e seu método. (Ex.: Validar se usuário já existe)
        // $this->form_validation->set_rules(
        //     'username', 'Username',
        //     array(
        //         'required',
        //         array($this->users_model, 'exist')
        //     )
        // );

        if ($this->form_validation->run() == false) {
            $this->load->view('hash-form');
        } else {
            $this->load->view('hash-success');
        }
    }

    /**
     * @param $str
     */
    public function hash_check($str)
    {
        if ($str == 'A3@hbGF32mbN') {
            $this->form_validation->set_message('hash_check', 'O campo hash não corresponde a "A3@hbGF32mbN"');

            return false;
        } else {
            return true;
        }
    }
}

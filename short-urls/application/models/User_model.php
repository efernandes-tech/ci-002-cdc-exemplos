<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function Save($data)
    {
        $data['passw'] = password_hash($data['passw'], PASSWORD_DEFAULT);

        $this->db->insert('users', $data);

        $userID = $this->db->insert_id();

        if ($userID) {
            return $this->GetUser($userID);
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function GetUser($id)
    {
        $this->db->select('*')->from('users')->where('id', $id);

        $result = $this->db->get()->result();

        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    /**
     * @param $data
     */
    public function Update($data)
    {
        $data['passw'] = password_hash($data['passw'], PASSWORD_DEFAULT);

        $this->db->where('id', $this->session->userdata('id'));

        $this->db->update('users', $data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function Login($data)
    {
        $this->db->select('*')->from('users')->where('email', $data['email']);

        $results = $this->db->get()->result();

        return $results;
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */

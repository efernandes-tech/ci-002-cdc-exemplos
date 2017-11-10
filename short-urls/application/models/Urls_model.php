<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Urls_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function GenerateUniqueCode()
    {
        do {
            $code = random_string('alnum', 8);

            $this->db->from('urls')->where('code', $code);

            $num = $this->db->count_all_results();
        } while ($num >= 1);

        return $code;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function Save($data)
    {
        $data['code'] = $this->GenerateUniqueCode();

        $this->db->insert('urls', $data);

        if ($this->db->insert_id()) {
            return $data['code'];
        } else {
            return false;
        }
    }

    /**
     * @param $url_code
     * @return mixed
     */
    public function Fetch($url_code)
    {
        $this->db->select('*')
            ->from('urls')
            ->where('code', $url_code)
            ->limit(1);

        $result = $this->db->get()->result();

        // echo $this->db->last_query();

        if ($result) {
            return $result[0]->address;
        } else {
            return false;
        }
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function GetAllByUser($user_id)
    {
        $this->db->select('*')
            ->from('urls')
            ->where('user_id', $user_id);

        $result = $this->db->get()->result();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}

/* End of file Urls_model.php */
/* Location: ./application/models/Urls_model.php */

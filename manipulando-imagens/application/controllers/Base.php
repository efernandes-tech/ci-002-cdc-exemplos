<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Base extends CI_Controller
{

    public function index()
    {
        $this->load->view('home');
    }

    public function Upload()
    {
        if (!$this->upload->do_upload('image')) {
            $data['info'] = $this->upload->display_errors();
        } else {
            $data['info']        = "Imagem enviada com sucesso!";
            $data['info_upload'] = $this->upload->data();

            if($this->input->post('thumbnail')){
                $configThumbnail['source_image'] = $data['info_upload']['full_path'];
                $configThumbnail['maintain_ratio'] = TRUE;
                $configThumbnail['width'] = 75;
                $configThumbnail['height'] = 50;

                $thumbnail = $this->GenThumbnail($configThumbnail);

                if(!$thumbnail['status']){
                    $data['info'] .= "<br/>Não foi possível gerar o thumbnail devido ao(s) erro(s) abaixo:<br />";
                    $data['info'] .= $thumbnail['message'];
                }else{
                    $data['info_upload']['thumb_path'] = $data['info_upload']['file_path']
                        ."/thumbs/".$data['info_upload']['raw_name']
                        ."_thumb".$data['info_upload']['file_ext'];
                }
            }
        }

        $this->load->view('home', $data);
    }

    private function GenThumbnail($config)
    {
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['new_image'] = "./uploads/thumbs/";

        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()){
            $data['message'] = $this->image_lib->display_errors();
            $data['status'] = false;
        }else{
            $data['message'] = null;
            $data['status'] = true;
        }

        $this->image_lib->clear();

        return $data;
    }

}

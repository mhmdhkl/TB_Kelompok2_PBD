<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Web Portofolio Percetakan ATIKA Print'
        );
        $this->load->view('portofolio/v_head', $data);
        $this->load->view('portofolio/v_nav', $data);
        $this->load->view('portofolio/v_portofolio', $data);
        $this->load->view('portofolio/v_footer', $data);
    }
}

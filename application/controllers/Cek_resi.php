<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_resi extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Cek Resi',
            'isi' => 'v_cek_resi',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}

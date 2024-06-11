<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->login_pelanggan($email, $password);
        if ($cek) {
            if ($cek->is_active == 1) {
                $id_pelanggan = $cek->id_pelanggan;
                $nama_pelanggan = $cek->nama_pelanggan;
                $email = $cek->email;
                $image = $cek->image;
                $no_hp = $cek->no_hp;
                //buat session
                $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
                $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
                $this->ci->session->set_userdata('email', $email);
                $this->ci->session->set_userdata('image', $image);
                $this->ci->session->set_userdata('no_hp', $no_hp);
                redirect('home');
            } else {
                $this->ci->session->set_flashdata('error', 'Email Belum Di Aktivasi!');
                redirect('pelanggan/login');
            }
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Email atau Password Salah');
            redirect('pelanggan/login');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('nama_pelanggan') == '') {
            $this->ci->session->set_flashdata('error', 'Silahkan Login Terlebih Dahulu');
            redirect('pelanggan/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('nama_pelanggan');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('image');
        $this->ci->session->unset_userdata('no_hp');
        $this->ci->session->set_flashdata('pesan', 'Anda berhasil Log Out');
        redirect('pelanggan/login');
    }
}

/* End of file LibraryName.php */

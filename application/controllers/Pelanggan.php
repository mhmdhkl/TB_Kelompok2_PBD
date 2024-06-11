<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
        $this->load->model('m_barang');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_pelanggan.email]', array(
            'required' => '%s Harus Diisi !',
            'is_unique' => '%s Email Sudah Terdaftar'
        ));
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|is_unique[tbl_pelanggan.no_hp]', array(
            'required' => '%s Harus Diisi !',
            'is_unique' => '%s Email Sudah Terdaftar'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]', array(
            'required' => '%s Harus Diisi !',
            'matches' => '%s Password Tidak Sama'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Pelanggan',
                'isi' => 'v_register',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $email = $this->input->post('email');

            $data = [
                'nama_pelanggan'   => htmlspecialchars($this->input->post('nama_pelanggan', true)),
                'email'   => htmlspecialchars($email),
                'password'   => $this->input->post('password'),
                'no_hp' => '+62' . $this->input->post('no_hp'),
                'is_active' => 0,
                'date_created' => time(),
                'image' => 'default.png'
            ];

            //siapkan token
            $token = base64_encode(random_bytes(32));
            $pelanggan_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('tbl_pelanggan', $data);
            $this->db->insert('pelanggan_token', $pelanggan_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('pesan', 'Selamat Akun Telah Terbuat, Cek Folder SPAM untuk Aktivasi Akun !');
            redirect('pelanggan/login');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'agnarizky3@gmail.com',
            'smtp_pass' => 'fifhgcviinlczxdu',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];


        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('agnarizky3@gmail.com', 'PERCETAKAN ATIKA ONLINE SHOP');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('<b>Hai, Terima Kasih Telah Mendaftar Di PAMINGGIR PRINTING</b><br>
            Untuk melakukan transaksi diharapkan memverifikasi akun melalui link dibawah ini<br>. ' .
                'Click this link to verify your account : <a
            href="' . base_url() . 'pelanggan/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" class="btn btn-primary" role="button">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a
            href="' . base_url() . 'pelanggan/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" class="btn btn-primary" role="button">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_pelanggan', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('pelanggan_token', ['token' => $token])
                ->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tbl_pelanggan');

                    $this->db->delete('pelanggan_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        ' . $email . ' Telah Di Aktivasi! Silahkan Login</div>');
                    redirect('pelanggan/login');
                } else {
                    $this->db->delete('tbl_pelanggan', ['email' => $email]);
                    $this->db->delete('pelanggan_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account activation failed! Token expired!</div>');
                    redirect('pelanggan/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account activation failed! Wrong token!</div>');
                redirect('pelanggan/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account activation failed! Wrong email</div>');
            redirect('pelanggan/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Di isi !'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Di isi !'
        ));


        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'v_login_pelanggan',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    public function logout()
    {
        $this->pelanggan_login->logout();
    }
    public function akun()
    {
        //PROTEKSI HALAMAN
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Akun saya',
            'isi' => 'v_edit_akun',
        );

        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['nama_pelanggan'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/foto/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['nama_pelanggan']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/foto/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama_pelanggan', $nama_pelanggan);
            $this->db->where('email', $email);
            $this->db->update('tbl_pelanggan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has been updated!</div>');
            redirect('home');
        }
    }
    public function wishlist($id_pelanggan)
    {
        //PROTEKSI HALAMAN
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Barang Favorit',
            'barang' => $this->m_barang->get_wishlist($id_pelanggan),
            'isi' => 'v_wishlist',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}

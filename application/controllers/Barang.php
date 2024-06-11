<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
    }
    public function index()
    {
        $data = array(
            'title' => 'Barang',
            'barang' => $this->m_barang->get_all_data(),
            'isi' => 'barang/v_barang',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harus Diisi !')
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './assets/gambar/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg';
            $this->upload->initialize($config);
            $field_name   = 'gambar';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Barang',
                    'kategori' => $this->db->get('tbl_kategori')->result_array(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'barang/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_barang->add($data);

                $this->session->set_flashdata('pesan', 'Berhasil Menambah Data !');
                redirect('barang');
            }
        }

        $data = array(
            'title' => 'Tambah Barang',
            'kategori' => $this->db->get('tbl_kategori')->result_array(),
            'isi' => 'barang/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Update one item
    public function edit($id_barang = NULL)
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harus Diisi !')
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harus Diisi !')
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = './assets/gambar/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg';
            $this->upload->initialize($config);
            $field_name   = 'gambar';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Barang',
                    'kategori' => $this->db->get('tbl_kategori')->result_array(),
                    'barang' => $this->m_barang->get_data($id_barang),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'barang/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                //HAPUS GAMBAR
                $barang = $this->m_barang->get_data($id_barang);
                if ($barang->gambar != "") {
                    unlink('./assets/gambar/' . $barang->gambar);
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_barang' => $id_barang,
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_barang->edit($data);

                $this->session->set_flashdata('pesan', 'Berhasil Mengedit Data !');
                redirect('barang');
            }
            //JIKA TANPA GANTI GAMBAR
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'berat' => $this->input->post('berat'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->m_barang->edit($data);
            $this->session->set_flashdata('pesan', 'Berhasil Mengedit Data !');
            redirect('barang');
        }

        $data = array(
            'title' => 'Edit Barang',
            'kategori' => $this->db->get('tbl_kategori')->result_array(),
            'barang' => $this->m_barang->get_data($id_barang),
            'isi' => 'barang/v_edit',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete($id_barang = NULL)
    {
        //HAPUS GAMBAR
        $barang = $this->m_barang->get_data($id_barang);
        if ($barang->gambar != "") {
            unlink('./assets/gambar/' . $barang->gambar);
        }

        $data = [
            'id_barang'   => $id_barang,
        ];
        $this->m_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Berhasil Menghapus Data !');
        redirect('barang');
    }
}

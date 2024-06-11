<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function total_barang()
    {
        return $this->db->get('tbl_barang')->num_rows();
    }
    public function total_user()
    {
        return $this->db->get('tbl_user')->num_rows();
    }
    public function total_kategori()
    {
        return $this->db->get('tbl_kategori')->num_rows();
    }
    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_setting', $data);
    }
    public function get_admin()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        return $this->db->get()->result();
    }
    function get_total_pesanan()
    {
        $this->db->select_sum('total_bayar');
        $query = $this->db->get('tbl_transaksi');
        if ($query->num_rows() > 0) {
            return $query->row()->total_bayar;
        } else {
            return 0;
        }
    }
}

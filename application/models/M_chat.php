<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_chat extends CI_Model
{
    public function get_data($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chat');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = chat.id_penerima', 'left');
        $this->db->where('id_penerima', $id_pelanggan);
        return $this->db->get()->result();
    }
    public function get_message($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chat');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = chat.id_penerima', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = chat.id_pengirim', 'left');
        $this->db->where('id_penerima', $id_pelanggan);
        // $this->db->where('id_pengirim=admin');
        return $this->db->get()->result();
    }
    public function get_pelanggan($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->join('chat', 'chat.id_penerima = tbl_pelanggan.nama_pelanggan', 'left');
        $this->db->where('nama_pelanggan', $id_pelanggan);
        return $this->db->get()->row();
    }
    public function get_message_admin($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chat');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.nama_pelanggan = chat.id_penerima', 'left');
        $this->db->join('tbl_user', 'tbl_user.nama_user = chat.id_pengirim', 'left');
        $this->db->where('id_pengirim' == $this->session->userdata('nama_user'));
        $this->db->where('id_penerima' == $id_pelanggan);
        return $this->db->get()->result();
    }
    public function get_message_pelanggan($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chat');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = chat.id_penerima', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = chat.id_pengirim', 'left');
        $this->db->where('id_pengirim' == $this->session->userdata('id_pelanggan'));
        $this->db->where('id_penerima' == $id_pelanggan);
        // $this->db->where('id_pengirim=admin');
        return $this->db->get()->result();
    }
    public function getmessage_admin($id_pelanggan)
    {
        $this->db->select('*');
        $session_id = $_SESSION['nama_user'];
        $this->db->from('chat');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.nama_pelanggan = chat.id_penerima', 'left');
        $this->db->join('tbl_user', 'tbl_user.nama_user = chat.id_pengirim', 'left');
        $where = "id_pengirim = '$session_id' AND id_penerima = '$id_pelanggan' OR 
		id_pengirim = '$id_pelanggan' AND id_penerima = '$session_id'";
        $this->db->where($where);
        return $this->db->get()->result();
        // $this->db->select('*');
        // $session_id = $_SESSION['id_user'];
        // $where = "id_pengirim = '$session_id' AND id_penerima = '$data' OR 
        // id_pengirim = '$data' AND id_penerima = '$session_id'";
        // $this->db->where($where);
        // // $this->db->order_by('time', 'ASC');
        // $result = $this->db->get('chat')->result_array();
        // return $result;
    }
    public function getmessage_pelanggan()
    {
        $this->db->select('*');
        $session_id = $_SESSION['nama_pelanggan'];
        $this->db->from('chat');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = chat.id_penerima', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = chat.id_pengirim', 'left');
        $where = "id_pengirim = 'Admin' AND id_penerima = '$session_id' OR 
		id_pengirim = '$session_id' AND id_penerima = 'Admin'";
        $this->db->where($where);
        return $this->db->get()->result();
        // $this->db->select('*');
        // $session_id = $_SESSION['id_user'];
        // $where = "id_pengirim = '$session_id' AND id_penerima = '$data' OR 
        // id_pengirim = '$data' AND id_penerima = '$session_id'";
        // $this->db->where($where);
        // // $this->db->order_by('time', 'ASC');
        // $result = $this->db->get('chat')->result_array();
        // return $result;
    }

    public function get_chat($id_pengirim, $id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chat');
        $where = "id_pengirim = '$id_pengirim' AND id_penerima = '$id_pelanggan' OR 
		id_pengirim = '$id_pengirim' AND id_penerima = '$id_pelanggan'";
        $this->db->where($where);
        return $this->db->get()->result();
    }
}

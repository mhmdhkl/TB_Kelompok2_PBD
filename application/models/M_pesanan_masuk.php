<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model
{
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function pesanan_diproses()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function pesanan_dikirim()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function update_order($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tbl_transaksi', $data);
    }
    public function count_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=0');
        return $this->db->get()->num_rows();
    }
    public function total_pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order=3');
        return $this->db->get()->num_rows();
    }
    public function pesanan_masuk()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->join('tbl_rinci_transaksi', 'tbl_rinci_transaksi.no_order = tbl_transaksi.no_order', 'left');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_rinci_transaksi.id_barang', 'left');
        return $this->db->get()->result();
    }
    public function detail_pembayaran($no_order)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->join('tbl_rinci_transaksi', 'tbl_rinci_transaksi.no_order = tbl_transaksi.no_order', 'left');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_rinci_transaksi.id_barang', 'left');
        $this->db->where('tbl_transaksi.no_order', $no_order);
        return $this->db->get()->result();
    }
}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warga_model extends CI_Model
{

    public $table = 'warga';
    public $id = 'id_warga';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_warga', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('usia', $q);
	$this->db->or_like('id_agama', $q);
	$this->db->or_like('kewarganegaraan', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('email', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_warga', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('usia', $q);
	$this->db->or_like('id_agama', $q);
	$this->db->or_like('kewarganegaraan', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('email', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Warga_model.php */
/* Location: ./application/models/Warga_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-25 08:08:28 */
/* http://harviacode.com */
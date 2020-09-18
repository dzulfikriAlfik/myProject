<?php
//Subscribe Youtube Channel Peternak Kode on https://youtube.com/c/peternakkode
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Prestasi_siswa_model extends CI_Model {

	public $table = 'prestasi_siswa';
	public $id = 'id_prestasi';
	public $order = 'DESC';

	function __construct() {
		parent::__construct();
	}

	// get all
	function get_all() {
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id) {
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL) {
		// $this->db->where('isactive', 1);
		$this->db->group_start();
		$this->db->like('id_prestasi', $q);
		$this->db->or_like('jenis_prestasi', $q);
		$this->db->or_like('nama_siswa', $q);
		$this->db->or_like('nama_prestasi', $q);
		$this->db->or_like('juara', $q);
		$this->db->or_like('tahun_perolehan', $q);
		$this->db->or_like('created_at', $q);
		$this->db->or_like('created_by', $q);
		$this->db->or_like('updated_at', $q);
		$this->db->or_like('updated_by', $q);
		$this->db->or_like('isactive', $q);
		$this->db->or_like('add_1', $q);
		$this->db->or_like('add_2', $q);
		$this->db->or_like('note', $q);
		$this->db->group_end();
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data with limit and search
	function get_limit_data($limit, $start = 0, $q = NULL) {
		$this->db->order_by($this->id, $this->order);
		// $this->db->where('isactive', 1);
		$this->db->group_start();
		$this->db->like('id_prestasi', $q);
		$this->db->or_like('jenis_prestasi', $q);
		$this->db->or_like('nama_siswa', $q);
		$this->db->or_like('nama_prestasi', $q);
		$this->db->or_like('juara', $q);
		$this->db->or_like('tahun_perolehan', $q);
		$this->db->or_like('created_at', $q);
		$this->db->or_like('created_by', $q);
		$this->db->or_like('updated_at', $q);
		$this->db->or_like('updated_by', $q);
		$this->db->or_like('isactive', $q);
		$this->db->or_like('add_1', $q);
		$this->db->or_like('add_2', $q);
		$this->db->or_like('note', $q);
		$this->db->group_end();
		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}

	// insert data
	function insert($data) {
		$this->db->insert($this->table, $data);
	}

	// update data
	function update($id, $data) {
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	// delete data
	function delete($id) {
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

	// move to bin
	function bin($id) {
		$this->db->where($this->id, $id);
		$this->db->update($this->table, array('isactive' => 0));
	}

}

/* End of file Prestasi_siswa_model.php */
/* Location: ./application/models/Prestasi_siswa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-29 08:22:23 */
/* http://harviacode.com */
/* Customized by Youtube Channel: Peternak Kode (A Channel gives many free codes)*/
/* Visit here: https://youtube.com/c/peternakkode */
<?php

class M_Hari extends CI_Model{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}
	
	function get(){
		$rs = $this->db->query("SELECT * FROM hari");
		return $rs;
	}
	
	function get_by_kode($kode){
		$rs = $this->db->query("SELECT kode ,nama ".
							   "FROM hari ".
							   "WHERE kode = $kode");
		return $rs;
	}
	
	function cek_for_update($kode_baru,$nama,$kode_lama){

		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM hari WHERE (kode=$kode_baru OR nama='$nama') AND kode <> $kode_lama");
		return $rs->row()->cnt;
	}
	
	function cek_for_insert($kode,$nama){
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM hari WHERE kode=$kode OR nama='$nama'");
		return $rs->row()->cnt;
	}
	
	function update($kode,$data){
        $this->db->where('kode',$kode);
        $this->db->update('hari',$data);
    }
	
	function insert($data){
        $this->db->insert('hari',$data);		
    }
	
	function delete($kode){
		$this->db->query("DELETE FROM hari WHERE kode = '$kode'");
	}
	
	
}
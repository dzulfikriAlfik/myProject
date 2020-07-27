<?php

class M_Waktu_Tidak_Bersedia extends CI_Model{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}
    
    function get_by_dosen($kode_dosen){
      $rs = $this->db->query("SELECT kode_hari,kode_jam ".
                             "FROM waktu_tidak_bersedia ".
                             "WHERE kode_dosen = $kode_dosen");
      return $rs;
    }
    
    function update($kode,$data){

        $this->db->where('kode',$kode);
        $this->db->update('waktu_tidak_bersedia',$data);
    }
    
    
    function delete_by_dosen($kode_dosen){
        $this->db->query("DELETE FROM waktu_tidak_bersedia ".
                         "WHERE kode_dosen = $kode_dosen");       
      
    }
    
    
}
<?php

class M_Dosen extends CI_Model{

	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct(){

		parent::__construct();

	}
    
    
    function get(){

      $rs = $this->db->query("SELECT kode, ".
							 "		 nidn,".
							 "		 nama,".
							 "		 telp, ".
							 "		 alamat ".
                             "FROM dosen ".
							 "ORDER BY $this->sort $this->order ".
							 "LIMIT $this->offset,$this->limit");
							 
      return $rs;		
    }
	
	function get_all(){
     
      $rs = $this->db->query("SELECT kode, ".
							 "		 nidn,".
							 "		 nama,".
							 "		 telp, ".
							 "		 alamat ".
                             "FROM dosen ".
							 "ORDER BY nama");
							 
      return $rs;		
    }
	
	function get_by_kode($kode){
		$rs = $this->db->query(	"SELECT kode, ".
								"		 nidn,".
								"		 nama,".
								"		 telp, ".
								"		 alamat ".
								"FROM dosen ".
								"WHERE kode = $kode");
		return $rs;		
	}
	
	function get_search($search){
		$rs = $this->db->query(	"SELECT kode, ".
								"		 nidn,".
								"		 nama,".
								"		 telp, ".
								"		 alamat ".
								"FROM dosen ".
								"WHERE nama LIKE '%$search%'");
		return $rs;		
	}
    
    function num_page(){
    	
    	$result = $this->db->from('dosen')
                           ->count_all_results();
        return $result;
    }
    
    function insert($data){
        $this->db->insert('dosen',$data);		
    }
    
    function update($kode,$data){
        $this->db->where('kode',$kode);
        $this->db->update('dosen',$data);
    }
    
    function delete($kode){
        $this->db->query("DELETE FROM dosen WHERE kode='$kode'");
    }
	
	function cek_for_insert($nama){

		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM dosen ".
							   "WHERE nama='$nama'");
		return $rs->row()->cnt;
	}
	
	function cek_for_update($kode_baru,$nidn,$kode_lama){
		$rs = $this->db->query("SELECT CAST(COUNT(*) AS CHAR(1)) as cnt ".
							   "FROM dosen ".
							   "WHERE (kode=$kode_baru OR nidn='$nidn') AND kode <> $kode_lama");
		return $rs->row()->cnt;
	}
}
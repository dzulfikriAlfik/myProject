<?php
class M_kontak extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->_table='tbl_kontak';
	
    //get instance
    $this->CI = get_instance();
  }
	public function get_kontak_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_kontak) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
	
	function insertKontak($data){
		$this->db->insert($this->_table, $data);
	}
 
	 function deleteKontak($id)
	{
		$this->db->where('id_kontak', $id);
		$this->db->delete($this->_table);
	}
	
    function getKontakById($id)
    {	
		return $this->db->get_where($this->_table,array('id_kontak' => $id))->result();
    }
}
?>
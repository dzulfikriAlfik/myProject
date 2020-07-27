<?php
class M_pendapatan extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->_table='tbl_pendapatan';
    $this->load->library('Excel_generator');

    //get instance
    $this->CI = get_instance();
  }
	public function get_pendapatan_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->db->join('ref_desa','ref_desa.id_desa=tbl_pendapatan.id_desa');
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_pendapatan) as record_count")->from($this->_table);
        $this->db->join('ref_desa','ref_desa.id_desa=tbl_pendapatan.id_desa');
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        $this->CI->flexigrid->build_query(TRUE);
        //Return all
        return $return;
    }

    function get_dataForExportExcel()
	{
		$this->db->select('*')->from($this->_table);
    $this->db->join('ref_desa','ref_desa.id_desa=tbl_pendapatan.id_desa');

		$query = $this->db->get();
        $this->excel_generator->set_query($query);
	}
  function insertpendapatan($data)
  {
    $this->db->insert($this->_table, $data);
  }

  function deletependapatan($id)
  {
    $this->db->where('id_pendapatan', $id);
    $this->db->delete($this->_table);
  }

  function getpendapatanByIdpendapatan($id) //edit
  {

    $this->db->join('ref_desa','ref_desa.id_desa=tbl_pendapatan.id_desa');
    return $this->db->get_where($this->_table,array('id_pendapatan' => $id))->row();
  }

  function updatependapatan($where, $data) //update
  {
    $this->db->where($where);
    $this->db->update($this->_table, $data);
    return $this->db->affected_rows();
  }

}
?>

<?php
class M_belanja extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->_table='tbl_belanja';
    $this->load->library('Excel_generator');

    //get instance
    $this->CI = get_instance();
  }
	public function get_belanja_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->db->join('ref_desa','ref_desa.id_desa=tbl_belanja.id_desa');
        $this->db->join('tbl_bidang_kegiatan','tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_belanja.id_bidang_kegiatan');
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_belanja) as record_count")->from($this->_table);
        $this->db->join('ref_desa','ref_desa.id_desa=tbl_belanja.id_desa');
        $this->db->join('tbl_bidang_kegiatan','tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_belanja.id_bidang_kegiatan');
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
    $this->db->join('ref_desa','ref_desa.id_desa=tbl_belanja.id_desa');
    $this->db->join('tbl_bidang_kegiatan','tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_belanja.id_bidang_kegiatan');

		$query = $this->db->get();
        $this->excel_generator->set_query($query);
	}
  function insertbelanja($data)
  {
    $this->db->insert($this->_table, $data);
  }

  function deletebelanja($id)
  {
    $this->db->where('id_belanja', $id);
    $this->db->delete($this->_table);
  }

  function getbelanjaByIdbelanja($id) //edit
  {

    $this->db->join('ref_desa','ref_desa.id_desa=tbl_belanja.id_desa');
    $this->db->join('tbl_bidang_kegiatan','tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_belanja.id_bidang_kegiatan');
    return $this->db->get_where($this->_table,array('id_belanja' => $id))->row();
  }

  function updatebelanja($where, $data) //update
  {
    $this->db->where($where);
    $this->db->update($this->_table, $data);
    return $this->db->affected_rows();
  }

}
?>

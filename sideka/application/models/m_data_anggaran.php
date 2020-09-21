<?php
class M_data_anggaran extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->_table='tbl_data_anggaran';
    $this->load->library('Excel_generator');

    //get instance
    $this->CI = get_instance();
  }
	public function get_data_anggaran_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->db->join('tbl_bidang_kegiatan','tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_data_anggaran.id_bidang_kegiatan');
        $this->db->join('ref_desa','ref_desa.id_desa=tbl_bidang_kegiatan.id_desa');
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_data_anggaran) as record_count")->from($this->_table);
        $this->db->join('tbl_bidang_kegiatan','tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_data_anggaran.id_bidang_kegiatan');
        $this->db->join('ref_desa','ref_desa.id_desa=tbl_bidang_kegiatan.id_desa');
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
		$this->db->select('tbl_data_anggaran.*')->from($this->_table);
    $this->db->join('tbl_bidang_kegiatan','tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_data_anggaran.id_bidang_kegiatan');
    $this->db->join('ref_desa','ref_desa.id_desa=tbl_bidang_kegiatan.id_desa');

		$query = $this->db->get();
        $this->excel_generator->set_query($query);
	}
  function insertdata_anggaran($data)
  {
    $this->db->insert($this->_table, $data);
  }

  function deletedata_anggaran($id)
  {
    $this->db->where('id_data_anggaran', $id);
    $this->db->delete($this->_table);
  }

  function getdata_anggaranByIddata_anggaran($id) //edit
  {
    $this->db->join('tbl_bidang_kegiatan','tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_data_anggaran.id_bidang_kegiatan');
    $this->db->join('ref_desa','ref_desa.id_desa=tbl_bidang_kegiatan.id_desa');
    return $this->db->get_where($this->_table,array('id_data_anggaran' => $id))->row();
  }

  function updatedata_anggaran($where, $data) //update
  {
    $this->db->where($where);
    $this->db->update($this->_table, $data);
    return $this->db->affected_rows();
  }

}
?>

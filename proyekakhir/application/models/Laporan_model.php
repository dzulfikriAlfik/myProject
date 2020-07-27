<?php

class laporan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get laporan by id
     */
    function get_laporan($id)
    {
        return $this->db->get_where('laporan',array('id_laporan'=>$id))->row_array();
    }

    /*
     * Get all laporan
     */
    function get_all_laporan()
    {
        $this->db->order_by('id_laporan', 'desc');
        return $this->db->get('laporan')->result_array();
    }

    /*
     * function to add new laporan
     */
    function add_laporan($params)
    {
        $this->db->insert('laporan',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update laporan
     */
    function update_laporan($id,$params)
    {
        $this->db->where('id_laporan',$id);
        return $this->db->update('laporan',$params);
    }

    /*
     * function to delete laporan
     */
    function delete_laporan($id)
    {
        return $this->db->delete('laporan',array('id_laporan'=>$id));
    }
}
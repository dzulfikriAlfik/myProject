<?php

class datawarga_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get datawarga by id
     */
    function get_datawarga($id)
    {
        return $this->db->get_where('datawarga',array('nik'=>$id))->row_array();
    }

    /*
     * Get all datawarga
     */
    function get_all_datawarga()
    {
        $this->db->order_by('nik', 'desc');
        return $this->db->get('datawarga')->result_array();
    }

    /*
     * function to add new datawarga
     */
    function add_datawarga($params)
    {
        $this->db->insert('datawarga',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update datawarga
     */
    function update_datawarga($id,$params)
    {
        $this->db->where('nik',$id);
        return $this->db->update('datawarga',$params);
    }

    /*
     * function to delete datawarga
     */
    function delete_datawarga($id)
    {
        return $this->db->delete('datawarga',array('nik'=>$id));
    }

    /*
    function get_datawarga_menikah()
    {
        $data = $this->db->query("select * datawarga where status='menikah'");
        return $data->result_array();
    }
    */
}
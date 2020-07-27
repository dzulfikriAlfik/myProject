<?php

class domisili_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get domisili by id
     */
    function get_domisili($id)
    {
        return $this->db->get_where('domisili',array('nik'=>$id))->row_array();
    }

    /*
     * Get all domisili
     */
    function get_all_domisili()
    {
        $this->db->order_by('nik', 'desc');
        return $this->db->get('domisili')->result_array();
    }

    /*
     * function to add new domisili
     */
    function add_domisili($params)
    {
        $this->db->insert('domisili',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update domisili
     */
    function update_domisili($id,$params)
    {
        $this->db->where('nik',$id);
        return $this->db->update('domisili',$params);
    }

    /*
     * function to delete domisili
     */
    function delete_domisili($id)
    {
        return $this->db->delete('domisili',array('nik'=>$id));
    }

    /*
    function get_domisili_menikah()
    {
        $data = $this->db->query("select * domisili where status='menikah'");
        return $data->result_array();
    }
    */
}
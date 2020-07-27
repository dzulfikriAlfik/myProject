<?php

class kepaladesa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get kepaladesa by id
     */
    function get_kepaladesa($id)
    {
        return $this->db->get_where('kepaladesa',array('id_kepaladesa'=>$id))->row_array();
    }

    /*
     * Get all kepaladesa
     */
    function get_all_kepaladesa()
    {
        $this->db->order_by('id_kepaladesa', 'desc');
        return $this->db->get('kepaladesa')->result_array();
    }

    /*
     * function to add new kepaladesa
     */
    function add_kepaladesa($params)
    {
        $this->db->insert('kepaladesa',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update kepaladesa
     */
    function update_kepaladesa($id,$params)
    {
        $this->db->where('id_kepaladesa',$id);
        return $this->db->update('kepaladesa',$params);
    }

    /*
     * function to delete kepaladesa
     */
    function delete_kepaladesa($id)
    {
        return $this->db->delete('kepaladesa',array('id_kepaladesa'=>$id));
    }
}
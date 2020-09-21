<?php

class admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get admin by id
     */
    function get_admin($id)
    {
        return $this->db->get_where('admin',array('id_admin'=>$id))->row_array();
    }

    /*
     * Get all admin
     */
    function get_all_admin()
    {
        $this->db->order_by('id_admin', 'desc');
        return $this->db->get('admin')->result_array();
    }

    /*
     * function to add new admin
     */
    function add_admin($params)
    {
        $this->db->insert('admin',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update admin
     */
    function update_admin($id,$params)
    {
        $this->db->where('id_admin',$id);
        return $this->db->update('admin',$params);
    }

    /*
     * function to delete admin
     */
    function delete_admin($id)
    {
        return $this->db->delete('admin',array('id_admin'=>$id));
    }
}
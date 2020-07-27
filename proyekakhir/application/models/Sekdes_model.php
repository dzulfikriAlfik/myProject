<?php

class sekdes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get sekdes by id
     */
    function get_sekdes($id)
    {
        return $this->db->get_where('sekdes',array('id_sekdes'=>$id))->row_array();
    }

    /*
     * Get all sekdes
     */
    function get_all_sekdes()
    {
        $this->db->order_by('id_sekdes', 'desc');
        return $this->db->get('sekdes')->result_array();
    }

    /*
     * function to add new sekdes
     */
    function add_sekdes($params)
    {
        $this->db->insert('sekdes',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update sekdes
     */
    function update_sekdes($id,$params)
    {
        $this->db->where('id_sekdes',$id);
        return $this->db->update('sekdes',$params);
    }

    /*
     * function to delete sekdes
     */
    function delete_sekdes($id)
    {
        return $this->db->delete('sekdes',array('id_sekdes'=>$id));
    }
}
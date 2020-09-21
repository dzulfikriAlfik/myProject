<?php

class pelayanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get pelayanan by id
     */
    function get_pelayanan($id)
    {
        return $this->db->get_where('pelayanan',array('id_pelayanan'=>$id))->row_array();
    }

    /*
     * Get all pelayanan
     */
    function get_all_pelayanan()
    {
        $this->db->order_by('id_pelayanan', 'desc');
        return $this->db->get('pelayanan')->result_array();
    }

    /*
     * function to add new pelayanan
     */
    function add_pelayanan($params)
    {
        $this->db->insert('pelayanan',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update pelayanan
     */
    function update_pelayanan($id,$params)
    {
        $this->db->where('id_pelayanan',$id);
        return $this->db->update('pelayanan',$params);
    }

    /*
     * function to delete pelayanan
     */
    function delete_pelayanan($id)
    {
        return $this->db->delete('pelayanan',array('id_pelayanan'=>$id));
    }
}
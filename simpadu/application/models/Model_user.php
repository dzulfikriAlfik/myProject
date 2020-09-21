<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model
{

	var $table = 'tb_user';


	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function get_all_user(){
        $this->db->select('*');
        $this->db->from('tb_user');
        $query=$this->db->get();
        return $query->result();
    }

    public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
    }
    public function delete_by_id($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete($this->table);
    }
    public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('user_id',$id);
		$query = $this->db->get();

		return $query->row();
    }
    public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
    
    function validate($username,$password){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('user_username',$username);
        $this->db->where('user_password',$password);
        $this->db->limit('1');
        $result = $this->db->get();
        return $result;
      }
    
}

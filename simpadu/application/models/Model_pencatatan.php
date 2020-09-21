<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pencatatan extends CI_Model
{

	var $table = 'tb_penduduk';


	public function __construct()
	{
		parent::__construct();
        $this->load->database();
    }

    public function get_all_kelahiran(){
        $this->db->select('*');
        $this->db->from('tb_kelahiran');
        $this->db->order_by('kelahiran_date', 'desc'); 
        $query=$this->db->get();
        return $query->result();
    }

    public function get_all_kematian(){
        $this->db->select('*');
        $this->db->from('tb_kematian');
        $this->db->order_by('kematian_date', 'desc'); 
        $query=$this->db->get();
        return $query->result();
    }

    public function get_all_mutasi(){
        $this->db->select('*');
        $this->db->from('tb_mutasi');
        $this->db->order_by('mutasi_date', 'desc'); 
        $query=$this->db->get();
        return $query->result();
    }

    public function save_kelahiran($data)
	{
		$this->db->insert('tb_kelahiran', $data);
		return $this->db->insert_id();
    }
    
    public function save_kematian($data)
	{
		$this->db->insert('tb_kematian', $data);
		return $this->db->insert_id();
    }

    public function save_mutasi($data)
	{
		$this->db->insert('tb_mutasi', $data);
		return $this->db->insert_id();
    }

    public function delete_kelahiran_by_id($id)
	{
		$this->db->where('kelahiran_id', $id);
		$this->db->delete('tb_kelahiran');
    }

    public function delete_kematian_by_id($id)
	{
		$this->db->where('kematian_id', $id);
		$this->db->delete('tb_kematian');
    }

    public function delete_mutasi_by_id($id)
	{
		$this->db->where('mutasi_id', $id);
		$this->db->delete('tb_mutasi');
    }

    public function kelahiran_by_id($id)
	{
		$this->db->from('tb_kelahiran');
		$this->db->where('kelahiran_id',$id);
		$query = $this->db->get();

		return $query->row();
    }

    public function kematian_by_id($id)
	{
		$this->db->from('tb_kematian');
		$this->db->where('kematian_id',$id);
		$query = $this->db->get();

		return $query->row();
    }

    public function mutasi_by_id($id)
	{
		$this->db->from('tb_mutasi');
		$this->db->where('mutasi_id',$id);
		$query = $this->db->get();

		return $query->row();
    }

    public function update_kelahiran($where, $data)
	{
		$this->db->update('tb_kelahiran', $data, $where);
		return $this->db->affected_rows();
    }

    public function update_kematian($where, $data)
	{
		$this->db->update('tb_kematian', $data, $where);
		return $this->db->affected_rows();
    }

    public function update_mutasi($where, $data)
	{
		$this->db->update('tb_mutasi', $data, $where);
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

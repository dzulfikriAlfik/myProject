<?php

class Auth_model extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $data=$this->db->get();
        if ($data->num_rows()==1){
            return $data->result_array();
        }
        else{
            return false;
        }
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

   public function login($post)
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('username', $post['username']);
      $this->db->where('password', sha1($post['password']));
      $query = $this->db->get();
      return $query;
   }

   public function get($id = null)
   {
      $this->db->from('user');
      if ($id != null) {
         $this->db->where('user_id', $id);
      }
      return $this->db->get();
   }

   public function add($post)
   {
      $params = [
         'name'      => $post['fullname'],
         'username'  => $post['username'],
         'password'  => sha1($post['password']),
         'address'   => $post['address'] != null ? $post['address'] : null,
         'level'     => $post['level']
      ];
      $this->db->insert('user', $params);
   }

   public function edit($post)
   {
      $params = [
         'name'      => $post['fullname'],
         'username'  => $post['username'],
         'address'   => $post['address'] != null ? $post['address'] : null,
         'level'     => $post['level']
      ];
      if (!empty($post['password'])) {
         $params['password'] = sha1($post['password']);
      }
      $this->db->where('user_id', $post['user_id']);
      $this->db->update('user', $params);
   }

   public function delete($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }
}

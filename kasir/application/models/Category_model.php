<?php
defined('BASEPATH') or exit('No direct script access allowed');

class category_model extends CI_Model
{

   public function get($id = null)
   {
      $this->db->from('p_category');
      if ($id != null) {
         $this->db->where('category_id', $id);
      }
      return $this->db->get();
   }

   public function add($post)
   {
      $params = [
         'name'         => $post['category_name']
      ];
      $this->db->insert('p_category', $params);
   }

   public function edit($post)
   {
      $params = [
         'name'         => $post['category_name'],
         'updated'      => date('Y-m-d H:i:s')
      ];
      $this->db->where('category_id', $post['category_id']);
      $this->db->update('p_category', $params);
   }

   public function delete($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }
}

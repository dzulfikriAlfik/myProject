<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{

   public function get($id = null)
   {
      $this->db->from('p_unit');
      if ($id != null) {
         $this->db->where('unit_id', $id);
      }
      return $this->db->get();
   }

   public function add($post)
   {
      $params = [
         'name'         => $post['unit_name']
      ];
      $this->db->insert('p_unit', $params);
   }

   public function edit($post)
   {
      $params = [
         'name'         => $post['unit_name'],
         'updated'      => date('Y-m-d H:i:s')
      ];
      $this->db->where('unit_id', $post['unit_id']);
      $this->db->update('p_unit', $params);
   }

   public function delete($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }
}

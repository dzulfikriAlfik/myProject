<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{

   public function get($id = null)
   {
      $this->db->from('supplier');
      if ($id != null) {
         $this->db->where('supplier_id', $id);
      }
      return $this->db->get();
   }

   public function add($post)
   {
      $params = [
         'name'         => $post['supplier_name'],
         'phone'        => $post['phone'],
         'address'      => $post['address'],
         'description'  => $post['description']
      ];
      $this->db->insert('supplier', $params);
   }

   public function edit($post)
   {
      $params = [
         'name'         => $post['supplier_name'],
         'phone'        => $post['phone'],
         'address'      => $post['address'],
         'description'  => $post['description'],
         'updated'      => date('Y-m-d H:i:s')
      ];
      $this->db->where('supplier_id', $post['supplier_id']);
      $this->db->update('supplier', $params);
   }

   public function delete($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }
}

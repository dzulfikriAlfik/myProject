<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{

   public function get($id = null)
   {
      $this->db->from('customer');
      if ($id != null) {
         $this->db->where('customer_id', $id);
      }
      return $this->db->get();
   }

   public function add($post)
   {
      $params = [
         'name'         => $post['customer_name'],
         'gender'       => $post['gender'],
         'phone'        => $post['phone'],
         'address'      => $post['address'],

      ];
      $this->db->insert('customer', $params);
   }

   public function edit($post)
   {
      $params = [
         'name'         => $post['customer_name'],
         'gender'       => $post['gender'],
         'phone'        => $post['phone'],
         'address'      => $post['address'],
         'updated'      => date('Y-m-d H:i:s')
      ];
      $this->db->where('customer_id', $post['customer_id']);
      $this->db->update('customer', $params);
   }

   public function delete($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }
}

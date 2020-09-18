<?php

class Hubungi_model extends CI_Model
{

   public function tampil_data($table)
   {
      return $this->db->get($table);
   }

   public function insert_data($data, $table)
   {
      $this->db->insert($table, $data);
   }

   public function kirim_data($where, $table)
   {
      return $this->db->get_where($table, $where);
   }
}

<?php

class Krs_model extends CI_Model
{

   public function tampil_data($table)
   {
      return $this->db->get($table);
   }

   public $table  = 'krs';
   public $id     = 'id_krs';

   public function insert($data)
   {
      $this->db->insert($this->table, $data);
   }

   public function update($id, $data)
   {
      $this->db->where($this->id, $id);
      $this->db->update($this->table, $data);
   }

   public function delete($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }

   public function get_by_id($id)
   {
      return $this->db->get_where('krs', ['id_krs' => $id])->row();
   }

   public function getById($id)
   {
      return $this->db->get_where('krs', ['id_krs' => $id])->row();
   }
}

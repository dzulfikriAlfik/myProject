<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
   protected $table         = 'movie';
   protected $allowedFields = ['title', 'id_genre'];

   public function getMovie($id = false)
   {
      if ($id == false) {
         return $this->findAll();
      }
      return $this->where(['id' => $id])->first();
   }
}

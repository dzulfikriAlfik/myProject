<?php

namespace App\Models;

use CodeIgniter\Model;

class GenreModel extends Model
{
   protected $table         = 'genre_list';
   protected $allowedFields = ['genre'];

   public function getGenre($id = false)
   {
      if ($id == false) {
         return $this->findAll();
      }
      return $this->where(['id_genre' => $id])->first();
   }
}

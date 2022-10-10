<?php

function getnama($id)
{
   $db    = \Config\Database::connect();
   $query = $db->query("SELECT * FROM genre_list WHERE id_genre='$id'")->getRowArray();
   return $query['genre'];
}

function isLoggedIn() {
   if(!session()->get('isLoggedIn')) {
      return redirect()->to('/');
   }
}
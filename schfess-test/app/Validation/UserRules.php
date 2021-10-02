<?php 

namespace App\Validation;
use App\Models\LoginModel;

class UserRules 
{

   public function validateuser(string $str, string $fields, array $data) 
   { 
      $model = new LoginModel();

      $user = $model->where('email', $data['email'])->first();

      if(!$user) {
         return false;
      } else {
         return password_verify($data['password'], $user['password']);
      }
   }

}

?>
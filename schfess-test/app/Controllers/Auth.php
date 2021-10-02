<?php 

namespace App\Controllers;
use App\Models\LoginModel;

class Auth extends BaseController 
{

   public function __construct() 
   {
      helper(['form']);
   }

   public function login() 
   {
      if(session()->get('isLoggedIn')) {
         return redirect()->to('/dashboard');
      }
      $data = [];

      if($this->request->getMethod() == 'post') {
         $rules = [
            'email'        => 'required|valid_email',
            'password'     => 'required|validateuser[email,password]'
         ];

         $errors = [
            'password' => [
               'validateuser' => 'Email atau Password tidak cocok'
            ]
         ];

         if(!$this->validate($rules, $errors)) {
            $data['validation'] = $this->validator;
         } else {
            // masukan user ke database
            $model = new LoginModel();

            $user = $model->where('email', $this->request->getVar('email'))->first();
            
            $this->setUserMethod($user);

            // $session = session();
            // $session->setFlashdata('success', 'Berhasil Terdaftar');
            
            return redirect()->to('dashboard');
         }

      }

      return view('auth/login', $data);
   }

   private function setUserMethod($user) {
      $data = [
         'id'         => $user['id'],
         'name'       => $user['name'],
         'email'      => $user['email'],
         'isLoggedIn' => true,
      ];

      session()->set($data);
      return true;
   }

   public function register() 
   {
      if(session()->get('isLoggedIn')) {
         return redirect()->to('/dashboard');
      }
      $data = [];

      if($this->request->getMethod() == 'post') {
         $rules = [
            'name'         => 'required|min_length[3]|max_length[30]',
            'email'        => 'required|valid_email|is_unique[users.email]',
            'password'     => 'required|min_length[8]|max_length[255]',
            'confpassword' => 'required|matches[password]',
         ];

         if(!$this->validate($rules)) {
            $data['validation'] = $this->validator;
         } else {
            // masukan user ke database
            $model = new LoginModel();

            $newData = [
               'name'     => $this->request->getVar('name'),
               'email'    => $this->request->getVar('email'),
               'password' => $this->request->getVar('password'),
            ];
            $model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Berhasil Terdaftar');
            
            return redirect()->to('/');
         }

      }

      return view('auth/register', $data);
   }

   public function logout() 
   {
      session()->destroy();
      return redirect()->to('/');
   }

}


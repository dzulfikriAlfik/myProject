<?php 

namespace App\Controllers;
use App\Models\MovieModel;
use App\Models\GenreModel;

class Dashboard extends BaseController 
{

   protected $MovieModel;
   protected $GenreModel;
   // private $db;
   public function __construct()
   {
      // model
      $this->MovieModel = new MovieModel();
      $this->GenreModel = new GenreModel();

   }

   // private function isLoggedIn() 
   // {
   //    if(!session()->get('isLoggedIn')) {
   //       return redirect()->to('/');
   //    }
   // }

   public function index() 
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }

      $data = [
         'judul' => 'Dashboard',
         'title' => $this->MovieModel->getMovie()
      ];
      helper(['fungsi']);
      return view('dashboard/index', $data);
   }

   public function createTitle() 
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }

      $data = [
         'judul'      => 'Form Tambah Data Movie',
         'validation' => \Config\Services::validation(),
         'genre'      => $this->GenreModel->getGenre()
      ];
      return view('dashboard/createTitle', $data);
   }

   public function save() 
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      if (!$this->validate([
         'title' => [
            'rules'  => 'required',
            'errors' => [
               'required'  => '{field} harus diisi',
            ]
         ],
         'id_genre' => [
            'rules'  => 'required',
            'errors' => [
               'required'  => '{field} harus diisi'
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         return redirect()->to('dashboard/createTitle')->withInput();
      }

      $this->MovieModel->save([
         'title'    => $this->request->getVar('title'),
         'id_genre' => $this->request->getVar('id_genre')
      ]);

      session()->setFlashdata('success', 'Data Berhasil ditambahkan');
      return redirect()->to('dashboard');
   }

   public function delete($id)
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      // delete dari database
      $this->MovieModel->delete($id);

      session()->setFlashdata('success', 'Data Berhasil dihapus');
      return redirect()->to('dashboard');
   }

   public function edit($id)
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      $data = [
         'judul'      => 'Form Ubah Data',
         'validation' => \Config\Services::validation(),
         'movie'      => $this->MovieModel->getMovie($id),
         'genre'      => $this->GenreModel->getGenre()
      ];
      return view('dashboard/editTitle', $data);
   }

   public function update($id)
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      // Validasi Input
      if (!$this->validate([
         'title' => [
            'rules'  => 'required',
            'errors' => [
               'required'  => '{field} harus diisi',
            ]
         ],
         'id_genre' => [
            'rules'  => 'required',
            'errors' => [
               'required'  => '{field} harus diisi'
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         // return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
         return redirect()->to('dashboard/edit/' . $this->request->getVar('id'))->withInput();
      }

      $this->MovieModel->save([
         'id'       => $id,
         'title'    => $this->request->getVar('title'),
         'id_genre' => $this->request->getVar('id_genre')
      ]);

      session()->setFlashdata('success', 'Data Berhasil diubah');
      return redirect()->to('dashboard');
   }

   public function genreList() 
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      $data = [
         'judul'     => 'Genre List',
         'genreList' => $this->GenreModel->getGenre()
      ];
      return view('dashboard/genreList', $data);
   }

   public function createGenre() 
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      $data = [
         'judul'      => 'Form Tambah List Genre',
         'validation' => \Config\Services::validation()
      ];
      return view('dashboard/createGenre', $data);
   }

   public function saveGenre() 
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      if (!$this->validate([
         'genre' => [
            'rules'  => 'required',
            'errors' => [
               'required'  => '{field} harus diisi',
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         return redirect()->to('dashboard/createGenre')->withInput();
      }

      $this->GenreModel->save([
         'genre'    => $this->request->getVar('genre')
      ]);

      session()->setFlashdata('success', 'Data Berhasil ditambahkan');
      return redirect()->to('dashboard/genreList');
   }

   public function deleteGenre($id)
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      // delete dari database
      // $this->GenreModel->delete($id);
      $db      = \Config\Database::connect();
      $builder = $db->table('genre_list');
      $builder->where('id_genre', $id);
      $builder->delete();

      session()->setFlashdata('success', 'Data Berhasil dihapus');
      return redirect()->to('dashboard/genreList');
   }

   public function editGenre($id)
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      $data = [
         'judul'      => 'Form Ubah Data',
         'validation' => \Config\Services::validation(),
         'genre'      => $this->GenreModel->getGenre($id)
      ];
      return view('dashboard/editGenre', $data);
   }

   public function updateGenre($id)
   {
      if(!session()->get('isLoggedIn')) {
         return redirect()->to('/');
      }
      // Validasi Input
      if (!$this->validate([
         'genre' => [
            'rules'  => 'required',
            'errors' => [
               'required'  => '{field} harus diisi',
            ]
         ]
      ])) {
         // $validation = \Config\Services::validation();
         // return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
         return redirect()->to('dashboard/editGenre/' . $this->request->getVar('id_genre'))->withInput();
      }

      $data = [
         'id_genre' => $this->request->getVar('id_genre'),
         'genre'    => $this->request->getVar('genre')
      ];
      $db      = \Config\Database::connect();
      $builder = $db->table('genre_list');
      $builder->replace($data);

      session()->setFlashdata('success', 'Data Berhasil diubah');
      return redirect()->to('dashboard/genreList');
   }
}


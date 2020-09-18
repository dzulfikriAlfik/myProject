<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        // ----------------|Nama Model|, |Alias|
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menus'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">New menu added</div>');
            redirect('menu');
        }
    }

    public function getEditMenu()
    {
        echo json_encode($this->menu->getMenuById($this->input->post('id')));
    }

    public function menuEdit()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            redirect('menu');
        } else {
            // $data = [
            //     "id" => $this->input->post('id', true),
            //     "menu" => $this->input->post('menu', true)
            // ];

            // $this->db->where('id', $this->input->post('id'));
            // $this->db->update('user_menu', $data);
            $this->menu->editMenu();
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Menu edited</div>');
            redirect('menu');
        }
    }

    public function menuDelete($id)
    {
        $this->menu->deleteMenu($id);
        $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Menu deleted</div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $this->menu->getSubMenu adalah memanggil alias dari Menu_model yang sudah di inisialisasi di construct
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menus'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);

            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">New submenu added</div>');
            redirect('menu/submenu');
        }
    }

    public function getEditSubMenu()
    {
        echo json_encode($this->menu->getSubMenuById($this->input->post('id')));
    }

    public function subMenuEdit()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            redirect('menu/submenu');
        } else {
            $this->menu->editSubMenu();
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Submenu edited</div>');
            redirect('menu/submenu');
        }
    }

    public function subMenuDelete($id)
    {
        $this->menu->deleteSubMenu($id);
        $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Submenu deleted</div>');
        redirect('menu/submenu');
    }
}

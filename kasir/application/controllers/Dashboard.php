<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		cek_not_login();
		$data = [
			'aktif'	=> 'dashboard',
			'menu'   => 'dashboard',
		];
		$this->template->load('template', 'dashboard', $data);
	}
}

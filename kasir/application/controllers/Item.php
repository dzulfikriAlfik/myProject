<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['item_model', 'category_model', 'unit_model']);
		cek_not_login();
	}

	public function index()
	{
		$data = [
			'row'    => $this->item_model->get()->result_array(),
			'aktif'  => 'item',
			'menu'   => 'item',
		];
		$this->template->load('template', 'Product/Item/item_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id       = set_value('item_id');
		$item->category_id   = set_value('category_id');
		$item->barcode       = set_value('barcode');
		$item->name          = set_value('name');
		$item->price         = set_value('price');
		$item->image         = set_value('image');

		$query_category   = $this->category_model->get();
		$query_unit       = $this->unit_model->get();
		$unit[null]       = '-- Pilih Unit --';
		foreach ($query_unit->result() as $unt) {
			$unit[$unt->unit_id] = $unt->name;
		}

		$data = [
			'aktif'           => 'item',
			'menu'            => 'item',
			'page'            => 'add',
			'row'             => $item,
			'category'        => $query_category,
			'unit'            => $unit,
			'selected_unit'   => null
		];
		$this->template->load('template', 'Product/Item/item_form', $data);
	}

	public function edit($id)
	{
		$query = $this->item_model->get($id);
		if ($query->num_rows() > 0) {
			$item             = $query->row();

			$query_category   = $this->category_model->get();
			$query_unit       = $this->unit_model->get();
			$unit[null]       = '-- Pilih Unit --';
			foreach ($query_unit->result() as $unt) {
				$unit[$unt->unit_id] = $unt->name;
			}
			$data = [
				'aktif'              => 'item',
				'menu'               => 'item',
				'page'               => 'edit',
				'row'                => $item,
				'category'           => $query_category,
				'unit'               => $unit,
				'selected_category'  => $item->category_id,
				'selected_unit'      => $item->unit_id
			];
			$this->template->load('template', 'Product/Item/item_form', $data);
		} else {
			pesan_error('Tidak Ditemukan', 'item');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		$data['menu'] = 'item';

		$config['upload_path']    = './uploads/product/';
		$config['allowed_types']  = 'gif|jpg|png|jpeg';
		$config['max_size']       = 2048;
		$config['file_name']      = "item-$post[product_name]-" . date('dmY') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);

		// ADD
		if (isset($_POST['add'])) {
			if ($this->item_model->check_barcode($post['barcode'])->num_rows() > 0) {
				pesan_error("Barcode $post[barcode] sudah dipakai barang lain", 'item/add');
			} else {
				if (@$_FILES['image']['name'] != null) {
					if ($this->upload->do_upload('image')) {
						$post['image'] = $this->upload->data('file_name');
						$this->item_model->add($post);
						pesan_alert('Ditambahkan', 'item');
					} else {
						$error = $this->upload->display_errors();
						pesan_error('Gagal Upload', 'item/add');
					}
				} else {
					$post['image'] = null;
					$this->item_model->add($post);
					pesan_alert('ditambahkan', 'item');
				}
			}
			// EDIT
		} else if (isset($_POST['edit'])) {
			if ($this->item_model->check_barcode($post['barcode'], $post['item_id'])->num_rows() > 0) {
				pesan_error("Barcode $post[barcode] sudah dipakai barang lain", "item/edit/$post[item_id]");
			} else {
				if (@$_FILES['image']['name'] != null) {
					if ($this->upload->do_upload('image')) {
						$item = $this->item_model->get($post['item_id'])->row();
						if ($item->image != null) {
							$target_file   = "./uploads/product/$item->image";
							unlink($target_file);
						}

						$post['image'] = $this->upload->data('file_name');
						$this->item_model->edit($post);
						pesan_alert('Diupdate', 'item');
					} else {
						$error = $this->upload->display_errors();
						pesan_error('Gagal Upload', 'item/add');
					}
				} else {
					$post['image'] = null;
					$this->item_model->edit($post);
					pesan_alert('Diupdate', 'item');
				}
			}
		}
	}

	public function delete($id)
	{
		$item = $this->item_model->get($id)->row();
		if ($item->image != null) {
			$target_file   = "./uploads/product/$item->image";
			unlink($target_file);
		}
		$item_barcode  = "./uploads/qr-code/$item->barcode-Item-" . getnama($item->item_id, 'p_item', 'item_id', 'name') . ".png";
		unlink($item_barcode);

		$where = ['item_id' => $id];
		$this->item_model->delete($where, 'p_item');
		pesan_alert('Dihapus', 'item');
	}

	function barcode_qrcode($id)
	{
		$data = [
			'row'    => $this->item_model->get($id)->row(),
			'aktif'  => 'item',
			'menu'   => 'item',
			'page'   => 'Barcode Generator',
		];
		$this->template->load('template', 'Product/Item/barcode_qrcode', $data);
	}

	public function barcode_print($id)
	{
		$data['row'] = $this->item_model->get($id)->row();
		$html = $this->load->view('Product/Item/barcode_print', $data, true);

		$this->fungsi->PdfGenerator($html, 'Barcode-' . $data['row']->barcode, 'A4', 'Portrait');
	}

	public function qrcode_print($id)
	{
		$data['row'] = $this->item_model->get($id)->row();
		$html = $this->load->view('Product/Item/qrcode_print', $data, true);

		$this->fungsi->PdfGenerator($html, 'QRCode-' . $data['row']->barcode, 'A4', 'Landscape');
	}

	function get_ajax()
	{
		$list = $this->item_model->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = array();
			$row[] = $no . ".";
			$row[] = $item->barcode . '<br><a href="' . site_url('item/barcode_qrcode/' . $item->item_id) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
			$row[] = $item->name;
			$row[] = $item->category_name;
			$row[] = $item->unit_name;
			$row[] = rupiah($item->price);
			$row[] = $item->stock;
			$row[] = $item->image != null ? '<img src="' . base_url('uploads/product/' . $item->image) . '" class="img" style="width:100px">' : 'uploads/product/product_default.jpg';
			// add html for action
			$row[] = '<a href="' . site_url('item/edit/' . $item->item_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                  <a href="' . site_url('item/delete/' . $item->item_id) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->item_model->count_all(),
			"recordsFiltered" => $this->item_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}
}

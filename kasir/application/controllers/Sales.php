<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model(['sales_model', 'customer_model', 'item_model']);
      cek_not_login();
   }

   public function index()
   {
      $data = [
         'row'       => $this->customer_model->get()->result(),
         'item'      => $this->item_model->get()->result_array(),
         'cart'      => $this->sales_model->get_cart(),
         'aktif'     => 'sales',
         'menu'      => 'sales',
         'invoice'   => $this->sales_model->invoice_no()
      ];
      $this->template->load('template', 'Transaction/Sales/sales_form', $data);
   }

   public function load_cart_data()
   {
      $data['cart'] = $this->sales_model->get_cart();
      $this->load->view('Transaction/Sales/cart_data', $data);
   }

   public function process()
   {
      $post = $this->input->post(null, TRUE);

      if (isset($_POST['add_cart'])) {

         $item_id = $this->input->post('item_id');
         $check_cart = $this->sales_model->get_cart(['t_cart.item_id' => $item_id])->num_rows();
         if ($check_cart > 0) {
            $this->sales_model->update_cart_qty($post);
         } else {
            $this->sales_model->add_cart($post);
         }

         if ($this->db->affected_rows() > 0) {
            $params  = ['success' => true];
         } else {
            $params  = ['success' => false];
         }
         echo json_encode($params);
         // 
      } else if (isset($_POST['edit_cart'])) {
         $this->sales_model->edit_cart($post);

         if ($this->db->affected_rows() > 0) {
            $params  = ['success' => true];
         } else {
            $params  = ['success' => false];
         }
         echo json_encode($params);
         // 
      } else if (isset($_POST['process_payment'])) {
         $sale_id = $this->sales_model->add_sale($post);
         $cart = $this->sales_model->get_cart()->result();
         $row = [];

         foreach ($cart as $c => $value) :
            array_push($row, [
               'sales_id'        => $sale_id,
               'item_id'         => $value->item_id,
               'price'           => $value->price,
               'qty'             => $value->qty,
               'discount_item'   => $value->discount_item,
               'total'           => $value->total,
            ]);
         endforeach;
         $this->sales_model->add_sale_detail($row);
         $this->sales_model->delete_cart(['user_id' => $this->session->userdata('userid')]);

         if ($this->db->affected_rows() > 0) {
            $params  = ['success' => true, "sales_id" => $sale_id];
         } else {
            $params  = ['success' => false];
         }
         echo json_encode($params);
         // 
      }
   }

   public function cart_delete()
   {

      if (isset($_POST['cancel_payment'])) {
         $this->sales_model->delete_cart(['user_id' => $this->session->userdata('userid')]);
      } else {
         $cart_id = $this->input->post('cart_id');
         $this->sales_model->delete_cart(['cart_id' => $cart_id]);
      }

      if ($this->db->affected_rows() > 0) {
         $params  = ['success' => true];
      } else {
         $params  = ['success' => false];
      }
      echo json_encode($params);
   }

   public function cetak($id)
   {
      $data = [
         'sales'        => $this->sales_model->get_sales($id)->row(),
         'sales_detail' => $this->sales_model->get_sales_detail($id)->result(),
      ];
      $this->load->view('Transaction/Sales/receipt_print', $data);
   }

   public function delete_sales($id) 
   {
      $this->sales_model->delete_sales($id);
      pesan_alert('Dihapus', 'report/sales');
   }
}

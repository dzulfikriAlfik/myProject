<?php

function cek_already_login()
{
   $instance = &get_instance();
   $user_session = $instance->session->userdata('userid');

   if ($user_session) {
      redirect('dashboard');
   }
}

// -------------------------------------------------------------------------
function cek_not_login()
{
   $instance = &get_instance();
   $user_session = $instance->session->userdata('userid');

   if (!$user_session) {
      redirect('auth/login');
   }
}

// -------------------------------------------------------------------------
function pesan_alert($pesan, $redirect)
{
   $instance = &get_instance();
   $instance->session->set_flashdata('pesan', $pesan);
   redirect($redirect);
}

// -------------------------------------------------------------------------
function pesan_error($pesan, $redirect)
{
   $instance = &get_instance();
   $instance->session->set_flashdata('error', $pesan);
   redirect($redirect);
}

// -------------------------------------------------------------------------
function check_role()
{
   $instance = &get_instance();
   $instance->load->library('fungsi');

   if ($instance->fungsi->user_login()->level != 1) {
      redirect('dashboard');
   }
}

// -------------------------------------------------------------------------
function add_class($aktif, $menu, $class)
{
   echo $aktif == $menu ? $class : null;
}

// -------------------------------------------------------------------------
function getnama($id, $table, $table_id, $field_name)
{
   $instance   = &get_instance();
   $query      = $instance->db->query("SELECT * FROM $table WHERE $table_id='$id'")->row_array();
   return $query[$field_name];
}

// -------------------------------------------------------------------------
function rupiah($angka)
{
   $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.') . ',-';
   return $hasil_rupiah;
}

// -------------------------------------------------------------------------
function rupiah_print($angka)
{
   $hasil_rupiah = number_format($angka, 0, ',', '.') . ',-';
   return $hasil_rupiah;
}

// -------------------------------------------------------------------------
function indo_date($date)
{
   $day     = substr($date, 8, 2);
   $month   = substr($date, 5, 2);
   $year    = substr($date, 0, 4);

   return $day . '/' . $month . '/' . $year;
}

// -------------------------------------------------------------------------
function count_rows($table)
{
   $instance   = &get_instance();

   $instance->db->from($table);
   return $instance->db->get()->num_rows();
}

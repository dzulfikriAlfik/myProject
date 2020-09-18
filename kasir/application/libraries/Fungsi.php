<?php

class Fungsi
{
   protected $ci;

   function __construct()
   {
      $this->ci = &get_instance();
   }

   function user_login()
   {
      $this->ci->load->model('User_model');
      $user_id    = $this->ci->session->userdata('userid');
      $user_data  = $this->ci->User_model->get($user_id)->row();
      return $user_data;
   }

   function PdfGenerator($html, $filename, $paper, $orientation)
   {
      $dompdf = new Dompdf\Dompdf();
      $dompdf->loadHtml($html);
      // (Optional) Setup the paper size and orientation
      $dompdf->setPaper($paper, $orientation);
      // Render the HTML as PDF
      $dompdf->render();
      // Output the generated PDF to Browser
      $dompdf->stream($filename, ['Attachment' => 0]);
   }
}

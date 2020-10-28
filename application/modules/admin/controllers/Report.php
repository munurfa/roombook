<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_ship', 'ship');
        $this->load->model('M_report', 'repo');
        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url('auth/login');
            redirect($url);
        }
    }
    
    function index(){
        $data['title'] = 'Report';
        // $data['content'] = 'daftar list users akses';
        $data['type'] = $this->ship->type();

        $data['status'] = $this->ship->status();

        $page = 'admin/report/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function cetak(){
      
      $no_awb = $this->input->get('no_awb');
      $type_id=$this->input->get('type_id');
      $status_id=$this->input->get('status_id');
      $awal=$this->input->get('awal');
      $akhir=$this->input->get('akhir');
      //load mpdf libray
      $this->load->library('M_pdf');


      $mpdf = $this->m_pdf->load([
        'mode' => 'utf-8',
        'format' => 'A4'
      ]);

      $data['shipment'] = $this->repo->noAwbGroup($no_awb,$type_id,$status_id,$awal,$akhir);
      $pdfFilePath = date("Y-m-d H:i:s")."_shipment.pdf";
      $view = $this->load->view('admin/pdf/pdf', $data, true);

      $mpdf->WriteHTML($view);

      $mpdf->Output($pdfFilePath, "D");
    }
}
?>

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends MX_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->model('M_book', 'book');
        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url('auth/login');
            redirect($url);
        }
    }

    function detail_cetak($id){
          $this->load->library('M_pdf');
          $this->load->model('home/M_home', 'home');

             
            $mpdf = $this->m_pdf->load([
                    'mode' => 'utf-8',
                    'format' => 'A5',
                    'orientation' => 'L'
                  ]);
            $data['ship'] = $this->ship->getShipByNo($id);
            $data['type'] = $this->ship->type();

            $mpdf->SetJS('this.print();');
            $view = $this->load->view('admin/pdf/detail',$data,true);
            $mpdf->WriteHTML($view);
            $mpdf->Output();

    }

    function index(){
        $data['title'] = 'Peminjaman Ruang';
        $page = 'admin/booking/v_data';
        echo modules::run('template/adminview', $data, $page);
    }

    function book_json() { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->book->getBook();
    }

    function book_json_filter( $awal , $akhir) { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->book->getBook($awal, $akhir);
    }

    function create($id=-1){
        if ($id == -1) {
            $data['title'] = 'Tambah Peminjaman ruang';
            $data['id'] = -1;
        }else{
            $data['book'] = $this->book->getBookByNo($id);
            $data['title'] = 'Ubah Peminjaman Ruang';
            $data['id'] = $id;

        }

        $ruang = $this->book->ruang();
       
        $data['ruang'] = $ruang;


        $page = 'admin/booking/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_booking() {

        $post = $this->input->post();
        
        $id = $this->input->post('id');

        $this->form_validation->set_rules('agenda','Agenda','trim|required');
        $this->form_validation->set_rules('id_ruang','Ruang','trim|required');
        $this->form_validation->set_rules('tanggal','Tanggal','trim|required');
        $this->form_validation->set_rules('awal','Waktu Mulai','trim|required');
        $this->form_validation->set_rules('akhir','Waktu Selesai','trim|required');
        $cekJadwal = 0;
        if ($this->form_validation->run()!=FALSE) {
            $awal_time = $post['tanggal'].' '.$post['awal'];
            $akhir_time = $post['tanggal'].' '.$post['akhir'];
    
            $cekJadwal = $this->book->cekJadwal($post['id_ruang'], $awal_time, $akhir_time);
        }
        
        if ($this->form_validation->run()==FALSE) {
            $this->create($id);
        }elseif(count($cekJadwal)>0){
            $this->session->set_flashdata('msg', 'Ruangan dengan jadwal tersebut sudah terisi. Silahkan ganti waktu atau ruangan.');
            $this->create($id);
        }else{
            $last_id=$this->book->saveBook($post);

            if ($id!=-1) {
                $id=$id;
            } else {
                $id = $last_id; 
            }

            redirect('admin/booking/create/'.$id);
        }
    }

    function destroy($id){
        if ($id!=-1) {
            $this->book->delBook($id);
            $this->session->set_flashdata('msg', 'Data Telah Dihapus');
            redirect('admin/booking');
        }
    }


    function cetak(){
      //load mpdf libray
      $this->load->library('M_pdf');
      $this->load->model('home/M_home', 'home');


      $mpdf = $this->m_pdf->load([
        'mode' => 'utf-8',
        'format' => 'A4'
      ]);
      $data['shipment'] = $this->ship->noAwbGroup();
      $pdfFilePath = date("Y-m-d H:i:s")."_shipment.pdf";
      $view = $this->load->view('admin/pdf/pdf', $data, true);

      $mpdf->WriteHTML($view);

      $mpdf->Output($pdfFilePath, "D");
    }
}
?>
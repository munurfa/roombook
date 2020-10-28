<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Shipment extends MX_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->model('daerah/Daerah_model', 'daerah');
        $this->load->model('M_ship', 'ship');
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
        $data['title'] = 'Shipments';
        $page = 'admin/shipment/v_data';
        echo modules::run('template/adminview', $data, $page);
    }
    function ship_json() { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->ship->getShip();
    }
    function ship_json_filter( $awal , $akhir) { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->ship->getShip($awal, $akhir);
    }
    function create($id=-1){
        if ($id == -1) {
            $data['title'] = 'Add Shipment';
            $data['id'] = -1;
        }elseif( (substr($id, 0, 1) == "t") && (is_numeric(substr($id, 1)) )) {
            $data['ship'] = $this->ship->getShipByNo(substr($id,1));
            $data['title'] = 'Update Tracking Shipment';
            $data['id'] = $id;

        }else{
            $data['ship'] = $this->ship->getShipByNo($id);
            $data['title'] = 'Edit Shipment';
            $data['id'] = $id;

        }
        $daerah = $this->daerah->getProv();
        $type = $this->ship->type();
        $status = $this->ship->status();

        $data['provinsi'] = $daerah;
        $data['type'] = $type;
        $data['status'] = $status;


        $page = 'admin/shipment/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_shipment() {

        $post = $this->input->post();

        $id = $this->input->post('id');

        $this->form_validation->set_rules('status_id','Status of Shipment','trim|required');
        $this->form_validation->set_rules('type_id','Type of Shipment','trim|required');

        if ( (substr($id, 0, 1) == "t") && (is_numeric(substr($id, 0))) ) {
        $this->form_validation->set_rules('prov_ship','Provinsi Transit','trim|required');
        $this->form_validation->set_rules('kab_ship','Kabupaten Transit','trim|required');
        }


        if (($id ==-1) || ( (substr($id, 0, 1) != "t") && (is_numeric(substr($id, 0))) )) {

        $this->form_validation->set_rules('prov_shipper','Provinsi Shipper','trim|required');
        $this->form_validation->set_rules('kab_shipper','Kabupaten Shipper','trim|required');
        $this->form_validation->set_rules('kec_shipper','Kecamatan Shipper','trim|required');
        $this->form_validation->set_rules('kel_shipper','Kelurahan Shipper','trim|required');
        $this->form_validation->set_rules('shipper_name','Shipper Name','trim|required');
        $this->form_validation->set_rules('phone_shipper','Shipper Phone','trim|required');

        $this->form_validation->set_rules('prov_rec','Provinsi Receiver','trim|required');
        $this->form_validation->set_rules('kab_rec','Kabupaten Receiver','trim|required');
        $this->form_validation->set_rules('kec_rec','Kecamatan Receiver','trim|required');
        $this->form_validation->set_rules('kel_rec','Kelurahan Receiver','trim|required');
        $this->form_validation->set_rules('rec_name','Receiver Name','trim|required');
        $this->form_validation->set_rules('phone_rec','Receiver Phone','trim|required');
        }

        

        if ($this->form_validation->run()==FALSE) {
           
            $this->create($id);
        }else{
            $last_id=$this->ship->saveShip($post);

            if ($id!=-1) {
                if ( (substr($id, 0, 1) == "t") && (is_numeric(substr($id, 1)) )) {
                    $id = $last_id;
                }else{
                    $id=$id;
                }
            } else {
                $id = $last_id; 
                $this->session->set_flashdata('msg', $id);
              
            }
            redirect('admin/shipment/create/'.$id);
        }
    }

    function destroy($id, $no_awb, $idShipper, $idRec){
        if ($id!=-1) {
            $this->ship->delShip($id, $no_awb, $idShipper, $idRec);
            $this->session->set_flashdata('msg', 'Data Telah Dihapus');
            redirect('admin/shipment');
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
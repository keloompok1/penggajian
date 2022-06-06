<?php 

class PotonganGaji extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('hak_akses') !='1') {
            $this->session->set_flashdata('pesan',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Silahkan Login!</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span> 
					</button>
				</div>');
				redirect('welcome');
        }
    }
    

    public function index()
    {
        $data['tittle'] = "Potongan Gaji";
        $data['pot_gaji'] = $this->penggajian_model->get_data('potongan_gaji')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potonganGaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        
        $data['tittle'] = "Tambah Potongan Gaji";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formPotonganGaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->tambahData();
        }else {
            $potongan               =$this->input->post('potongan');
            $jmlh_potongan          = $this->input->post('jmlh_potongan');
            
            $data = array (
                'potongan'      => $potongan,
                'jmlh_potongan' => $jmlh_potongan
            );

            $this->penggajian_model->insert_data($data,'potongan_gaji');
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
          redirect('admin/potonganGaji');
        }
    }

    public function updateData($id)
    {
        $where = array('id' => $id);
        $data['tittle'] = 'Update Data Karyawan';
        $data['$pot_gaji'] = $this->db->query("SELECT * from potongan_gaji where id ='$id'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updatePotonganGaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this-> _rules();

        if($this->form_validation->run() == FALSE) {
            $this->updateData();
        }else {
            $id                     = $this->input->post('id');
            $potongan               = $this->input->post('potongan');
            $jmlh_potongan          = $this->input->post('jmlh_potongan');

            $data = array(
                'potongan'               => $potongan,
                'jmlh_potongan'          => $jmlh_potongan
            );

            $where = array (
                'id'  => $id
            );

            $this->penggajian_model->update_data('potongan_gaji',$data,$where);
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
          redirect('admin/potonganGaji');

        }
    }

    
    public function _rules()
    {
        $this->form_validation->set_rules('potongan','jenis potongan','required');
        $this->form_validation->set_rules('jmlh_potongan','jumlah potongan','required');
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->penggajian_model->delete_data($where, 'potongan_gaji');
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
          redirect('admin/potonganGaji');
    }
}


?>
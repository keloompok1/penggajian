<?php

class DataJabatan extends CI_Controller{

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
        $data['tittle'] = "Data Jabatan";
        $data['jabatan'] = $this->penggajian_model->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['tittle'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this-> _rules();

        if($this->form_validation->run() == FALSE) {
            $this->tambahData();
        }else {
            $nama_jabatan         = $this->input->post('nama_jabatan');
            $gaji_pokok           = $this->input->post('gaji_pokok');
            $tj_karyawan          = $this->input->post('tj_karyawan');
            $pajak_karyawan       = $this->input->post('pajak_karyawan');

            $data = array(
                'nama_jabatan'      => $nama_jabatan,
                'gaji_pokok'        => $gaji_pokok,
                'tj_karyawan'       => $tj_karyawan,
                'pajak_karyawan'    => $pajak_karyawan,
            );

            $this->penggajian_model->insert_data($data,'data_jabatan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');

          redirect('admin/dataJabatan');
        }
    }

    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("select * from data_jabatan where id_jabatan ='$id'")->result();
        $data['tittle'] = "Update Data";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this-> _rules();

        if($this->form_validation->run() == FALSE) {
            $this->updateData();
        }else {
            $id                   = $this->input->post('id_jabatan');
            $nama_jabatan         = $this->input->post('nama_jabatan');
            $gaji_pokok           = $this->input->post('gaji_pokok');
            $tj_karyawan          = $this->input->post('tj_karyawan');
            $pajak_karyawan       = $this->input->post('pajak_karyawan');

            $data = array(
                'nama_jabatan'      => $nama_jabatan,
                'gaji_pokok'        => $gaji_pokok,
                'tj_karyawan'       => $tj_karyawan,
                'pajak_karyawan'    => $pajak_karyawan,
            );

            $where = array (
                'id_jabatan'  => $id
            );

            $this->penggajian_model->update_data('data_jabatan',$data,$where);
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
          redirect('admin/dataJabatan');

        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
        $this->form_validation->set_rules('gaji_pokok','gaji pokok','required');
        $this->form_validation->set_rules('tj_karyawan','tunjangan karyawan','required');
        $this->form_validation->set_rules('pajak_karyawan','pajak karyawan','required');
    }

    public function deleteData($id)
    {
        $where = array('id_jabatan' => $id);
        $this->penggajian_model->delete_data($where, 'data_jabatan');
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
          redirect('admin/dataJabatan');
    }
}


?>
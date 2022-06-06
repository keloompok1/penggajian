<?php 


class dataKaryawan extends CI_Controller {

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
        $data['tittle'] = "Data Karyawan";
        $data['karyawan'] = $this->penggajian_model->get_data('data_karyawan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataKaryawan',$data);
        $this->load->view('templates_admin/footer');
}
    public function tambahData()
    {
        $data['tittle'] = "Tambah Data Karyawan";
        $data['jabatan'] = $this->penggajian_model->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahKaryawan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->tambahData();
        }else {
            $nip                    = $this->input->post('nip');
            $nama_karyawan          = $this->input->post('nama_karyawan');
            $email                  = $this->input->post('email');
            $password               = md5($this->input->post('password'));
            $jenis_kelamin          = $this->input->post('jenis_kelamin');
            $jenis_jabatan          = $this->input->post('jenis_jabatan');
            $hak_akses              = $this->input->post('hak_akses');
            $alamat_karyawan        = $this->input->post('alamat_karyawan');
            $tanggal_masuk          = $this->input->post('tanggal_masuk');
            $photo                  = $_FILES['photo']['name'];
            if($photo=''){}else{
                $config ['upload_path']     = './assets/photo';
                $config ['allowed_types']     = 'jpg|jpeg|png';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('photo')) {
                    echo "Foto Gagal diupload!";
                }else {
                    $photo=$this->upload->data('file_name');
                }
            }

            $data = array(
                'nip'                           => $nip,
                'nama_karyawan'                 => $nama_karyawan,
                'email'                         => $email,
                'password'                      => $password,
                'jenis_kelamin'                 => $jenis_kelamin,
                'jenis_jabatan'                 => $jenis_jabatan,
                'hak_akses'                     => $hak_akses,
                'alamat_karyawan'               => $alamat_karyawan,
                'tanggal_masuk'                 => $tanggal_masuk,
                'photo'                         => $photo,
            );

            $this->penggajian_model->insert_data($data,'data_karyawan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');

          redirect('admin/dataKaryawan');
        }
    }

    public function updateData($id)
    {
        $where = array('id_karyawan' => $id);
        $data['tittle'] = 'Update Data Karyawan';
        $data['jabatan'] = $this->penggajian_model->get_data('data_jabatan')->result();
        $data['karyawan'] = $this->db->query("select * from data_karyawan where id_karyawan ='$id'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateKaryawan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->updateData();
        }else {
            $id                     = $this->input->post('id_karyawan');
            $nip                    = $this->input->post('nip');
            $nama_karyawan          = $this->input->post('nama_karyawan');
            $email                  = $this->input->post('email');
            $password               = md5($this->input->post('password'));
            $jenis_kelamin          = $this->input->post('jenis_kelamin');
            $jenis_jabatan          = $this->input->post('jenis_jabatan');
            $hak_akses              = $this->input->post('hak_akses');
            $alamat_karyawan        = $this->input->post('alamat_karyawan');
            $tanggal_masuk          = $this->input->post('tanggal_masuk');
            $photo                  = $_FILES['photo']['name'];
            if($photo){
                $config ['upload_path']     = './assets/photo';
                $config ['allowed_types']     = 'jpg|jpeg|png';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('photo')) {
                    $photo=$this->upload->data('file_name');
                    $this->db->set('photo', $photo);
                }else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nip'                           => $nip,
                'nama_karyawan'                 => $nama_karyawan,
                'email'                         => $email,
                'password'                      => $password,
                'jenis_kelamin'                 => $jenis_kelamin,
                'jenis_jabatan'                 => $jenis_jabatan,
                'hak_akses'                     => $hak_akses,
                'alamat_karyawan'               => $alamat_karyawan,
                'tanggal_masuk'                 => $tanggal_masuk,
            );

            $where = array (
                'id_karyawan'    => $id
            );

            $this->penggajian_model->update_data('data_karyawan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');

          redirect('admin/dataKaryawan');
        }
    }

    
    public function _rules()
    {
        $this->form_validation->set_rules('nip','NIP','required');
        $this->form_validation->set_rules('nama_karyawan','nama karyawan','required');
        $this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
        $this->form_validation->set_rules('jenis_jabatan','jenis jabatan','required');
        $this->form_validation->set_rules('alamat_karyawan','alamat karyawan','required');
        $this->form_validation->set_rules('tanggal_masuk','tanggal masuk','required');
    }

    public function deleteData($id)
    {
        $where = array('id_karyawan' => $id);
        $this->penggajian_model->delete_data($where, 'data_karyawan');
        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
          redirect('admin/dataKaryawan');
    }

}



?>
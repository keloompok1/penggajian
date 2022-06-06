<?php 

class DataPenggajian extends CI_Controller {

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
        $data['tittle'] = "Data Gaji Karyawan";
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        
        }

        $data['potongan'] = $this->penggajian_model->get_data('potongan_gaji')->result();
        $data['gaji']   = $this->db->query("SELECT data_karyawan.nip, data_karyawan.nama_karyawan, data_karyawan.jenis_kelamin,
        data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_karyawan, data_jabatan.pajak_karyawan, data_kehadiran.tanpa_keterangan
        FROm data_karyawan INNER JOIN data_kehadiran ON data_kehadiran.nip=data_karyawan.nip
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.jenis_jabatan
        WHERE data_kehadiran.bulan='$bulantahun' 
        ORDER BY data_karyawan.nama_karyawan ASC")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataGaji',$data);
        $this->load->view('templates_admin/footer');
    }
}

?>
<?php 

class DataGaji extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('hak_akses') !='2') {
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
        $data['tittle'] =   "Data Gaji";
        $nip=$this->session->userdata('nip');
        $data['potongan']  = $this->penggajian_model->get_data('potongan_gaji')->result();
        $data['gaji']   = $this->db->query("SELECT data_karyawan.nama_karyawan, 
        data_karyawan.nip, data_jabatan.gaji_pokok, data_jabatan.tj_karyawan, data_jabatan.pajak_karyawan,
        data_kehadiran.tanpa_keterangan, data_kehadiran.bulan, data_kehadiran.id_kehadiran
        FROM data_karyawan 
        INNER JOIN data_kehadiran ON data_kehadiran.nip=data_karyawan.nip
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.jenis_jabatan
        WHERE data_kehadiran.nip='$nip'
        ORDER BY data_kehadiran.bulan DESC")->result();
        
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dataGaji',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function cetakSlip($id)
    {
        $tittle['tittle']  = "Cetak Slip Gaji";
        $data['potongan']  =  $this->penggajian_model->get_data('potongan_gaji')->result();
        $data['print_slip'] = $this->db->query("SELECT data_karyawan.nip, data_karyawan.nama_karyawan, 
        data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_karyawan, data_jabatan.pajak_karyawan,
        data_kehadiran.tanpa_keterangan, data_kehadiran.bulan
        FROM data_karyawan
        inner join data_kehadiran on data_kehadiran.nip=data_karyawan.nip
        inner join data_jabatan on data_jabatan.nama_jabatan=data_karyawan.jenis_jabatan
        where data_kehadiran.id_kehadiran='$id'")->result();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('pegawai/cetakSlipGaji',$data);

    }

}

?>
<?php 

class dataAbsensi extends CI_Controller{

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
        $data['tittle'] = "Data Absensi Karyawan";
 
            if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;

            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;

            }

            $data['absensi'] = $this->db->query("SELECT data_kehadiran.*,data_karyawan.nama_karyawan, data_karyawan.jenis_kelamin, data_karyawan.jenis_jabatan
            FROM data_kehadiran
            INNER JOIN data_karyawan ON data_kehadiran.nip = data_karyawan.nip
            INNER JOIN data_jabatan ON data_karyawan.jenis_jabatan = data_jabatan.nama_jabatan  
            WHERE data_kehadiran.bulan='$bulantahun' 
            ORDER BY data_karyawan.nama_karyawan ASC")->result();

            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/dataAbsensi',$data);
            $this->load->view('templates_admin/footer');
        }

        public function inputAbsensi() {

            if($this->input->post('submit', TRUE) == 'submit') {

                $post = $this->input->post();

                foreach ($post['bulan'] as $key => $value) {
                    if($post['bulan'][$key] !='' || $post['nip'][$key] !='')
                    {
                        $simpan[] = array(
                            'bulan'                => $post['bulan'][$key],
                            'nip'                  => $post['nip'][$key],
                            'nama_karyawan'        => $post['nama_karyawan'][$key],
                            'jenis_kelamin'        => $post['jenis_kelamin'][$key],
                            'nama_jabatan'         => $post['nama_jabatan'][$key],
                            'hadir'                => $post['hadir'][$key],
                            'sakit'                 => $post['sakit'][$key],
                            'tanpa_keterangan'     => $post['tanpa_keterangan'][$key],
                        );
                    }
                }

                $this->penggajian_model->insert_batch('data_kehadiran',$simpan);
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data ditambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
                </button>
            </div>');

            redirect('admin/dataAbsensi');
            }

            
            $data['tittle'] = "Input Absensi";
            if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;

            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;

            }
            $data['input_absensi'] = $this->db->query("SELECT data_karyawan.*, data_jabatan.nama_jabatan FROM
            data_karyawan
            INNER JOIN data_jabatan ON data_karyawan.jenis_jabatan = data_jabatan.nama_jabatan
            WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' AND data_karyawan.nip = data_kehadiran.nip)
            ORDER BY data_karyawan.nama_karyawan ASC")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/formInputAbsensi',$data);
            $this->load->view('templates_admin/footer');
        }
}


?>
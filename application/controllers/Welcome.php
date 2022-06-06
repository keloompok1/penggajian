<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

		$this->_rules();

		if($this->form_validation->run()==FALSE) {
			$data['tittle']	= "Form Login";
			$this->load->view('templates_admin/header',$data);
			$this->load->view('formLogin');
		}else {
			$email		= $this->input->post('email');
			$password	= $this->input->post('password');

			$cek 	= $this->penggajian_model->cek_login($email, $password);

			if($cek == FALSE)
			{
				$this->session->set_flashdata('pesan',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Username atau Password Salah!</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span> 
					</button>
				</div>');
				redirect('welcome');

			}else{
				$this->session->set_userdata('hak_akses',$cek->hak_akses);
				$this->session->set_userdata('nama_karyawan',$cek->nama_karyawan);
				$this->session->set_userdata('photo',$cek->photo);
				$this->session->set_userdata('id_karyawan',$cek->id_karyawan);
				$this->session->set_userdata('nip',$cek->nip);
				$this->session->set_userdata('pot_gaji',$cek->pot_gaji);
				
				

				switch($cek->hak_akses) {
					case 1 : redirect('admin/dashboard');
						break;
					case 2 : redirect('pegawai/dashboard');
						break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
	
}

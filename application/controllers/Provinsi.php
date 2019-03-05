<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('provinsi_model');
	}

	function index(){
		$data['provinsi'] = $this->provinsi_model->fetch_provinsi();
		$this->load->view('data_provinsi',$data);
	}

	function fetch_kabupaten(){
		$id_prov = $this->input->post('id_prov');
		if ($id_prov) {
			$data = $this->provinsi_model->fetch_kabupaten($id_prov);
			$output = '<option value="">Select Kota/Kabupaten</option>';
			foreach ($data as $row) {
				$output .= '<option value="'.$row->id_kab.'">'.$row->nama.'</option>';
			}
		}
		echo $output;
	}

	function fetch_kecamatan(){
		$id_kab = $this->input->post('id_kab');
		if ($id_kab) {
			$data = $this->provinsi_model->fetch_kecamatan($id_kab);
			$output = '<option value="">Select Kecamatan</option>';
			foreach ($data as $row) {
				$output .= '<option value="'.$row->id_kec.'">'.$row->nama.'</option>';
			}
		}
		echo $output;
	}

	function fetch_kelurahan(){
		$id_kec = $this->input->post('id_kec');
		if ($id_kec) {
			$data = $this->provinsi_model->fetch_kelurahan($id_kec);
			$output = '<option value="">Select Kelurahan</option>';
			foreach ($data as $row) {
				$output .= '<option value="'.$row->id_kel.'">'.$row->nama.'</option>';
			}
		}
		echo $output;
	}

}
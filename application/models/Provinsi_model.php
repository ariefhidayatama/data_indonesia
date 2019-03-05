<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends CI_Model {

	function fetch_provinsi(){
		$this->db->order_by('nama','ASC');
		$query = $this->db->get('provinsi');
		return $query->result();
	}

	function fetch_kabupaten($id_prov){
		$query = $this->db->get_where('kabupaten',array('id_prov'=>$id_prov));
		return $query->result();
	}

	function fetch_kecamatan($id_kab){
		$query = $this->db->get_where('kecamatan',array('id_kab'=>$id_kab));
		return $query->result();
	}

	function fetch_kelurahan($id_kec){
		$query = $this->db->get_where('kelurahan',array('id_kec'=>$id_kec));
		return $query->result();
	}

}
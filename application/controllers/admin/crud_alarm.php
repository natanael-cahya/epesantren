
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Crud_alarm Extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('level')){
			redirect('homepage');
		}else
		if($this->session->userdata('level') != 1){
			redirect('homepage');
		}

		
		$this->load->helper('download');
		 $this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('m_jadwal');
	}

function tb_alarm()
	{
      		$tgl=$this->input->post('tgl');
      		$hari=$this->input->post('hari');
      		$jam=$this->input->post('jam');
            $menit=$this->input->post('menit');
      		
      	


      		$result = array();

      		$hitung=0;
      		 foreach($tgl as $t){
      		   array_push($result, array(   
					'tanggal' => $t,   
            		'jam_asli'	=> $jam[$hitung].$menit[$hitung],
            		'jam' => $jam[$hitung],
            		'menit' => $menit[$hitung],
            		         
         		));
      		   
         		$hitung++;
         		}      
      		//var_dump($result);
      		$this->db->insert_batch('jadwal_alarm', $result); 
      		echo"<script>alert('data sukses disimpan');location='../admin/alarm'</script>";
	}
	function h_alarm()
	{
		$where = ['code_ja' => $this->uri->segment(4)];
		$this->m_jadwal->h_jadwal($where, 'jadwal_alarm');
		echo"<script>alert('data sukses disimpan');location='../../admin/alarm'</script>";
	}

}
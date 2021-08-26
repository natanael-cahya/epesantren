<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class E_akun Extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level')){
			redirect('login');
		}else
		if($this->session->userdata('level') != 3){
			redirect('login');
		}

		$this->load->model('m_akun');
		$this->load->helper('url');
		$this->load->library('session');
		}

	function up_akun()
	{
			   
    $password = $this->input->post('pass');
    $nama = $this->input->post('nama');
    $code= $this->input->post('code');

      if($password == NULL){

        $data=array(
          
          
          'nama' => $nama
          
        );
      $where = ['code_auth' => $code];
 
      $this->m_akun->up_akun($where,$data,'auth');
      echo"<script>alert('Data berhasil dirubah , Silahkan Login ulang');location='../../login/logout'</script>";

      }else{

      $data=array(
          
          'password' => password_hash($password, PASSWORD_BCRYPT),
          'nama' => $nama
          
        );
      $where = ['code_auth' => $code];
 
      $this->m_akun->up_akun($where,$data,'auth');
      echo"<script>alert('Data berhasil dirubah , Silahkan login ulang');location='../../login/logout'</script>";
    }
	}
}
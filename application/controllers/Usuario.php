<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios extends CI_Controller {

	public function index(){
		$this->load->view('template/header');
		$this->load->view('template/navbar_cadastro');
		$this->load->view('ver/login');
		$this->load->model('UserModel', 'model');
    }
    
	public function lista(){
		$this->load->view('ver/lista',$dados);
	}

}
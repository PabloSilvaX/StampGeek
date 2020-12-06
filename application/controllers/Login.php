<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('LoginModel');
  }
  function index(){
    $this->load->view('template/header');
    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
    $this->load->view('template/navbar', $data);
    $this->load->view('ver/login_view');
    $this->load->view('template/footer');
    $this->load->view('template/rodape');
  }

  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->LoginModel->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $id_cli  = $data['id'];
        $name  = $data['nome'];
        $titulo_img  = $data['titulo_img'];
        $email = $data['email'];
        $level = $data['nivel'];
        $identificacao = $data['identificacao'];
        $sesdata = array(
            'username'  => $name,
            'titulo_img'  => $titulo_img,
            'email'     => $email,
            'level'     => $level,
            'identificacao'     => $identificacao,
            'id'        => $id_cli,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
            redirect('loja');

        // access login for staff
        }elseif($level === '2'){
            redirect('loja');

        // access login for author
        }else{
            redirect('loja');
        }
    }else{
        echo $this->session->set_flashdata('msg','O Email ou Senha estão Incorretos.');
        redirect('login');
    }
  }

  function logout(){
      
    $this->session->sess_destroy();
		$this->load->view('template/header');
    $this->load->view('template/navbar');

    
    redirect('login');

		$this->load->view('template/footer');
		$this->load->view('template/rodape');
      
  }


}

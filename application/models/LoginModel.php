<?php
class LoginModel extends CI_Model{

  function validate($email,$password){
    $this->db->where('email',$email);
    $this->db->where('senha',$password);
    $result = $this->db->get('usuario',1);
    return $result;
  }

}

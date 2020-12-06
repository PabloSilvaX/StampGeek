<?php
include_once APPPATH.'libraries/BannerLib.php';
class BannerModel extends CI_Model{

    
    public function insere_carroul($produ){
        if(sizeof($_POST) == 0) return;
        
        $data['imagens'] = $this->paisagem->salva();
        $this->db->insert('carrousel', $produ);
        redirect('');
    }

    public function gera_carrousel(){
        $html ='';
        $active = '0';
        $carrousel = new BannerLib();
        $data = $carrousel->listacarroussel();


       
  $html .= '<div class="carousel-item active">
            <a href="#"><img class="d-block w-100" src="'.base_url('assets/images/activecar').'.png" alt="First slide"></a>
          </div>'; 
       

        foreach ($data as $crsl) {

            
          $html .= '<div class="carousel-item">
          <a href="'.$crsl['link'].'"><img class="d-block w-100" src="'.base_url('uploads/').''.$crsl['titulo_img'].'.jpg" alt="Second slide"></a>
          </div>';
   
      
        }
        return $html;
    }


    public function tabela_carrousel(){
        $html ='';
        $active = '0';
        $carrousel = new BannerLib();
        $data = $carrousel->listacarroussel();


 
        foreach ($data as $crsl) {
            $html .= '<tr>';
            $html .= '<td>'.$crsl['id'].'</td>';
           $html .= '<td><img style="width: 100px;" src="'.base_url('uploads/').''.$crsl['titulo_img'].'.jpg" alt="First slide"></td>';
            $html .= '<td><a href="'.$crsl['link'].'">'.$crsl['link'].'</a></td>';
            $html .= '<td>'.$this->action_buttons($crsl['id']).'</td>';
            $html .= '</tr>';
        }
        return $html;
    }


    
    
    private function action_buttons($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/page/deletar_carrousel/'.$id).'">';
        $html .= '<i title="Deletar" class="fas fa-trash-alt text-danger fa-2x"></i></a>';
        return $html;}
    }


    public function edita_banner($id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();
        $banner = new BannerLib();
        $banner->edita_banner($data, $id);
        redirect('#');
    }

    public function deleta_carrouls($id){
        $servicos= new BannerLib();
        $servicos->deleta($id);
    }

    public function read($id){
        $banne = new BannerLib();
        return $banne->service_data($id);
    }
    
}

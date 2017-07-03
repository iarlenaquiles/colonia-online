<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class links extends CI_Controller
{


  public function __construct()
  {
      parent::__construct();
      // Your own constructor code

      //Carrega Tabelas
      $this->load->library("autenticacao");
      $this->load->model("links_model");

  }


  public function index()
	{
      $this->listar();

  }

  public function upload_foto() {
      $this->load->model("links_model");

      if ($img = $this->links_model->uploadFoto('uploadfoto')) {
          echo $img;
      } else {
          echo 'false';
      }
  }

  public function editar($id){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $data = array();

      $data['registro'] = $this->links_model->getById($id);

      $this->template->controlearquivo("links/editar", $data);
  }

  public function excluir($id)
  {
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $this->links_model->delete($id);
      echo json_encode(array('classe' => 'acerto', 'msg' => "Link excluído com sucesso!", 'url' => base_url('links/listar')));
      exit();
  }

  public function listar()
  {

      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $data = array();

      $data["registros"] = $this->links_model->getAll();

      $this->template->controlearquivo("links/listar", $data);
  }

  public function cadastrar(){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $data = array();

      $this->template->controlearquivo("links/cadastrar", $data);
  }
  public function salvar(){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      //Se for informado o id atualiza, caso contrário insere
      if (!empty($_REQUEST['id_link'])) {
          $this->links_model->update('links', array(
            'nome_link' => $_REQUEST['nome_link'],
            'link' => $_REQUEST['link'],
            'foto' => $_REQUEST['foto']
          ),'id_link', $_REQUEST['id_link']);

              echo json_encode(array('classe' => 'acerto', 'msg' => "Link atualizado com sucesso!", 'url' => base_url('links/listar')));
              exit();

      } else {

          //Inserir Novo registro
          $idLinks = $this->links_model->insert(array(
              'nome_link' => $_REQUEST['nome_link'],
              'link' => $_REQUEST['link'],
              'foto' => $_REQUEST['foto'],
              'data_cadastro' => date('Y-m-d H:i:s'),
              'id_usuario_cadastro' => $this->session->userdata("id_usuario")
          ));



              echo json_encode(array('classe' => 'acerto', 'msg' => "Link cadastrado com sucesso!", 'url' => base_url('links/listar')));
              exit();


      }
  }
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class agendamento extends CI_Controller
{


  public function __construct()
  {
      parent::__construct();
      // Your own constructor code

      //Carrega Tabelas
      $this->load->library("autenticacao");
      $this->load->model("agendamento_model");

  }


  public function index()
	{


  }

  public function editar($id){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $data = array();
      $this->load->model( "pessoa_model" );
      $data['pessoas'] = $this->pessoa_model->getAll();
      $data['registro'] = $this->agendamento_model->getById($id);
      $this->template->controlearquivo("agendamento/editar", $data);
  }

  public function excluir($idAgendamento)
  {
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $this->agendamento_model->delete($idAgendamento);
      echo json_encode(array('classe' => 'acerto', 'msg' => "Agendamento excluído com sucesso!", 'url' => base_url('agendamento/listar')));
      exit();
  }

  public function listar()
  {

      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $this->load->model( "pessoa_model" );
      $data['pessoas'] = $this->pessoa_model->getAll();
      //Retorno registros
      $data["registros"] = $this->agendamento_model->getAll($filtros);

      $this->template->controlearquivo("agendamento/listar", $data);
  }

  public function cadastrar(){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $data = array();

      $this->template->controlearquivo("agendamento/cadastrar", $data);
  }
  public function salvar(){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      //Se for informado o id atualiza, caso contrário insere
      if (!empty($_REQUEST['id_agendamento_inss'])) {
          $this->agendamento_model->update('agendamento_inss', array(
            'numero_beneficio' => $_REQUEST['numero_beneficio'],
            'data_agendamento' => $this->funcoes->formataDataBanco($_REQUEST['data_agendamento']),
            'tipo_beneficio' => $_REQUEST['tipo_beneficio'],
            'horario' => $_REQUEST['horario'],
            'id_pessoa' => $_REQUEST['id_pessoa']
          ),'id_agendamento_inss', $_REQUEST['id_agendamento_inss']);

              echo json_encode(array('classe' => 'acerto', 'msg' => "Agendamento atualizado com sucesso!", 'url' => base_url('agendamento/listar')));
              exit();

      } else {

          //Inserir Novo registro
          $idAgendamento = $this->agendamento_model->insert(array(
              'numero_beneficio' => $_REQUEST['numero_beneficio'],
              'data_agendamento' => $this->funcoes->formataDataBanco($_REQUEST['data_agendamento']),
              'tipo_beneficio' => $_REQUEST['tipo_beneficio'],
              'id_pessoa' => $_REQUEST['id_pessoa'],
              'horario' => $_REQUEST['horario'],
              'data_cadastro' => date('Y-m-d H:i:s'),
              'id_usuario_cadastro' => $this->session->userdata("id_usuario")
          ));



              echo json_encode(array('classe' => 'acerto', 'msg' => "Agendamento cadastrado com sucesso!", 'url' => base_url('agendamento/listar')));
              exit();


      }
  }
}

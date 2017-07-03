<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class atendimento extends CI_Controller
{


  public function __construct()
  {
      parent::__construct();
      // Your own constructor code

      //Carrega Tabelas
      $this->load->library("autenticacao");
      $this->load->model("atendimento_model");

  }

  public function editar($id){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $data = array();

      $data['registro'] = $this->atendimento_model->getById($id);
      $this->template->controlearquivo("atendimento/editar", $data);
  }

  public function excluir($idAtendimento)
  {
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $this->atendimento_model->delete($idAtendimento);
      echo json_encode(array('classe' => 'acerto', 'msg' => "Atendimento excluído com sucesso!", 'url' => base_url('atendimento/listar')));
      exit();
  }

  public function listar()
  {

      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $this->load->model( "colonia_model" );
      $data['colonias'] = $this->colonia_model->getTodos();
      //Retorno registros
      $data["registros"] = $this->atendimento_model->getAll($filtros);

      $this->template->controlearquivo("atendimento/listar", $data);
  }

  public function meusatendimentos(){

    //Verificação da Sessão de Login
    $this->load->library("autenticacao");
    $this->load->model( "colonia_model" );
    $data['colonias'] = $this->colonia_model->getTodos();
    $data["registros"] = $this->atendimento_model->getAtendimentoByColonia($this->session->userdata("colonia_id"));

    $this->template->controlearquivo("atendimento/meusatendimentos", $data);
  }

  public function cadastrar(){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $data = array();

      $this->template->controlearquivo("atendimento/cadastrar", $data);
  }
  public function salvar(){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      //Se for informado o id atualiza, caso contrário insere
      if (!empty($_REQUEST['id_historico'])) {
          $this->atendimento_model->update('historico', array(
            'nome_colonia' => $_REQUEST['nome_colonia'],
            'data_fundacao' => $this->funcoes->formataDataBanco($_REQUEST['data_fundacao']),
            'cnpj' => $_REQUEST['cpf_cnpj'],
            'telefone_colonia' => $_REQUEST['telefone_colonia'],
            'endereco_rua' => $_REQUEST['endereco_rua'],
            'endereco_bairro' => $_REQUEST['endereco_bairro'],
            'endereco_numero' => $_REQUEST['endereco_numero'],
            'endereco_complemento' => $_REQUEST['endereco_complemento'],
            'ponto_referencia' => $_REQUEST['ponto_referencia'],
            'vizinhos' => $_REQUEST['vizinhos'],
            'cep' => $_REQUEST['endereco_cep'],
            'id_estado' => $_REQUEST['id_estado'],
            'id_municipio' => $_REQUEST['id_cidade'],
            'telefones' => $_REQUEST['telefones'],
            'presidente_colonia' => $_REQUEST['presidente_colonia'],
            'secretario_colonia' => $_REQUEST['secretario_colonia'],
            'tesoureiro_colonia' => $_REQUEST['tesoureiro_colonia'],
            'foto' => $_REQUEST['foto']
          ),'id_historico', $_REQUEST['id_historico']);

              echo json_encode(array('classe' => 'acerto', 'msg' => "Atendimento atualizado com sucesso!", 'url' => base_url('atendimento/listar') . "/" . $_REQUEST['id_agendamento_inss']));
              exit();

      } else {

          //Inserir Novo registro
          $idAtendimento = $this->atendimento_model->insert(array(
              'descricao_historico' => $_REQUEST['descricao_historico'],
              'id_pessoa' => $_REQUEST['id_pessoa'],
              'id_usuario_cadastro' => $this->session->userdata("id_usuario"),
              'data_cadastro' => date('Y-m-d H:i:s')
          ));



              echo json_encode(array('classe' => 'acerto', 'msg' => "Atendimento cadastrado com sucesso!", 'url' => base_url('atendimento/listar')));
              exit();


      }
  }
}

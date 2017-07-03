<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class colonia extends CI_Controller
{


  public function __construct()
  {
      parent::__construct();
      // Your own constructor code

      //Carrega Tabelas
      $this->load->library("autenticacao");
      $this->load->model("colonia_model");

  }


  public function upload_foto() {
      $this->load->model("colonia_model");

      if ($img = $this->colonia_model->uploadFoto('uploadfoto')) {
          echo $img;
      } else {
          echo 'false';
      }
  }

  public function upload_foto_federacao() {
      $this->load->model("colonia_model");

      if ($img = $this->colonia_model->uploadFotoFederacao('uploadfoto')) {
          echo $img;
      } else {
          echo 'false';
      }
  }

  public function editar($id){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $data = array();

      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();

      $this->load->model("pessoa_model");
      $data['cargos'] = $this->pessoa_model->getAll();

      $data['registro'] = $this->colonia_model->getById($id);
      $this->template->controlearquivo("colonia/editar", $data);
  }

  public function excluir($idColonia)
  {
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $this->colonia_model->delete($idColonia);
      echo json_encode(array('classe' => 'acerto', 'msg' => "Colonia excluída com sucesso!", 'url' => base_url('colonia/listar')));
      exit();
  }

  public function listar()
  {

      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      //Retorno registros
      $this->load->model("pessoa_model");
      $data["cargos"] = $this->pessoa_model->getTodos();
      $data["registros"] = $this->colonia_model->getAll($filtros);

      $this->template->controlearquivo("colonia/listar", $data);
  }

  public function listarTodas(){
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    //Retorno registros
    $this->load->model("pessoa_model");
    $data["cargos"] = $this->pessoa_model->getTodos();
    $data["registros"] = $this->colonia_model->getTodos($filtros);

    $this->template->controlearquivo("colonia/listar", $data);
  }

  public function cadastrar(){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $data = array();

      $this->load->model( "estado_model" );
      $data['estados'] = $this->estado_model->getAll();

      $this->template->controlearquivo("colonia/cadastrar", $data);
  }
  public function salvar(){
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      //Se for informado o id atualiza, caso contrário insere
      if (!empty($_REQUEST['id_colonia'])) {
          $this->colonia_model->update('colonia', array(
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
            'id_pessoa_presidente' => $_REQUEST['id_pessoa_presidente'],
            'id_pessoa_vice_presidente' => $_REQUEST['id_pessoa_vice_presidente'],
            'id_pessoa_secretario' => $_REQUEST['id_pessoa_secretario'],
            'id_pessoa_segundo_secretario' => $_REQUEST['id_pessoa_segundo_secretario'],
            'id_pessoa_tesoureiro' => $_REQUEST['id_pessoa_tesoureiro'],
            'id_pessoa_segundo_tesoureiro' => $_REQUEST['id_pessoa_segundo_tesoureiro'],
            'id_pessoa_presidente_conselho' => $_REQUEST['id_pessoa_presidente_conselho'],
            'id_pessoa_vice_presidente_conselho' => $_REQUEST['id_pessoa_vice_presidente_conselho'],
            'id_pessoa_suplente1' => $_REQUEST['id_pessoa_suplente1'],
            'id_pessoa_suplente2' => $_REQUEST['id_pessoa_suplente2'],
            'id_pessoa_suplente3' => $_REQUEST['id_pessoa_suplente3'],
            'id_pessoa_suplente4' => $_REQUEST['id_pessoa_suplente4'],
            'data_inicio_mandato' => $this->funcoes->formataDataBanco($_REQUEST['data_inicio_mandato']),
            'data_fim_mandato' => $this->funcoes->formataDataBanco($_REQUEST['data_fim_mandato']),
            'id_federacao' => $_REQUEST['id_federacao'],
            'foto' => $_REQUEST['foto']
          ),'id_colonia', $_REQUEST['id_colonia']);

              echo json_encode(array('classe' => 'acerto', 'msg' => "Colonia atualizada com sucesso!", 'url' => base_url('colonia/editar') . "/" . $_REQUEST['id_colonia']));
              exit();

      } else {

        if(!empty($_REQUEST['cpf_cnpj']))
            $verificaColoniaExistente = $this->colonia_model->getByCnpj($_REQUEST['cpf_cnpj']);

        //Se existir continua o processo
        if(!empty($verificaColoniaExistente))
        {
            echo json_encode(array('classe' => 'acerto', 'msg' => "Colonia já cadastrada!", 'url' => base_url('colonia/editar')."/".$verificaColoniaExistente['id_colonia']));
            exit();
        }
          //Inserir Novo registro
          $idColonia = $this->colonia_model->insert(array(
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
              'id_pessoa_presidente' => $_REQUEST['id_pessoa_presidente'],
              'id_pessoa_vice_presidente' => $_REQUEST['id_pessoa_vice_presidente'],
              'id_pessoa_secretario' => $_REQUEST['id_pessoa_secretario'],
              'id_pessoa_segundo_secretario' => $_REQUEST['id_pessoa_segundo_secretario'],
              'id_pessoa_tesoureiro' => $_REQUEST['id_pessoa_tesoureiro'],
              'id_pessoa_segundo_tesoureiro' => $_REQUEST['id_pessoa_segundo_tesoureiro'],
              'id_pessoa_presidente_conselho' => $_REQUEST['id_pessoa_presidente_conselho'],
              'id_pessoa_vice_presidente_conselho' => $_REQUEST['id_pessoa_vice_presidente_conselho'],
              'id_pessoa_suplente1' => $_REQUEST['id_pessoa_suplente1'],
              'id_pessoa_suplente2' => $_REQUEST['id_pessoa_suplente2'],
              'id_pessoa_suplente3' => $_REQUEST['id_pessoa_suplente3'],
              'id_pessoa_suplente4' => $_REQUEST['id_pessoa_suplente4'],
              'data_inicio_mandato' => $this->funcoes->formataDataBanco($_REQUEST['data_inicio_mandato']),
              'data_fim_mandato' => $this->funcoes->formataDataBanco($_REQUEST['data_fim_mandato']),
              'id_federacao' => $_REQUEST['id_federacao'],
              'data_cadastro' => date('Y-m-d H:i:s'),
              'foto' => $_REQUEST['foto']
          ));



              echo json_encode(array('classe' => 'acerto', 'msg' => "Colonia cadastrada com sucesso!", 'url' => base_url('colonia/listarTodas')));
              exit();


      }
  }
}

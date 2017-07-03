<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class pessoa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // Your own constructor code

    //Carrega Tabelas
    $this->load->library("autenticacao");
    $this->load->model("pessoa_model");

  }

  public function index()
  {
    $this->listar();


  }

  public function cadastrar($idProcesso = null, $lado_parte = null)
  {

    if(!$this->permission->checkPermission($this->session->userdata('permissao'), 'aPescador')){
      $this->session->set_flashdata('error','Você não tem permissão para adicionar pescadores.');
    }
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    $data = array();

    $this->load->model( "estado_model" );
    $data['estados'] = $this->estado_model->getAll();

    if(!empty($idProcesso))
    $data['id_processo'] = $idProcesso;

    if(!empty($lado_parte))
    $data['lado_parte'] = $lado_parte;

    $this->template->controlearquivo("pessoa/cadastrar", $data);
  }

  public function upload_anexo(){
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    if ($xml = $this->pessoa_model->uploadAnexo('uploadanexo')) {
      echo $xml;
    } else {
      echo 'false';
    }
  }

  public function anexo($id){
    $this->load->library("autenticacao");
    $this->completo($id);
    $this->editar($id);
  }


  public function excluir_anexo($id){
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");
    $pessoa_anexo = $this->pessoa_model->getAnexoById($id);
    unlink($pessoa_anexo['caminho_anexo']);
    $this->pessoa_model->deleteAnexo($id);
    echo json_encode(array('classe' => 'acerto', 'msg' => "Anexo excluído com sucesso!"));
    exit();
  }

  public function excluir_pagamento($id){
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");
    $this->pessoa_model->deletePagamento($id);
    echo json_encode(array('classe' => 'acerto', 'msg' => "Pagamento excluído com sucesso!"));
    exit();
  }

  public function salvar_tipo_relatorio()
  {
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    $idRelatorio = $this->pessoa_model->insert_relatorio(array(
      'tipo_relatorio' => $_REQUEST['tipo_relatorio'],
      'id_pessoa' => $_REQUEST['id_pessoa'],
      'id_usuario_cadastro' => $this->session->userdata("id_usuario"),
      'data_cadastro' => date('Y-m-d H:i:s'))
    );

    echo json_encode(array('classe' => 'acerto', 'msg' => "Relatório gerado com sucesso!", 'url' => base_url('pessoa/editar')."/".$_REQUEST['id_pessoa']));
    exit();

  }
  public function salvar_anexo(){
    //Inserir Novo registro
    $idAnexo = $this->pessoa_model->insert_anexo(array(
      'nome_anexo' => $_REQUEST['nome_anexo'],
      'caminho_anexo' => $_REQUEST['anexo'],
      'id_pessoa' => $_REQUEST['id_pessoa'],
      'data_cadastro' => date('Y-m-d H:i:s'),
      'id_usuario_cadastro' => $this->session->userdata("id_usuario")
    ));

    echo json_encode(array('classe' => 'acerto', 'msg' => "Anexo cadastrado com sucesso!", 'url' => base_url('pessoa/completo')."/".$_REQUEST['id_pessoa']));
    exit();


  }



  public function salvar_anexo_e(){
    //Inserir Novo registro
    $idAnexo = $this->pessoa_model->insert_anexo(array(
      'nome_anexo' => $_REQUEST['nome_anexo'],
      'caminho_anexo' => $_REQUEST['anexo'],
      'id_pessoa' => $_REQUEST['id_pessoa'],
      'data_cadastro' => date('Y-m-d H:i:s'),
      'id_usuario_cadastro' => $this->session->userdata("id_usuario")
    ));

    echo json_encode(array('classe' => 'acerto', 'msg' => "Anexo cadastrado com sucesso!", 'url' => base_url('pessoa/editar')."/".$_REQUEST['id_pessoa']));
    exit();

  }

  public function historico($id){
    $this->session->set_userdata(array('aba_atual' => 'Atendimento'));
    $this->load->library("autenticacao");
    $this->completo($id);
    $this->editar($id);
  }

  public function salvar_historico(){
    //Inserir Novo registro
    $idHistorico = $this->pessoa_model->insert_historico(array(
      'descricao_historico' => $_REQUEST['descricao_historico'],
      'id_pessoa' => $_REQUEST['id_pessoa'],
      'data_cadastro' => date('Y-m-d H:i:s'),
      'id_usuario_cadastro' => $this->session->userdata("id_usuario")
    ));

    echo json_encode(array('classe' => 'acerto', 'msg' => "Atendimento cadastrado com sucesso!", 'url' => base_url('pessoa/completo')."/".$_REQUEST['id_pessoa']));
    exit();
  }

  public function salvar_agendamento_e(){

    //Inserir Novo registro
    $idAgendamento = $this->pessoa_model->insert_agendamento(array(
      'numero_beneficio' => $_REQUEST['numero_beneficio'],
      'data_agendamento' => $this->funcoes->formataDataBanco($_REQUEST['data_agendamento']),
      'tipo_beneficio' => $_REQUEST['tipo_beneficio'],
      'id_pessoa' => $_REQUEST['id_pessoa'],
      'data_cadastro' => date('Y-m-d H:i:s'),
      'horario' => $_REQUEST['horario'],
      'id_usuario_cadastro' => $this->session->userdata("id_usuario")
    ));



    echo json_encode(array('classe' => 'acerto', 'msg' => "Agendamento cadastrado com sucesso!", 'url' => base_url('pessoa/editar')."/".$_REQUEST['id_pessoa']));
    exit();
  }




  public function salvar_pagamento_e(){

    //Inserir Novo registro
    $idPagamento = $this->pessoa_model->insert_pagamento(array(
      'data_pagamento' => $this->funcoes->formataDataBanco($_REQUEST['data_pagamento']),
      'valor_pagamento' => $_REQUEST['valor_pagamento'],
      'id_pessoa' => $_REQUEST['id_pessoa'],
      'id_usuario_cadastro' => $this->session->userdata("id_usuario"),
      'data_cadastro' => date('Y-m-d H:i:s')
    ));

    echo json_encode(array('classe' => 'acerto', 'msg' => "Pagamento cadastrado com sucesso!", 'url' => base_url('pessoa/editar')."/".$_REQUEST['id_pessoa']));
    exit();
  }

  public function salvar_pagamento_c(){

    //Inserir Novo registro
    $idPagamento = $this->pessoa_model->insert_pagamento(array(
      'data_pagamento' => $this->funcoes->formataDataBanco($_REQUEST['data_pagamento']),
      'valor_pagamento' => $_REQUEST['valor_pagamento'],
      'id_pessoa' => $_REQUEST['id_pessoa'],
      'id_usuario_cadastro' => $this->session->userdata("id_usuario"),
      'data_cadastro' => date('Y-m-d H:i:s')
    ));

    echo json_encode(array('classe' => 'acerto', 'msg' => "Pagamento cadastrado com sucesso!", 'url' => base_url('pessoa/completo')."/".$_REQUEST['id_pessoa']));
    exit();
  }






  public function salvar_historico_e(){
    //Inserir Novo registro
    $idHistorico = $this->pessoa_model->insert_historico(array(
      'descricao_historico' => $_REQUEST['descricao_historico'],
      'id_pessoa' => $_REQUEST['id_pessoa'],
      'data_cadastro' => date('Y-m-d H:i:s'),
      'id_usuario_cadastro' => $this->session->userdata("id_usuario")
    ));

    echo json_encode(array('classe' => 'acerto', 'msg' => "Atendimento cadastrado com sucesso!", 'url' => base_url('pessoa/editar')."/".$_REQUEST['id_pessoa']));
    exit();
  }

  public function agendamento($id)
  {
    $this->session->set_userdata(array('aba_atual' => 'agendamento'));

    //Verificação da Sessão de Login
    $this->load->library("autenticacao");
    $this->editar($id);
    $this->completo($id);
  }
  public function salvar_agendamento(){
    $this->session->set_userdata(array('aba_atual' => 'agendamento'));
    //Inserir Novo registro
    $idAgendamento = $this->pessoa_model->insert_agendamento(array(
      'numero_beneficio' => $_REQUEST['numero_beneficio'],
      'data_agendamento' => $this->funcoes->formataDataBanco($_REQUEST['data_agendamento']),
      'tipo_beneficio' => $_REQUEST['tipo_beneficio'],
      'id_pessoa' => $_REQUEST['id_pessoa'],
      'horario' => $_REQUEST['horario'],
      'data_cadastro' => date('Y-m-d H:i:s'),
      'id_usuario_cadastro' => $this->session->userdata("id_usuario")
    ));



    echo json_encode(array('classe' => 'acerto', 'msg' => "Agendamento cadastrado com sucesso!", 'url' => base_url('pessoa/completo')."/".$_REQUEST['id_pessoa']));
    exit();
  }



  public function completo($id)
  {

    if(!$this->permission->checkPermission($this->session->userdata('permissao'), 'vPescador')){
      $this->session->set_flashdata('error','Você não tem permissão para visualizar pescadores.');
    }
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    $data = array();
    $this->load->model( "estado_model" );
    $data['estados'] = $this->estado_model->getAll();
    $data['agendamento'] = $this->pessoa_model->getAgendamento($id);
    $data['historico'] = $this->pessoa_model->getHistorico($id);
    $data['anexo'] = $this->pessoa_model->getAnexos($id);
    $data['pagamento'] = $this->pessoa_model->getPagamentos($id);
    $data['registro'] = $this->pessoa_model->getById($id);

    $this->template->controlearquivo("pessoa/completo", $data);
  }



  public function editar($id)
  {

    if(!$this->permission->checkPermission($this->session->userdata('permissao'), 'ePescador')){
      $this->session->set_flashdata('error','Você não tem permissão para visualizar pescadores.');
    }
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    $data = array();

    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();
    $data['agendamento'] = $this->pessoa_model->getAgendamento($id);
    $data['historico'] = $this->pessoa_model->getHistorico($id);
    $data['anexo'] = $this->pessoa_model->getAnexos($id);
    $data['pagamento'] = $this->pessoa_model->getPagamentos($id);
    $data['registro'] = $this->pessoa_model->getById($id);
    $this->template->controlearquivo("pessoa/editar", $data);
  }


  public function listar()
  {

    if(!$this->permission->checkPermission($this->session->userdata('permissao'), 'vPescador')){
      $this->session->set_flashdata('error','Você não tem permissão para visualizar pescadores.');
      echo json_encode(array('classe' => 'erro', 'msg' => "Voce nao tem permissao."));
      redirect(base_url());
    }
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    //Retorno registros
    $data["registros"] = $this->pessoa_model->getAll($this->session->userdata('colonia_id'));

    $this->template->controlearquivo("pessoa/listar", $data);
  }
  public function listarTodos()
  {

    if(!$this->permission->checkPermission($this->session->userdata('permissao'), 'vPescadores')){
      $this->session->set_flashdata('error','Você não tem permissão para visualizar pescadores.');
      echo json_encode(array('classe' => 'erro', 'msg' => "Voce nao tem permissao."));
      redirect(base_url());
    }
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    //Retorno registros
    $data["registros"] = $this->pessoa_model->getTodos();

    $this->template->controlearquivo("pessoa/listarTodos", $data);
  }

  public function normativa($id)
  {
    $this->load->library('pdf');

    $this->load->library("autenticacao");

    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();

    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $this->load->model("pessoa_model");
    $data['registro'] = $this->pessoa_model->getById($id);

    $this->pdf->load_view('pessoa/normativa_inss', $data);
    $this->pdf->Output();

  }

  public function normativa_view($id)
  {


    $this->load->library("autenticacao");

    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();

    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $this->load->model("pessoa_model");
    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);

    $this->template->controlearquivo("pessoa/normativa_v", $data);

  }


  public function recurso_view($id)
  {


    $this->load->library("autenticacao");

    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();

    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $this->load->model("pessoa_model");
    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);

    $this->template->controlearquivo("pessoa/recurso_v", $data);

  }

  public function impressao_view($id)
  {


    $this->load->library("autenticacao");

    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();

    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $this->load->model("pessoa_model");
    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);

    $this->template->controlearquivo("pessoa/completo_impressao_v", $data);

  }
  public function semoc_view($id)
  {


    $this->load->library("autenticacao");

    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();

    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $this->load->model("pessoa_model");
    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);

    $this->template->controlearquivo("pessoa/semoc_v", $data);

  }

  public function renda_view($id)
  {


    $this->load->library("autenticacao");

    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();

    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $this->load->model("pessoa_model");
    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);

    $this->template->controlearquivo("pessoa/renda_v", $data);

  }
  public function pesca_view($id){
    $this->load->library("autenticacao");
    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();

    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);
    $this->template->controlearquivo("pessoa/autorizacao_pesca_v", $data);
  }



  public function gerar_carteira($id){
    $this->load->library('pdf');

    $this->load->library("autenticacao");

    $this->load->model("pessoa_model");

    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();


    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $data['registro'] = $this->pessoa_model->getById($id);

    $this->pdf->load_view('pessoa/carteira', $data);
    $this->pdf->Output();
  }

  public function impressao($id){
    $this->load->library('pdf');

    $this->load->library("autenticacao");

    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();

    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $this->load->model("pessoa_model");

    $data['registro'] = $this->pessoa_model->getById($id);

    $this->pdf->load_view('pessoa/completo_impressao', $data);
    //$this->pdf->SetFooter('{DATE j/m/Y H:i||Página {PAGENO}/{nb}}');

    $this->pdf->Output();
  }

  public function gerar_declaracao($id){
    $this->load->library('pdf');

    $this->load->library("autenticacao");

    $this->load->model("pessoa_model");
    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();

    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();

    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

    $data['registro'] = $this->pessoa_model->getById($id);

    $this->pdf->load_view('pessoa/declaracao', $data);
    $this->pdf->Output();
  }
  public function declaracao_view($id){
    $this->load->library("autenticacao");

    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);
    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();
    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();
    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
    $this->template->controlearquivo("pessoa/declaracao_v", $data);
  }

  public function cancelamento_view($id){
    $this->load->library("autenticacao");

    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);
    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();
    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();
    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
    $this->template->controlearquivo("pessoa/cancelamento_v", $data);
  }

  public function segunda_via_view($id){
    $this->load->library("autenticacao");

    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);
    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();
    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();
    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
    $this->template->controlearquivo("pessoa/segunda_via_v", $data);
  }

  public function declaracao_test_view($id){
    $this->load->library("autenticacao");

    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);
    $data['testemunha'] = $this->pessoa_model->getById($_REQUEST['id_testemunha']);
    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();
    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();
    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
    $this->template->controlearquivo("pessoa/declaracao_test_v", $data);
  }

  public function transferencia_view($id){
    $this->load->library("autenticacao");

    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);
    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();
    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();
    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
    $this->template->controlearquivo("pessoa/transferencia_v", $data);
  }

  public function declaracao_desembarcado_view($id){
    $this->load->library("autenticacao");

    $data['cargos'] = $this->pessoa_model->getAll();
    $data['registro'] = $this->pessoa_model->getById($id);
    $this->load->model("estado_model");
    $data['estados'] = $this->estado_model->getAll();
    $this->load->model("cidade_model");
    $data['cidades'] = $this->cidade_model->getAll();
    $this->load->model("colonia_model");
    $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
    $this->template->controlearquivo("pessoa/declaracao_desembarcado_v", $data);
  }


  public function atualizar_pagamento_e(){
    if (!empty($_REQUEST['id_historico_pescador_pagamento'])) {
      $this->pessoa_model->update('historico_pescador_pagamento', array(
        'data_pagamento' => $this->funcoes->formataDataBanco($_REQUEST['data_pagamentoE']),
        'valor_pagamento' => $_REQUEST['valor_pagamentoE']

      ),'id_historico_pescador_pagamento', $_REQUEST['id_historico_pescador_pagamento']);

      echo json_encode(array('classe' => 'acerto', 'msg' => "Pagamento atualizado com sucesso!", 'url' => base_url('pessoa/editar') . "/" . $_REQUEST['id_pessoa']));
      exit();
    }
  }

  public function atualizar_pagamento_c(){
    if (!empty($_REQUEST['id_historico_pescador_pagamento'])) {
      $this->pessoa_model->update('historico_pescador_pagamento', array(
        'data_pagamento' => $this->funcoes->formataDataBanco($_REQUEST['data_pagamentoE']),
        'valor_pagamento' => $_REQUEST['valor_pagamentoE']

      ),'id_historico_pescador_pagamento', $_REQUEST['id_historico_pescador_pagamento']);

      echo json_encode(array('classe' => 'acerto', 'msg' => "Pagamento atualizado com sucesso!", 'url' => base_url('pessoa/completo') . "/" . $_REQUEST['id_pessoa']));
      exit();
    }
  }


  /** Método responsável por gerar o relatório em PDF dos lançamentos
  * @author Tássio Neri
  * @name gerar_pdf
  * @access public
  * @return string View completa
  */
  public function gerar_pdf()
  {
    //Chama da Biblioteca mPDF
    $this->load->library('pdf');

    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    //Carrega Tabelas
    $this->load->model("pessoa_model");

    $data["registros"] = $this->pessoa_model->getAll($filtros);

    $this->pdf->load_view('pessoa/listar_view', $data);
    $this->pdf->Output();
    //$this->load->view("pessoa/listar_view", $data);

    // $mpdf = new mPDF();
    //
    // $mpdf->SetHeader('Gerando PDF no CodeIgniter com a biblioteca mPDF');
    //
    // $mpdf->writeHTML($html);
    // $mpdf->SetFooter('{PAGENO}');
    //
    // $mpdf->Output();
  }

  public function registro($id = null)
  {
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    $this->load->model("clientes_model");
    $this->load->model("perfil_model");

    if ($id != null) {

      $info_cliente = $this->clientes_model->getById($id);
      $titulo = "Cadastro do cliente " . $info_cliente['razao_social'];
    } else {

      $info_cliente = null;
      $titulo = "Novo Cadastro";
    }

    $data["info_cliente"] = $info_cliente;
    $data["perfis"] = $this->perfil_model->getAll();

    $data["titulo"] = $titulo;

    $this->template->controlearquivo("cadastros/clientes_registro_view", $data);
  }

  public function verificaCpfExistente($cpf){
    $this->load->model("pessoa_model");

    if(!empty($this->pessoa_model->getByCpfCnpj($cpf))){
      echo json_encode(array('classe' => 'erro', 'msg' => "CPF já cadastrado"));
      exit();
    }else{
      echo json_encode(array('classe' => 'acerto', 'msg' => "CPF não cadastrado"));
      exit();
    }

  }

  public function verificaCpfExistenteEditar($cpf, $idPessoa){
    $this->load->model("pessoa_model");

    if(!empty($this->pessoa_model->getByCpfCnpj($cpf))){
      if($this->pessoa_model->getByCpfCnpj($cpf)['id_pessoa'] == $idPessoa){
        echo json_encode(array('classe' => 'acerto', 'msg' => "CPF do pescador atual" ));
        exit();
      }else{
        echo json_encode(array('classe' => 'erro', 'msg' => "CPF já cadastrado"));
        exit();
      }
    }else{
      echo json_encode(array('classe' => 'acerto', 'msg' => "CPF não cadastrado"));
      exit();
    }

  }

  public function verificaCarteiraExistente($numeroCarteira){
    $this->load->model("pessoa_model");

    if(!empty($this->pessoa_model->getByCarteira($numeroCarteira))){
      echo json_encode(array('classe' => 'erro', 'msg' => "Matrícula já cadastrada"));
      exit();
    }else{
      echo json_encode(array('classe' => 'acerto', 'msg' => "Matrícula não cadastrado"));
      exit();
    }

  }

  public function verificaCarteiraExistenteEditar($numeroCarteira, $idPessoa){
    $this->load->model("pessoa_model");

    if(!empty($this->pessoa_model->getByCarteira($numeroCarteira))){
      if($this->pessoa_model->getByCarteira($numeroCarteira)['id_pessoa'] == $idPessoa){
        echo json_encode(array('classe' => 'acerto', 'msg' => "Matricula do pescador atual" ));
        exit();
      }else{
        echo json_encode(array('classe' => 'erro', 'msg' => "Matrícula já cadastrada"));
        exit();
      }
    }else{
      echo json_encode(array('classe' => 'acerto', 'msg' => "Matrícula não cadastrado"));
      exit();
    }

  }



  public function verificaLoginExistente($login)
  {
    //Carrega Tabelas
    $this->load->model("cliente_model");

    //Verifica se o Login já existe
    if ($this->cliente_model->verificaLogin($login)) {
      echo json_encode(array('classe' => 'erro', 'msg' => "Login já existente, por favor informe outro."));
      exit();
    }
    echo json_encode(array('classe' => 'acerto'));
  }

  public function verificaEmailExistente()
  {
    $email = $_REQUEST['email'];
    //Carrega Tabelas
    $this->load->model("cliente_model");

    //Verifica se o Email já existe
    if ($this->cliente_model->verificaEmail($email)) {
      echo json_encode(array('classe' => 'erro', 'msg' => "Email já cadastrado, por favor informe outro."));
      exit();
    }
    echo json_encode(array('classe' => 'acerto'));
  }

  public function salvar()
  {
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    //Se for informado o id atualiza, caso contrário insere
    if (!empty($_REQUEST['id_pessoa'])) {
      $this->pessoa_model->update('pessoa', array(
        'nome_pessoa' => $_REQUEST['nome'],
        'apelido' => $_REQUEST['apelido'],
        'data_nascimento' => $this->funcoes->formataDataBanco($_REQUEST['data_nascimento']),
        'estado_civil' => $_REQUEST['estado_civil'],
        'cpf_cnpj' => $_REQUEST['cpf_cnpj'],
        'nome_mae' => $_REQUEST['nome_mae'],
        'nome_pai' => $_REQUEST['nome_pai'],
        'nome_esposa' => $_REQUEST['nome_esposa'],
        'numero_rg' => $_REQUEST['numero_rg'],
        'nacionalidade' => $_REQUEST['nacionalidade'],
        'naturalidade' => $_REQUEST['naturalidade'],
        'reg_nasc_livro' => $_REQUEST['livro_reg_nasc'],
        'reg_nasc_numero' => $_REQUEST['num_reg_nasc'],
        'reg_nasc_folha' => $_REQUEST['folha_reg_nasc'],
        'orgao_expedicao_rg' => $_REQUEST['orgao_expedicao_rg'],
        'data_expedicao_rg' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_rg']),
        'estado_expedicao_rg' => $_REQUEST['estado_expedicao_rg'],
        'num_titulo' => $_REQUEST['num_titulo'],
        'zona_titulo' => $_REQUEST['zona_titulo'],
        'secao_titulo' => $_REQUEST['secao_titulo'],
        'numero_ctps' => $_REQUEST['numero_ctps'],
        'serie_ctps' => $_REQUEST['serie_ctps'],
        'estado_emissao_ctps' => $_REQUEST['estado_emissao_ctps'],
        'num_reservista' => $_REQUEST['num_reservista'],
        'cep' => $_REQUEST['endereco_cep'],
        'id_estado' => $_REQUEST['id_estado'],
        'id_cidade' => $_REQUEST['id_cidade'],
        'endereco_logradouro' => $_REQUEST['endereco_logradouro'],
        'endereco_numero' => $_REQUEST['endereco_numero'],
        'endereco_bairro' => $_REQUEST['endereco_bairro'],
        'endereco_complemento' => $_REQUEST['endereco_complemento'],
        // 'endereco_numero' => $_REQUEST['endereco_numero'],
        'email' => $_REQUEST['email'],
        'grau_estudo' => $_REQUEST['grau_estudo'],
        'alfabetizado' => $_REQUEST['alfabetizado'],
        'telefones' => $_REQUEST['telefones'],
        'nome_filhos' => $_REQUEST['nome_filhos'],
        'vizinhos' => $_REQUEST['vizinhos'],
        'numero_carteira' => $_REQUEST['numero_carteira'],
        'data_filiacao' => $this->funcoes->formataDataBanco($_REQUEST['data_filiacao']),
        'numero_livro_filiacao' => $_REQUEST['numero_livro_filiacao'],
        'numero_folha_filiacao' => $_REQUEST['numero_folha_filiacao'],
        'numero_carteira_sudepe' => $_REQUEST['numero_carteira_sudepe'],
        'data_expedicao_supede' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_sudepe']),
        'numero_seap' => $_REQUEST['numero_seap'],
        'data_expedicao_seap' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_seap']),
        'numero_pis' => $_REQUEST['numero_pis'],
        'data_expedicao_pis' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_pis']),
        'numero_nit' => $_REQUEST['numero_nit'],
        'data_expedicao_nit' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_nit']),
        'numero_cei' => $_REQUEST['numero_cei'],
        'data_expedicao_cei' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_cei']),
        'aposentado' => $_REQUEST['aposentado'],
        'data_aposentadoria' => $this->funcoes->formataDataBanco($_REQUEST['data_aposentadoria']),
        'amador' => $_REQUEST['amador'],
        'numero_capitania_portos' => $_REQUEST['numero_capitania_portos'],
        'data_inscricao_capitania' => $this->funcoes->formataDataBanco($_REQUEST['data_inscricao_capitania']),
        'profissao_atual' => $_REQUEST['profissao_atual'],
        'carteira_mpa' => $_REQUEST['carteira_mpa'],
        'data_expedicao_mpa' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_mpa']),
        'morto' => $_REQUEST['morto'],
        'observacoes' => $_REQUEST['observacoes'],
        'numero_embarcacao' => $_REQUEST['numero_embarcacao'],
        'nome_embarcacao' => $_REQUEST['nome_embarcacao'],
        'nb_aposentadoria' => $_REQUEST['nb_aposentadoria'],
        'tamanho_embarcacao' => $_REQUEST['tamanho_embarcacao'],
        'largura_embarcacao' => $_REQUEST['largura_embarcacao'],
        'carteira_mapa' => $_REQUEST['carteira_mapa'],
        'tipo_pescado' => $_REQUEST['tipo_pescado'],
        'data_mapa' => $this->funcoes->formataDataBanco($_REQUEST['data_mapa']),
        'data_transferencia' => $this->funcoes->formataDataBanco($_REQUEST['data_transferencia']),
        'transferido' => $_REQUEST['transferido'],
        'foto' => $_REQUEST['foto']
      ),'id_pessoa', $_REQUEST['id_pessoa']);

      echo json_encode(array('classe' => 'acerto', 'msg' => "Pessoa atualizada com sucesso!", 'url' => base_url('pessoa/editar') . "/" . $_REQUEST['id_pessoa']));
      exit();

    } else {
      //Verifica se o Processo já existe
      if(!empty($_REQUEST['cpf_cnpj']))
      $verificaPessoaExistente = $this->pessoa_model->getByCpfCnpj($_REQUEST['cpf_cnpj']);

      //Se existir continua o processo
      if(!empty($verificaPessoaExistente))
      {
        echo json_encode(array('classe' => 'acerto', 'msg' => "Pessoa já cadastrada!", 'url' => base_url('pessoa/editar')."/".$verificaPessoaExistente['id_pessoa']));
        exit();
      }

      if(!empty($_REQUEST['numero_carteira'])){
        $verificaCarteiraExistente = $this->pessoa_model->getByCarteira($_REQUEST['numero_carteira']);}
        if(!empty($verificaCarteiraExistente))
        {
          echo json_encode(array('classe' => 'acerto', 'msg' => "Matrícula já cadastrada!", 'url' => base_url('pessoa/editar')."/".$verificaCarteiraExistente['id_pessoa']));
          exit();
        }

        //Pegar último código da pessoa
        $proximoCodInterno = $this->pessoa_model->getByProximoIdInterno();

        //Inserir Novo registro
        $idPessoa = $this->pessoa_model->insert(array(
          'id_pessoa_interno' => $proximoCodInterno,
          'nome_pessoa' => $_REQUEST['nome'],
          'apelido' => $_REQUEST['apelido'],
          'data_nascimento' => $this->funcoes->formataDataBanco($_REQUEST['data_nascimento']),
          'estado_civil' => $_REQUEST['estado_civil'],
          'cpf_cnpj' => $_REQUEST['cpf_cnpj'],
          'nome_mae' => $_REQUEST['nome_mae'],
          'nome_pai' => $_REQUEST['nome_pai'],
          'nome_esposa' => $_REQUEST['nome_esposa'],
          'numero_rg' => $_REQUEST['numero_rg'],
          'nacionalidade' => $_REQUEST['nacionalidade'],
          'naturalidade' => $_REQUEST['naturalidade'],
          'reg_nasc_livro' => $_REQUEST['livro_reg_nasc'],
          'reg_nasc_numero' => $_REQUEST['num_reg_nasc'],
          'reg_nasc_folha' => $_REQUEST['folha_reg_nasc'],
          'orgao_expedicao_rg' => $_REQUEST['orgao_expedicao_rg'],
          'data_expedicao_rg' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_rg']),
          'estado_expedicao_rg' => $_REQUEST['estado_expedicao_rg'],
          'num_titulo' => $_REQUEST['num_titulo'],
          'zona_titulo' => $_REQUEST['zona_titulo'],
          'secao_titulo' => $_REQUEST['secao_titulo'],
          'numero_ctps' => $_REQUEST['numero_ctps'],
          'serie_ctps' => $_REQUEST['serie_ctps'],
          'estado_emissao_ctps' => $_REQUEST['estado_emissao_ctps'],
          'num_reservista' => $_REQUEST['num_reservista'],
          'cep' => $_REQUEST['endereco_cep'],
          'id_estado' => $_REQUEST['id_estado'],
          'id_cidade' => $_REQUEST['id_cidade'],
          'endereco_logradouro' => $_REQUEST['endereco_logradouro'],
          'endereco_numero' => $_REQUEST['endereco_numero'],
          'endereco_bairro' => $_REQUEST['endereco_bairro'],
          'endereco_complemento' => $_REQUEST['endereco_complemento'],
          // 'endereco_numero' => $_REQUEST['endereco_numero'],
          'email' => $_REQUEST['email'],
          'grau_estudo' => $_REQUEST['grau_estudo'],
          'alfabetizado' => $_REQUEST['alfabetizado'],
          'telefones' => $_REQUEST['telefones'],
          'nome_filhos' => $_REQUEST['nome_filhos'],
          'vizinhos' => $_REQUEST['vizinhos'],
          'numero_carteira' => $_REQUEST['numero_carteira'],
          'data_filiacao' => $this->funcoes->formataDataBanco($_REQUEST['data_filiacao']),
          'numero_livro_filiacao' => $_REQUEST['numero_livro_filiacao'],
          'numero_folha_filiacao' => $_REQUEST['numero_folha_filiacao'],
          'numero_carteira_sudepe' => $_REQUEST['numero_carteira_sudepe'],
          'data_expedicao_supede' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_sudepe']),
          'numero_seap' => $_REQUEST['numero_seap'],
          'data_expedicao_seap' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_seap']),
          'numero_pis' => $_REQUEST['numero_pis'],
          'data_expedicao_pis' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_pis']),
          'numero_nit' => $_REQUEST['numero_nit'],
          'data_expedicao_nit' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_nit']),
          'numero_cei' => $_REQUEST['numero_cei'],
          'data_expedicao_cei' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_cei']),
          'aposentado' => $_REQUEST['aposentado'],
          'data_aposentadoria' => $this->funcoes->formataDataBanco($_REQUEST['data_aposentadoria']),
          'amador' => $_REQUEST['amador'],
          'numero_capitania_portos' => $_REQUEST['numero_capitania_portos'],
          'data_inscricao_capitania' => $this->funcoes->formataDataBanco($_REQUEST['data_inscricao_capitania']),
          'profissao_atual' => $_REQUEST['profissao_atual'],
          'carteira_mpa' => $_REQUEST['carteira_mpa'],
          'data_expedicao_mpa' => $this->funcoes->formataDataBanco($_REQUEST['data_expedicao_mpa']),
          'morto' => $_REQUEST['morto'],
          'observacoes' => $_REQUEST['observacoes'],
          'numero_embarcacao' => $_REQUEST['numero_embarcacao'],
          'nome_embarcacao' => $_REQUEST['nome_embarcacao'],
          'tamanho_embarcacao' => $_REQUEST['tamanho_embarcacao'],
          'largura_embarcacao' => $_REQUEST['largura_embarcacao'],
          'colonia_id' => $this->session->userdata('colonia_id'),
          'nb_aposentadoria' => $_REQUEST['nb_aposentadoria'],
          'usuario_id' => $this->session->userdata("id_usuario"),
          'carteira_mapa' => $_REQUEST['carteira_mapa'],
          'data_mapa' => $this->funcoes->formataDataBanco($_REQUEST['data_mapa']),
          'tipo_pescado' => $_REQUEST['tipo_pescado'],
          'data_transferencia' => '0000-00-00',
          'transferido' => 'Nao',
          'data_cadastro' => date('Y-m-d H:i:s'),
          'foto' => $_REQUEST['foto']
        ));



        echo json_encode(array('classe' => 'acerto', 'msg' => "Pessoa cadastrada com sucesso!", 'url' => base_url('pessoa/listar')));
        exit();


      }
    }

    public function geraNumero($tamanho){
      $ranStr = md5(microtime());
      return substr($ranStr, 0, $tamanho);
    }

    public function ajax()
    {
      if('listar' == $_REQUEST['acao'])
      {
        //Carrega Tabelas
        $this->load->model("pessoa_model");

        echo json_encode($this->pessoa_model->getAll(array(
          array(
            'campo_1' => 'nome_pessoa',
            'operador' => 'AJAXCLIENTE',
            'valor_1' => $_REQUEST['term'],
            'campo_2' => 'cpf_cnpj',
            'valor_2' => $_REQUEST['term']
          ),
          array(
            'campo' => 'c.id_colonia',
            'operador' => '=',
            'valor' => $this->session->userdata("colonia_id")
          )
          )
        ));
      }
    }



    function tirarAcentos($string)
    {
      $novoString = strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");

      return $novoString;
    }


    public function limparString($string)
    {
      $converte = array('á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'é' => 'e',
      'ê' => 'e', 'í' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', "ö" => "o",
      'ú' => 'u', 'ü' => 'u', 'ç' => 'c', 'ñ' => 'n', 'Á' => 'A', 'À' => 'A', 'Ã' => 'A',
      'Â' => 'A', 'É' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Ï' => 'I', "Ö" => "O", 'Ó' => 'O',
      'Ô' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ü' => 'U', 'Ç' => 'C', 'N' => 'N');

      return str_replace(" ", "", strtr(($string), $converte));
      // ANTES return str_replace(" ","",strtr(utf8_encode($string), $converte));

    }

    public function desconnectar()
    {
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");


      //Carrega Tabelas
      $this->load->model("cliente_model");
      $this->load->model("revenda_model");

      //Dados da Revenda
      $filtros[] = array(
        'campo' => "r.id_revenda",
        'operador' => null,
        'valor' => $_REQUEST['id_revenda']
      );
      $filtros[] = array(
        'campo' => "rp.id_profile",
        'operador' => null,
        'valor' => $_REQUEST['id_profile']
      );
      $dadosRevenda = $this->revenda_model->getAll($filtros);

      if (!empty($dadosRevenda)) {
        simplexml_load_file("http://" . $dadosRevenda[0]['usuarioadm'] . ":" . $dadosRevenda[0]['senhaadm'] . "@" . $dadosRevenda[0]['url'] . ":" . $dadosRevenda[0]['portacsp'] . "/xmlHandler?command=kick-user&name=" . $_REQUEST['csplogin']);

        echo json_encode(array('classe' => 'acerto', 'msg' => "Login " . $_REQUEST['csplogin'] . " desconnectado com sucesso!", 'url' => base_url('cliente/listar_onlines')));
        exit();
      } else {
        echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao desconnectar login " . $_REQUEST['csplogin'] . "!", 'url' => base_url('cliente/listar_onlines')));
        exit();
      }
    }


    public function limparCache()
    {
      $idRevenda = $this->session->userdata("id_revenda");

      //Se o servidor for local usa o memcache especifico
      if ('localhost' == $_SERVER['HTTP_HOST']) {
        //echo "ENTROU LOCALHOST";
        // Load library
        $this->load->library('Memcached_library');
        $resultsRevenda = $this->memcached_library->get(diretorio_sistema() . '/listar_revendas' . $idRevenda);
        $resultsClientes = $this->memcached_library->get(diretorio_sistema() . '/listar_clientes' . $idRevenda);

        // Se existir cache Revendas, deleta os dados
        if (!empty($resultsRevenda)) {
          // Deleta Cache
          $this->memcached_library->delete(diretorio_sistema() . '/listar_revendas' . $idRevenda);
        }

        // Se não existir cache Clientes, carrega com os dados da busca.
        if (!empty($resultsClientes)) {
          // Deleta Cache
          $this->memcached_library->delete(diretorio_sistema() . '/listar_clientes' . $idRevenda);
        }
      } else {
        //echo "ENTROU SERVIDOR";
        $meminstance = new Memcache();
        $meminstance->connect('localhost', 11211);

        $resultClientes = $meminstance->get(diretorio_sistema() . '/listar_clientes' . $idRevenda);
        $resultRevendas = $meminstance->get(diretorio_sistema() . '/listar_revendas' . $idRevenda);
        if (!empty($resultClientes)) {
          // Deleta Cache
          $meminstance->delete(diretorio_sistema() . '/listar_clientes' . $idRevenda);
        }
        if (!empty($resultRevendas)) {
          // Deleta Cache
          $meminstance->delete(diretorio_sistema() . '/listar_revendas' . $idRevenda);
        }
      }
    }


    public function excluir($idPessoa)
    {
      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      $this->pessoa_model->delete($idPessoa);
      echo json_encode(array('classe' => 'acerto', 'msg' => "Pessoa excluída com sucesso!", 'url' => base_url('pessoa/listar')));
      exit();
    }

    public function excluirMassa()
    {

      //Verificação da Sessão de Login
      $this->load->library("autenticacao");

      //Limpar Cache
      $this->limparCache();

      //Carrega Tabelas
      $this->load->model("cliente_model");
      foreach ($_REQUEST['checkeds'] as $idCliente) {
        $this->cliente_model->delete($idCliente);
      }
      echo json_encode(array('classe' => 'acerto', 'msg' => "Clientes selecionados excluído com sucesso!", 'url' => base_url('cliente/busca_detalhada')));
      exit();
    }

    public function upload_foto() {
      $this->load->model("pessoa_model");

      if ($img = $this->pessoa_model->uploadFoto('uploadfoto')) {
        echo $img;
      } else {
        echo 'false';
      }
    }

    public function realizar_pagamento()
    {
      //Verificação da Sessão de Login
      $this->load->library("AutenticacaoCliente");

      //Carrega Tabelas
      $this->load->model("cliente_model");
      $this->load->model("plano_model");
      $this->load->model("profile_model");

      $comprovante = '';
      $situacaoPagamento = 'Aberto';

      //Se o comprovante for enviado
      if (isset($_FILES['comprovante']) && !empty($_FILES['comprovante']['name'])) {
        $novoNome = md5($_FILES['file']['name'] . date('Y-m-d')) . ".jpg";
        $caminho = "uploads/clientes/comprovantes/";
        move_uploaded_file($_FILES['comprovante']['tmp_name'], $caminho . $novoNome);
        $comprovante = $caminho . $novoNome;
        $situacaoPagamento = 'Aguardando Compensação';
      }

      $dadosPlano = $this->plano_model->getById($_REQUEST['plano']);

      //Dados do Login
      $dadosLogin = $this->cliente_model->getByIdLogin($this->session->userdata("id_login"));

      $dadosProfile = $this->profile_model->getById($dadosLogin['id_profile']);

      $area_cliente = $this->input->post('area_cliente', TRUE); // so multiplica na area do admin

      //Se o profile for multiplo, multiplica pelo numero de vezes o valor do plano
      if ((empty($area_cliente) || $area_cliente != 'S') && !empty($dadosProfile['quantidade_multipla'])) {
        echo $dadosPlano['valor_plano'] = ($dadosPlano['valor_plano'] * $dadosProfile['quantidade_multipla']);
      }

      //Grava histórico Pagamento
      $historico = $this->cliente_model->insertHistoricoPagamentoLogin(array('id_login' => $this->session->userdata("id_login"),
      'tipo_pagamento' => $_REQUEST['tipo'],
      'referencia' => $_REQUEST['tipo'],
      'vencimento' => $_REQUEST['vencimento'],
      'valor' => $dadosPlano['valor_plano'],
      'id_plano_escolhido' => $_REQUEST['plano'],
      'dias_plano' => $dadosPlano['quantidade_dias'],
      'situacao_pagamento' => $situacaoPagamento,
      'comprovante' => $comprovante
      )
    );

    //Verifica o Método de Pagamento
    if (!empty($_REQUEST['tipo']) && 'PagSeguro' == $_REQUEST['tipo']) {
      //Efetua Pagamento no PagSeguro
      $this->efetuar_pagamento_plano(array('plano' => $_REQUEST['plano'],
      'codigoHistorico' => $historico)
    );

  } elseif (!empty($_REQUEST['tipo']) && 'MercadoPago' == $_REQUEST['tipo']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once(APPPATH . 'controllers/mercadopago_api.php');
    $mercado_pago = new Mercadopago_api();

    //Efetua Pagamento no Mercado Pago
    $mercado_pago->index(array('id_revenda' => $dadosLogin['id_revenda'],'plano' => $_REQUEST['plano'],
    'codigoHistorico' => $historico)
  );

} elseif (!empty($_REQUEST['tipo']) && 'Depósito Bancário' == $_REQUEST['tipo']) {
  //Verifica se foi inserido
  if (!empty($historico)) {
    echo json_encode(array('classe' => 'acerto', 'tipo' => $_REQUEST['tipo'], 'msg' => "Confirmação realizada com sucesso!", 'url' => base_url('painel_cliente')));
    exit();
  } else {
    echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao Confirmar Pagamento!", 'url' => base_url('painel_cliente')));
    exit();
  }
}


}


public function upload_comprovante()
{

  //Verificação da Sessão de Login
  $this->load->library("autenticacao");


  $this->load->model("cliente_model");

  if ($img = $this->cliente_model->uploadComprovante('uploadfoto')) {
    echo $img;
  } else {
    echo 'false';
  }
}


public function pagamento_avulso()
{
  //Verificação da Sessão de Login
  $this->load->library("autenticacao");

  //Limpar Cache
  $this->limparCache();

  //Carrega Tabelas
  $this->load->model("cliente_model");
  $this->load->model("plano_model");
  $this->load->model("profile_model");

  $comprovante = '';

  //Se o comprovante for enviado
  if (isset($_FILES['comprovante']) && !empty($_FILES['comprovante']['name'])) {
    $novoNome = md5($_FILES['file']['name'] . date('Y-m-d')) . ".jpg";
    $caminho = "uploads/clientes/comprovantes/";
    move_uploaded_file($_FILES['comprovante']['tmp_name'], $caminho . $novoNome);
    $comprovante = $caminho . $novoNome;
  }

  $dadosPlano = $this->plano_model->getById($_REQUEST['plano']);

  //Dados do Login
  $dadosLogin = $this->cliente_model->getByIdLogin($_REQUEST['id_login']);

  $dadosProfile = $this->profile_model->getById($dadosLogin['id_profile']);

  //Se o profile for multiplo, multiplica pelo numero de vezes o valor do plano
  if (!empty($dadosProfile['quantidade_multipla']))
  $dadosPlano['valor_plano'] = $dadosPlano['valor_plano'] * $dadosProfile['quantidade_multipla'];


  //Validade
  $validade = explode(" ", $dadosLogin['validade']);


  //Data da Validade
  $data = explode('/', $_REQUEST['data_pagamento']);
  //Formatar Data
  $dataPagamento = new DateTime();
  $dataPagamento->setDate($data[2], $data[1], $data[0]);
  $dataPagamento = $dataPagamento->format("Y-m-d");

  //Grava histórico Pagamento
  $historico = $this->cliente_model->insertHistoricoPagamentoLogin(array('id_login' => $_REQUEST['id_login'],
  'tipo_pagamento' => $_REQUEST['tipo'],
  'referencia' => $_REQUEST['referencia'],
  'vencimento' => $validade[0],
  'valor' => $dadosPlano['valor_plano'],
  'id_plano_escolhido' => $_REQUEST['plano'],
  'dias_plano' => $dadosPlano['quantidade_dias'],
  'data_pagamento' => $dataPagamento,
  'situacao_pagamento' => $_REQUEST['situacao_pagamento'],
  'comprovante' => $comprovante
)
);

//Se caso foi pago
if ('Pago' == $_REQUEST['situacao_pagamento']) {

  //Se a data de pagamento for maior que a data de vencimento
  $dataValidade = explode(" ", $dadosLogin['validade']);

  //Data da Validade
  $data = explode('/', $_REQUEST['data_pagamento']);
  //Formatar Data
  $dataPagamento = new DateTime();
  $dataPagamento->setDate($data[2], $data[1], $data[0]);
  $dataPagamento = $dataPagamento->format("Y-m-d");

  if ($dataPagamento > $dataValidade[0]) {
    $novaDataVencimento = new DateTime($dataPagamento);
    $novaDataVencimento->modify("+" . $dadosPlano['quantidade_dias'] . " day");
    $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
  } else {
    $novaDataVencimento = new DateTime($dataValidade[0]);
    $novaDataVencimento->modify("+" . $dadosPlano['quantidade_dias'] . " day");
    $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
  }

  $this->cliente_model->updateLogin($_REQUEST['id_login'], array(
    'validade' => $novaDataVencimento . " " . date('H:i:s'),
    'situacao_login' => 'Ativo',
    'situacao_login_anterior' => 'Ativo',
    'id_plano' => $_REQUEST['plano'])
  );
}

//Verifica se foi inserido
if (!empty($historico)) {
  echo json_encode(array('classe' => 'acerto', 'tipo' => $_REQUEST['tipo'], 'msg' => "Pagamento realizado com sucesso!", 'url' => base_url('cliente/listar')));
  exit();
} else {
  echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao Cadastrar Pagamento!", 'url' => base_url('cliente/listar')));
  exit();
}
}

public function consultar_transacao_pagseguro()
{
  $servidor = "https://ws.pagseguro.uol.com.br/v2/transactions/C3EDDCA5838368D114589FBACA1AC6FE?email=suporte@lojamodelo.com.br&token=95112EE828D94278BD394E91C4388F20";


  // Parametros da requisição
  $content = http_build_query(array(
    'txtXML' => $_POST['txtXML']
  ));

  $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Connection: close\r\n" .
      "Content-type: application/x-www-form-urlencoded\r\n" .
      "Content-Length: " . strlen($content) . "\r\n",
      'content' => $content
    )
  ));
  // Realize comunicação com o servidor
  $contents = file_get_contents($servidor, null, $context);
  $resposta = json_decode($contents);  //Parser da resposta Json
  print_r($resposta);
}

/**
* retornoPagamentoPagseguro
*
* Recebe o retorno de pagamento da promoção via pagseguro
* @access public
* @return void
*/
public function retornoPagamento()
{

}

public function retorno_pagamento_pagseguro()
{
  $idLogin = $this->session->userdata("id_login");

  print_r($_REQUEST);
  $this->urlCallback = base_url('payment/callback');

  $this->load->config('pagseguro');
  $this->load->library('pagsegurolibrary/pagseguro', 'pagseguro');


  $urlCallback = $this->urlCallback;

  print_r($urlCallback);

  $retorno = base_url('payment/getTransaction/' . $this->urlCallback);
  //F37B5606-C0BF-41CF-B587-ECBE3B1B8419

  // VC PODE COLOCAR A URL QUE VC DESEJA ENVIAR O USUARIO APOS CONCLUIR A COMPRA
  //redirect ( base_url() );
  exit();

  //Se for informado o código da Transação
  if (!empty($_REQUEST['transaction_id']) && $idLogin) {
    //Grava dados PagSeguro
    $historico = $this->cliente_model->insertHistoricoPagamentoLogin(array('id_login' => $this->session->userdata("id_login"),
    'tipo_pagamento' => $_REQUEST['tipo'],
    'referencia' => '' != $_REQUEST['referencia'] ? $_REQUEST['referencia'] : '',
    'vencimento' => $_REQUEST['vencimento'],
    'valor' => $dadosPlano['valor_plano'],
    'dias_plano' => $dadosPlano['quantidade_dias'],
    'situacao_pagamento' => $situacaoPagamento,
    'comprovante' => $comprovante
    )
  );
}


}

private function efetuar_pagamento_plano($dados)
{
  //Verificação da Sessão de Login
  // $this->load->library( "autenticacao" );

  //Carrega Tabelas
  $this->load->model("cliente_model");
  $this->load->model("plano_model");

  //Buscar dados do Login/Cliente
  $dadosLogin = $this->cliente_model->getByIdLogin($this->session->userdata("id_login"));

  $this->urlCallback = base_url('payment/callback?id_revenda=' . $dadosLogin['id_revenda']);
  $this->session->set_userdata(array('id_revenda_pagamento' => $dadosLogin['id_revenda']));
  $this->load->config('pagseguro');
  $this->load->library('pagsegurolibrary/pagseguro', 'pagseguro');

  /* Página de Retorno */
  extract($dados);

  $urlCallback = $this->urlCallback;


  $dadosPlano = $this->plano_model->getById($dados['plano']);

  /* Dados Compra */
  $items = array();

  $valorPlano = str_replace(",", ".", str_replace(".", "", $this->funcoes->formataMoedaFloat($dadosPlano['valor_plano'] / 100)));
  $items[] = array(
    'description' => $dadosPlano['nome_plano'],
    'amount' => $valorPlano,
    'quantity' => 1
  );

  $customerTest = pagseguro::getPurchaserTest();

  /* Dados Cliente */
  $customer = array();
  $customer['client_name'] = $dadosLogin['nome_cliente'];
  $customer['client_email'] = $dadosLogin['email_cliente'];
  $customer['client_ddd'] = "";
  $customer['client_phone'] = "";

  /* Dados Frete */
  $shipping = array();

  $shipping['frete'] = 3;
  $shipping['cep'] = "";
  $shipping['rua'] = '';
  $shipping['numero'] = '';
  $shipping['complemento'] = '';
  $shipping['bairro'] = '';
  $shipping['cidade'] = '';
  $shipping['estado'] = '';
  $shipping['pais'] = '';

  /* Referência (ID da Compra)*/
  $reference = $dados['codigoHistorico'];

  /* Gera URL da Pagamento */
  $paymentURL = $this->pagseguro->requestPayment($items, false, $reference, false, $urlCallback);

  /* Redireciona para o PagSeguro */
  if ($paymentURL) {
    echo json_encode(array('tipo' => 'PagSeguro', 'url' => $paymentURL));
    exit();
  } else {
    echo json_encode(array('classe' => 'erro', 'msg' => 'Erro ao redirecionar para o PAGSEGURO. Parâmetros incorretos.'));
    exit();
  }
}


}

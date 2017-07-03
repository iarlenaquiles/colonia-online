<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class permissoes extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    // Your own constructor code
    //Carrega Tabelas
    if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
      redirect('login');
    }

    if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vPermissoes')){
      $this->session->set_flashdata('error','Você não tem as permissões no sistema.');
      redirect(base_url());
    }

    $this->load->library("autenticacao");
    $this->load->model("permissoes_model");

  }

  public function editar($id){
    //Verificação da Sessão de Login

    if(!$this->permission->checkPermission($this->session->userdata('permissao'), 'vPermissoes')){
      $this->session->set_flashdata('error','Você não tem permissão para visualizar permissoes.');
    }
    $this->load->library("autenticacao");

    $data['registro'] = $this->permissoes_model->getById($id);
    $this->template->controlearquivo("permissoes/editar", $data);
  }

  public function excluir($idPermissao)
  {

    if(!$this->permission->checkPermission($this->session->userdata('permissao'), 'dPermissoes')){
      $this->session->set_flashdata('error','Você não tem permissão para deletar pescadores.');
    }
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    $this->permissoes_model->delete($idPermissao);
    echo json_encode(array('classe' => 'acerto', 'msg' => "Permissão excluída com sucesso!", 'url' => base_url('permissoes/listar')));
    exit();
  }


  public function listar()
  {
    if(!$this->permission->checkPermission($this->session->userdata('permissao'), 'vPermissoes')){
      $this->session->set_flashdata('error','Você não tem permissão para visualizar permissoes.');
    }
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    //Retorno registros
    $data["registros"] = $this->permissoes_model->getAll($filtros);

    $this->template->controlearquivo("permissoes/listar", $data);
  }

  public function cadastrar(){

    if(!$this->permission->checkPermission($this->session->userdata('permissao'), 'aPermissoes')){
      $this->session->set_flashdata('error','Você não tem permissão para adicionar permissoes.');
    }
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");

    $data = array();

    $this->template->controlearquivo("permissoes/cadastrar", $data);
  }



  public function salvar(){
    //Verificação da Sessão de Login
    $this->load->library("autenticacao");
    if(!empty($_REQUEST['idPermissao'])){
      $permissoes = array(

        'aColonia' => $this->input->post('aColonia'),
        'eColonia' => $this->input->post('eColonia'),
        'dColonia' => $this->input->post('dColonia'),
        'vColonia' => $this->input->post('vColonia'),

        'aColonias' => $this->input->post('aColonias'),
        'eColonias' => $this->input->post('eColonias'),
        'dColonias' => $this->input->post('dColonias'),
        'vColonias' => $this->input->post('vColonias'),

        'aPescador' => $this->input->post('aPescador'),
        'ePescador' => $this->input->post('ePescador'),
        'dPescador' => $this->input->post('dPescador'),
        'vPescador' => $this->input->post('vPescador'),


        'aPescadores' => $this->input->post('aPescadores'),
        'ePescadores' => $this->input->post('ePescadores'),
        'dPescadores' => $this->input->post('dPescadores'),
        'vPescadores' => $this->input->post('vPescadores'),

        'aAgendamento' => $this->input->post('aAgendamento'),
        'eAgendamento' => $this->input->post('eAgendamento'),
        'dAgendamento' => $this->input->post('dAgendamento'),
        'vAgendamento' => $this->input->post('vAgendamento'),

        'aAtendimento' => $this->input->post('aAtendimento'),
        'eAtendimento' => $this->input->post('eAtendimento'),
        'dAtendimento' => $this->input->post('dAtendimento'),
        'vAtendimento' => $this->input->post('vAtendimento'),

        'vAtendimentos' => $this->input->post('vAtendimentos'),

        'vRelatorio' => $this->input->post('vRelatorio'),
        'vGerados' => $this->input->post('vGerados'),
        'vAniversariantes' => $this->input->post('vAniversariantes'),
        'vGeral' => $this->input->post('vGeral'),
        'vLivro' => $this->input->post('vLivro'),
        'vImpostoSindical' => $this->input->post('vImpostoSindical'),
        'vBotaoDownload' => $this->input->post('vBotaoDownload'),

        'aLink' => $this->input->post('aLink'),
        'eLink' => $this->input->post('eLink'),
        'dLink' => $this->input->post('dLink'),
        'vLink' => $this->input->post('vLink'),

        'aPermissoes' => $this->input->post('aPermissoes'),
        'ePermissoes' => $this->input->post('ePermissoes'),
        'dPermissoes' => $this->input->post('dPermissoes'),
        'vPermissoes' => $this->input->post('vPermissoes'),

        'aPagamento' => $this->input->post('aPagamento'),
        'ePagamento' => $this->input->post('ePagamento'),
        'dPagamento' => $this->input->post('dPagamento'),
        'vPagamento' => $this->input->post('vPagamento'),

        'aUsuarios' => $this->input->post('aUsuarios'),
        'eUsuarios' => $this->input->post('eUsuarios'),
        'dUsuarios' => $this->input->post('dUsuarios'),
        'vUsuarios' => $this->input->post('vUsuarios'),
      );
      $permissoes = serialize($permissoes);

      $this->permissoes_model->update('permissoes', array(
        'nome' => $_REQUEST['nome'],
        'situacao' => $_REQUEST['situacao'],
        'permissoes' => $permissoes

      ),'idPermissao', $_REQUEST['idPermissao']);

      echo json_encode(array('classe' => 'acerto', 'msg' => "Permissão atualizada com sucesso!", 'url' => base_url('permissoes/editar') . "/" . $_REQUEST['idPermissao']));
      exit();
    }else{

      $permissoes = array(

        'aColonia' => $this->input->post('aColonia'),
        'eColonia' => $this->input->post('eColonia'),
        'dColonia' => $this->input->post('dColonia'),
        'vColonia' => $this->input->post('vColonia'),

        'aColonias' => $this->input->post('aColonias'),
        'eColonias' => $this->input->post('eColonias'),
        'dColonias' => $this->input->post('dColonias'),
        'vColonias' => $this->input->post('vColonias'),

        'aPescador' => $this->input->post('aPescador'),
        'ePescador' => $this->input->post('ePescador'),
        'dPescador' => $this->input->post('dPescador'),
        'vPescador' => $this->input->post('vPescador'),

        'aPescadores' => $this->input->post('aPescadores'),
        'ePescadores' => $this->input->post('ePescadores'),
        'dPescadores' => $this->input->post('dPescadores'),
        'vPescadores' => $this->input->post('vPescadores'),

        'aAgendamento' => $this->input->post('aAgendamento'),
        'eAgendamento' => $this->input->post('eAgendamento'),
        'dAgendamento' => $this->input->post('dAgendamento'),
        'vAgendamento' => $this->input->post('vAgendamento'),

        'aAtendimento' => $this->input->post('aAtendimento'),
        'eAtendimento' => $this->input->post('eAtendimento'),
        'dAtendimento' => $this->input->post('dAtendimento'),
        'vAtendimento' => $this->input->post('vAtendimento'),
        'vAtendimentos' => $this->input->post('vAtendimentos'),

        'vRelatorio' => $this->input->post('vRelatorio'),
        'vGerados' => $this->input->post('vGerados'),
        'vAniversariantes' => $this->input->post('vAniversariantes'),
        'vGeral' => $this->input->post('vGeral'),
        'vLivro' => $this->input->post('vLivro'),
        'vImpostoSindical' => $this->input->post('vImpostoSindical'),
        'vBotaoDownload' => $this->input->post('vBotaoDownload'),

        'aLink' => $this->input->post('aLink'),
        'eLink' => $this->input->post('eLink'),
        'dLink' => $this->input->post('dLink'),
        'vLink' => $this->input->post('vLink'),

        'aPermissoes' => $this->input->post('aPermissoes'),
        'ePermissoes' => $this->input->post('ePermissoes'),
        'dPermissoes' => $this->input->post('dPermissoes'),
        'vPermissoes' => $this->input->post('vPermissoes'),

        'aPagamento' => $this->input->post('aPagamento'),
        'ePagamento' => $this->input->post('ePagamento'),
        'dPagamento' => $this->input->post('dPagamento'),
        'vPagamento' => $this->input->post('vPagamento'),

        'aUsuarios' => $this->input->post('aUsuarios'),
        'eUsuarios' => $this->input->post('eUsuarios'),
        'dUsuarios' => $this->input->post('dUsuarios'),
        'vUsuarios' => $this->input->post('vUsuarios'),
      );
      $permissoes = serialize($permissoes);


      //Inserir Novo registro
      $idPermissao = $this->permissoes_model->insert(array(
        'nome' => $_REQUEST['nome'],
        'data_cadastro' => date('Y-m-d H:i:s'),
        'situacao' => 1,
        'permissoes' => $permissoes

      ));



      echo json_encode(array('classe' => 'acerto', 'msg' => "Permissões cadastradas com sucesso!", 'url' => base_url('permissoes/listar')));
      exit();

    }
  }
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class tipo_relatorio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code

  }

    public function salvar()
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        //Carrega Tabelas
        $this->load->model("tipo_relatorio_model");

              $idRelatorio = $this->tipo_relatorio_model->insert(array(
                  'tipo_relatorio' => $_REQUEST['tipo_relatorio'],
                  'id_pessoa' => $_REQUEST['id_pessoa'],
                  'id_usuario_cadastro' => $this->session->userdata("id_usuario"),
                  'data_cadastro' => date('Y-m-d H:i:s'))
              ));



                  echo json_encode(array('classe' => 'acerto', 'msg' => "Relatório gerado com sucesso!", 'url' => base_url('agendamento/listar')));
                  exit();

    }
}

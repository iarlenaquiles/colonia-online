<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class acao extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code


    }

    public function ajax()
    {
        if('listar' == $_REQUEST['acao'])
        {
            //Carrega Tabelas
            $this->load->model("acao_model");

            echo json_encode($this->acao_model->getAll(array(
                    array(
                        'campo' => 'ativo',
                        'valor'=> 1
                    ),
                    array(
                        'campo' => 'nome_acao',
                        'operador' => 'LIKE',
                        'valor' => $_REQUEST['term']
                    ),
                    array(
                        'campo' => 'uv.id_usuario_principal',
                        'operador' => '=',
                        'valor' => $this->session->userdata("id_usuario_principal")
                    )
                )
            ));
        }
    }

    public function salvar()
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        //Carrega Tabelas
        $this->load->model("acao_model");


        //Se for informado o id atualiza, caso contrário insere
        if (!empty($_REQUEST['id'])) {
        } else {

            //Inserir Novo registro
            $idAcao = $this->acao_model->insert(array(
                    'nome_acao' => $_REQUEST['nome_acao'],
                    'data_cadastro' => date('Y-m-d H:i:s'))
            );

            echo json_encode(array('id_acao'=> $idAcao, 'nome_acao'=> $_REQUEST['nome_acao'], 'data_cadastro' => date('Y-m-d H:i:s'),'classe' => 'acerto', 'msg' => "Ação cadastrada com sucesso!", 'url' => base_url('acao/listar')));
            exit();
        }
    }
}

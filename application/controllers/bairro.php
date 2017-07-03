<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class bairro extends CI_Controller
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
            $this->load->model("bairro_model");

            echo json_encode($this->bairro_model->getAll(array(
                    array(
                        'campo' => 'ativo',
                        'valor'=> 1
                    ),
                    array(
                        'campo' => 'nome_bairro',
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
        $this->load->model("bairro_model");


        //Se for informado o id atualiza, caso contrário insere
        if (!empty($_REQUEST['id_bairro'])) {
        } else {

            //Inserir Novo registro
            $idBairro = $this->bairro_model->insert(array(
                    'nome_bairro' => $_REQUEST['endereco_bairro'],
                    'ativo' => 1,
                    'data_cadastro' => date('Y-m-d H:i:s'))
            );

            echo json_encode(array('id_bairro'=> $idBairro, 'nome_bairro'=> $_REQUEST['endereco_bairro'], 'data_cadastro' => date('Y-m-d H:i:s'),'classe' => 'acerto', 'msg' => "Bairro cadastrado com sucesso!", 'url' => base_url('bairro/listar')));
            exit();
        }
    }
}

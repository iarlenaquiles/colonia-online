<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class federacao extends CI_Controller
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
            $this->load->model("federacao_model");

            echo json_encode($this->federacao_model->getAll(array(
                    array(
                        'campo' => 'nome_federacao',
                        'operador' => 'LIKE',
                        'valor' => $_REQUEST['term']
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
        $this->load->model("federacao_model");


        //Se for informado o id atualiza, caso contrário insere
        if (!empty($_REQUEST['id_federacao'])) {
        } else {

            //Inserir Novo registro
            $idFederacao = $this->federacao_model->insert(array(
                    'nome_federacao' => $_REQUEST['nome_federacao'],
                    'sigla_federacao' => $_REQUEST['sigla_federacao'],
                    'foto' => $_REQUEST['foto_federacao'],
                    'data_cadastro' => date('Y-m-d H:i:s'))
            );

            echo json_encode(array('id_federacao'=> $idFederacao, 'nome_federacao'=> $_REQUEST['nome_federacao'], 'data_cadastro' => date('Y-m-d H:i:s'),'classe' => 'acerto', 'msg' => "Federação cadastrada com sucesso!", 'url' => base_url('bairro/listar')));
            exit();
        }
    }
}

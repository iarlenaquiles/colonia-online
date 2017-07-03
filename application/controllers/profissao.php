<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class profissao extends CI_Controller
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
            $this->load->model("profissao_model");

            echo json_encode($this->profissao_model->getAll(array(
                    array(
                        'campo' => 'nome_profissao',
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
        $this->load->model("profissao_model");


        //Se for informado o id atualiza, caso contrário insere
        if (!empty($_REQUEST['id_profissao'])) {
        } else {

            //Inserir Novo registro
            $idProfissao = $this->profissao_model->insert(array(
                    'nome_profissao' => $_REQUEST['nome_profissao'],
                    'data_cadastro' => date('Y-m-d H:i:s'))
            );

            echo json_encode(array('id_profissao'=> $idProfissao, 'nome_profissao'=> $_REQUEST['nome_profissao'], 'data_cadastro' => date('Y-m-d H:i:s'),'classe' => 'acerto', 'msg' => "Profissão cadastrada com sucesso!", 'url' => base_url('bairro/listar')));
            exit();
        }
    }
}

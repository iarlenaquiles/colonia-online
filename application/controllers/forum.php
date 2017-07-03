<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class forum extends CI_Controller
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
            $this->load->model("forum_model");

            echo json_encode($this->forum_model->getAll(array(
                    array(
                        'campo' => 'ativo',
                        'valor'=> 1
                    ),
                    array(
                        'campo' => 'nome_forum',
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
        $this->load->model("forum_model");


        //Se for informado o id atualiza, caso contrário insere
        if (!empty($_REQUEST['id'])) {
            //Busca dados do Cliente antes de editar
            $dadosCliente = $this->cliente_model->getById($_REQUEST['id']);

            //Não deixa atualizar caso a nova data não seja informada.
            //Se o CLiente for
            if (empty($dadosCliente['bln_renovou_data_teste']) && ($dadosCliente['tipo'] != $_REQUEST['tipo']) && ('Teste' == $dadosCliente['tipo'])) {
                echo json_encode(array('classe' => 'info', 'msg' => "Por favor, renove a data do login antes de migra-lo para Cliente.", 'url' => base_url('cliente/listar')));
                exit();
            }

            //Atualiza registro
            $idCliente = $this->cliente_model->update($_REQUEST['id'], array(
                    'nome' => $_REQUEST['nome'],
                    'email' => $_REQUEST['email'],
                    'situacao' => $_REQUEST['situacao'],
                    'situacao_anterior' => $_REQUEST['situacao'],
                    'observacao' => $_REQUEST['observacao'],
                    'tipo' => $_REQUEST['tipo'])
            );

            //Se a nova situação for diferente do banco, altera os status dos logins
            if ($_REQUEST['situacao'] != $dadosCliente['situacao_cliente']) {

                //Buscar todos Logins para possível alteração de situação
                $logins = $this->cliente_model->buscarLogins(array(array(
                        'campo' => "l.id_cliente",
                        'operador' => null,
                        'valor' => $_REQUEST['id']
                    )
                    )
                );

                //Percorre todos Logins
                foreach ($logins as $login) {
                    //Se a situação for Inativa, inativa todos logins
                    if ('Inativo' == $_REQUEST['situacao']) {
                        $this->cliente_model->updateLogin($login['id_login'], array('situacao_login' => $_REQUEST['situacao']));
                    } else if ('Ativo' == $_REQUEST['situacao']) {
                        //Atualiza todos logins para a situação anterior
                        $this->cliente_model->updateLogin($login['id_login'], array('situacao_login' => $login['situacao_login_anterior']));
                    }

                }
            }

            //Se o CLiente for
            if (($dadosCliente['tipo'] != $_REQUEST['tipo']) && ('Cliente' == $_REQUEST['tipo'])) {

                //Buscar parametros da Revenda
                $parametrosRevenda = $this->revenda_model->getParametrosRevenda($dadosCliente['id_revenda']);

                //Verifica se opção de enviar email esta ativado
                if (!empty($parametrosRevenda['mensagem_email_alteracao_situacao_cliente_bln'])) {
                    //Buscar dados da Revenda do Cliente
                    $dadosRevenda = $this->revenda_model->getById($dadosCliente['id_revenda']);

                    //Dados do Profile
                    $dadosProfile = $this->profile_model->getById($dadosCliente['id_profile']);

                    //Trocar comandos por variaveis
                    $comandos = array('[NOME]', '[EMAIL]', '[LOGIN]', '[SENHA]', '[OPERADORA]', '[URL]', '[PORTA]');
                    $variavel = array('' . $dadosCliente['nome_cliente'] . '', '' . $dadosCliente['email_cliente'] . '', '' . $dadosCliente['login'] . '', '' . $dadosCliente['senha'] . '', '' . $dadosProfile['nome_profile'] . '', $dadosRevenda['url'], $dadosProfile['portaprofile']);

                    //Enviar Mensagem para o cliente
                    $this->email_model->enviaEmailRevenda(array(
                        'assunto' => $parametrosRevenda['assunto_email_alteracao_situacao_cliente'],
                        'msg' => str_replace($comandos, $variavel, $parametrosRevenda['mensagem_email_alteracao_situacao_cliente']),
                        'para' => $dadosCliente['email_cliente']
                    ));
                } else {
                    echo json_encode(array('classe' => 'acerto', 'msg' => "Cliente atualizado com sucesso!<br/>Porém, a (Mensagem de alteração de situação TESTE => CLIENTE) não foi enviada pois se encontra inativada, por favor verifique os parâmetros.", 'url' => base_url('cliente/listar')));
                    exit();
                }

            }


            echo json_encode(array('classe' => 'acerto', 'msg' => "Cliente atualizado com sucesso!", 'url' => base_url('cliente/listar')));
            exit();

        } else {

            //Inserir Novo registro
            $idForum = $this->forum_model->insert(array(
                    'nome_forum' => $_REQUEST['nome_forum'],
                    'endereco_forum' => $_REQUEST['endereco_forum'])
            );

            echo json_encode(array('id_forum'=> $idForum, 'nome_forum'=> $_REQUEST['nome_forum'], 'endereco_forum' => '' != $_REQUEST['endereco_forum']? " | ".$_REQUEST['endereco_forum'] : '',  'classe' => 'acerto', 'msg' => "Forúm cadastrado com sucesso!", 'url' => base_url('forum/listar')));
            exit();
        }
    }
}	
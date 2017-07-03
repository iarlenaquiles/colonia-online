<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class usuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        //Carrega Tabelas
        $this->load->model("usuario_model");
    }

    public function index()
    {
        $this->listar();
    }


    public function minhaconta(){
      $this->load->model("usuario_model");
      $data = array();

      $data['minhaconta'] = $this->usuario_model->getById($this->session->userdata('id'));
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));

      $this->template->controlearquivo("usuario/minhaconta", $data);
    }
    public function cadastrar()
    {
        //Carrega Tabelas
        $this->load->model("usuario_model");

        $data = array();

        $this->template->controlearquivo("usuario/cadastrar", $data);
    }

    public function upload_foto() {
        $this->load->model("usuario_model");

        if ($img = $this->usuario_model->uploadFoto('uploadfoto')) {
            echo $img;
        } else {
            echo 'false';
        }
    }


    public function editar($id)
    {

      //  if ($this->session->userdata('id_usuario') != $id){
      //    redirect('usuario/minhaconta');
      //  }
       //
      //  if(!$this->permission->checkPermission($this->session->userdata('permissao', 'eUsuarios'))) {
      //    redirect('usuario/listar');
      //  }

      if($this->session->userdata('id_usuario') == $id){
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();
        //Carrega Tabelas
        $this->load->model("usuario_model");

        $this->load->model("colonia_model");
        $data['colonias'] = $this->colonia_model->getTodos();

        $this->load->model("permissoes_model");
        $data['permissoes'] = $this->permissoes_model->getAll();

        $data['registro'] = $this->usuario_model->getById($id);

        $this->template->controlearquivo("usuario/editar", $data);

      }else if($this->permission->checkPermission($this->session->userdata('permissao'),'eUsuarios')){
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();
        //Carrega Tabelas
        $this->load->model("usuario_model");

        $this->load->model("colonia_model");
        $data['colonias'] = $this->colonia_model->getTodos();

        $this->load->model("permissoes_model");
        $data['permissoes'] = $this->permissoes_model->getAll();

        $data['registro'] = $this->usuario_model->getById($id);

        $this->template->controlearquivo("usuario/editar", $data);
      }else{
        redirect('usuario/minhaconta');
      }

    }



    public function listar()
    {

            $data = array();
            $this->load->model("permissoes_model");
            $data['permissoes'] = $this->permissoes_model->getAll();

            $this->load->model("colonia_model");
            $data['colonias'] = $this->colonia_model->getTodos();

            $data['registros'] = $this->usuario_model->getAll();
            $this->template->controlearquivo("usuario/listar", $data);

    }

    public function alterar_senha(){

        $this->load->model("login_model");

        //Código do Usuário
        $idUsuario = $this->session->userdata("id_usuario");

        //Se a nova senha foi informada
        if (!empty($_REQUEST['nova_senha'])) {
            //Verificar a Senha Atual
            $verificarSenha = $this->login_model->verificarSenha($idUsuario, $_REQUEST['senha_atual']);

            if (empty($verificarSenha)) {
                echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao alterar, senha atual não confere!", 'url' => base_url('usuario/minhaconta')));
                exit();
            }

            //Atualiza nova senha
            $this->login_model->updateSenha($idUsuario, md5($_REQUEST['nova_senha']));
            echo json_encode(array('classe' => 'acerto', 'msg' => "Senha atualizada com sucesso.", 'url' => base_url('login/sair')));
            exit();

        }
    }


    //gera senhas aleatórias
    private function randGenerator($tamanho)
    {

        if ($tamanho > 0) {

            $CaracteresAceitos = 'abcdxywzABCDZYWZ0123456789';
            $max = strlen($CaracteresAceitos) - 1;
            $password = null;

            for ($i = 0; $i < $tamanho; $i++) {
                $password .= $CaracteresAceitos{mt_rand(0, $max)};
            }

            return $password;
        } else {
            return '';
        }
    }

    public function salvar()
    {
        //Se for informado o id atualiza, caso contrário insere
        if (!empty($_REQUEST['id'])) {
            //Formatando a Data da Validade
            $dateValidade = new DateTime();
            $data = explode('/', $_REQUEST['validade']);
            $dateValidade = new DateTime();
            $dateValidade->setDate($data[2], $data[1], $data[0]);
            $dataValidade = $dateValidade->format('Y-m-d');

            //Buscar dados da Revenda
            $dadosRevenda = $this->revenda_model->getById($_REQUEST['id']);

            //Se Inativar Revenda, inativa todos clientes
            if (!empty($_REQUEST['situacao_revenda']) && $dadosRevenda['situacao_revenda'] != $_REQUEST['situacao_revenda'])
                $this->alterarSituacaoClientesRevenda($_REQUEST['id'], $_REQUEST['situacao_revenda']);


            //Atualiza Dados
            $this->revenda_model->update($_REQUEST['id'], array(
                    'nome_revenda' => $_REQUEST['nome'],
                    'email' => $_REQUEST['email'],
                    'url' => $_REQUEST['url'],
                    'url_2' => '' != $_REQUEST['url_2'] ? $_REQUEST['url_2'] : '',
                    'limite_login' => $_REQUEST['limite_login'],
                    'excluir_cliente' => 'on' == $_REQUEST['excluir_cliente'] ? 1 : 0,
                    'transferir_cliente' => 'on' == $_REQUEST['transferir_cliente'] ? 1 : 0,
                    'revender' => 'on' == $_REQUEST['revender'] ? 1 : 0,
                    'bloquear_revenda' => 'on' == $_REQUEST['bloquear_revenda'] ? 1 : 0,
                    'valor_revenda' => $this->funcoes->formataMoedaInt($_REQUEST['valor_revenda']),
                    'valor_revenda_NET' => $this->funcoes->formataMoedaDoubleSaveDB($_REQUEST['valor_revenda_NET']),
                    'data_validade' => $dataValidade,
                    'situacao_revenda' => 'on' == $_REQUEST['situacao_revenda'] ? 'Ativo' : 'Inativo',
                    'situacao_revenda_anterior' => 'on' == $_REQUEST['situacao_revenda'] ? 'Ativo' : 'Inativo')
            );


            $dadosUsuarioAtualiza = array('usuario' => $_REQUEST['login']);
            //Se for informado a nova senha, altera
            if (!empty($_REQUEST['nova_senha']))
                $dadosUsuarioAtualiza['senha'] = md5($_REQUEST['nova_senha']);

            $this->usuario_model->update($dadosRevenda['id_usuario'], $dadosUsuarioAtualiza);

            //Se a atualizar a data, envia email
            if ($_REQUEST['validade'] != $_REQUEST['validade_original']) {
                //Buscar Parametros da Revenda
                $parametrosRevenda = $this->revenda_model->getParametrosRevenda($this->session->userdata("id_revenda"));
                //Verifica se opção de enviar email esta ativado
                if (!empty($parametrosRevenda['mensagem_email_renova_vencimento_revenda_bln'])) {

                    //Pegar dados da revenda Destino
                    $dadosRevendaDestino = $this->revenda_model->getById($_REQUEST['id']);

                    //Trocar comandos por variaveis
                    $comandos = array('[NOME]', '[DATA]');
                    $variavel = array('' . $dadosRevendaDestino['nome_revenda'] . '', '' . $_REQUEST['validade'] . '');

                    //Enviar Email
                    $this->load->model("email_model");
                    $enviarEmail = $this->email_model->enviaEmailRevenda(array(
                        'assunto' => $parametrosRevenda['assunto_email_renova_vencimento_revenda'],
                        'msg' => str_replace($comandos, $variavel, $parametrosRevenda['mensagem_email_renova_vencimento_revenda']),
                        'para' => $dadosRevendaDestino['email']
                    ));

                } else {
                    echo json_encode(array('classe' => 'acerto', 'msg' => "Revenda atualizada com sucesso!<br/>Porém, a Mensagem de renovação não foi enviada pois se encontra inativada, por favor verifique os parâmetros.", 'url' => base_url('revenda/listar')));
                    exit();
                }
            }
            echo json_encode(array('classe' => 'acerto', 'msg' => "Revenda atualizada com sucesso!", 'url' => base_url('revenda/listar')));
            exit();

        } else {

                //Administrador do Escritório
                $Administrador = $this->usuario_model->getById($this->session->userdata("id_usuario"));

                //Verifica se já existe Usuário cadastrado
                $verificaUsuarioExistente = $this->usuario_model->verificaLoginExistente($_REQUEST['usuario']);

                if (!empty($verificaUsuarioExistente)) {
                    echo json_encode(array('classe' => 'erro', 'msg' => 'Login já utilizado!'));
                    exit();
                }
                //Cadastra Usuário
                $idUsuario = $this->usuario_model->insert(array('nome_usuario' => $_REQUEST['nome_usuario'],
                    'usuario' => $_REQUEST['usuario'],
                    'senha' => md5($_REQUEST['senha']),
                    'lembrete_senha' => '',
                    'alterar_senha' => 0,
                    'data_validade' => $Administrador['data_validade'],
                    'id_grupo_usuario' => 3,
                    'ativo' => 1,
                    'permissoes_id' => $_REQUEST['permissao_id'],
                    'data_cadastro' => date('Y-m-d H:i:s'),
                    'colonia_id' => $_REQUEST['colonia_id']
                ));

                echo json_encode(array('classe' => 'acerto', 'msg' => "Usuário cadastrado com sucesso!", 'url' => base_url('usuario/listar')));
                exit();
        }
    }

public function atualizar(){
    if (!empty($_REQUEST['id'])) {
      $this->usuario_model->update('usuario', array(
            'nome_usuario' => $_REQUEST['nome_usuario'],
            'usuario' => $_REQUEST['usuario'],
            //'senha' => md5($_REQUEST['senha']),
            //'lembrete_senha' => '',
            //'alterar_senha' => 0,
            //'data_validade' => $Administrador['data_validade'],
          //  'id_grupo_usuario' => 3,
            //'ativo' => 1,
            'permissoes_id' => $_REQUEST['permissao_id'],
            'colonia_id' => $_REQUEST['colonia_id'],
            'foto' => $_REQUEST['foto']
      ),'id', $_REQUEST['id']);

          echo json_encode(array('classe' => 'acerto', 'msg' => "Usuário atualizado com sucesso!", 'url' => base_url('usuario/editar') . "/" . $_REQUEST['id']));
          exit();
    }
}


    public function limparCache()
    {
        //Código da Revenda
        $idRevenda = $this->session->userdata("id_revenda");

        //Se o servidor for local usa o memcache especifico
        if ('localhost' == $_SERVER['HTTP_HOST']) {
            //echo "ENTROU LOCALHOST";
            // Load library
            $this->load->library('Memcached_library');
            $resultsRevenda = $this->memcached_library->get(diretorio_sistema() . '/listar_revendas' . $idRevenda);
            $resultsClientes = $this->memcached_library->get(diretorio_sistema() . '/listar_clientes' . $idRevenda);

            // Se não existir cache Revendas, carrega com os dados da busca.
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


    public function excluir($idUsuario)
    {
        $this->usuario_model->delete($idUsuario);
        echo json_encode(array('classe' => 'acerto', 'msg' => "Usuário excluído com sucesso!", 'url' => base_url('usuario/listar')));
        exit();
    }


    public function configuracoes()
    {
        $data = array();
        $data['dadosUsuario'] = $this->usuario_model->getById($this->session->userdata("id_usuario"));
        $this->template->controlearquivo("usuario/configuracoes", $data);
    }

    public function insereLogin($dados)
    {
        //Carrega Tabelas
        $this->load->model("cliente_model");
        $this->load->model("revenda_model");

        //Limpa Cache Revendas
        $this->limparCache();

        //Caso a quantidade seja zerada
        if (empty($dados['quantidade']))
            $dados['quantidade'] = 1;
        $quantidade = $_REQUEST['quantidade'];
        $this->cliente_model->insertLogin(array('id_cliente' => $dados['id_cliente'],
                'login' => $dados['login'],
                'senha' => $dados['senha'],
                'validade' => $dados['validade'],
                'quantidade' => $dados['quantidade'],
                'situacao_login' => $dados['situacao_login']
            )
        );
        //echo json_encode(array('classe'=> 'acerto', 'msg' => "Cliente cadastrado com sucesso!",'url'=> base_url('cliente/listar')));
        //exit();
    }
}

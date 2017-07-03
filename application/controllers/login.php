<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class login extends CI_Controller
{

    protected function salt()
    {
    }

    public function index()
    {
        $this->apagar_sessao();
        $http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
        $http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote_addr = $_SERVER['REMOTE_ADDR'];

        $data = array();

        //Verifica se possui COOKIE
        if ((!empty($_COOKIE['blog_ghj'])) and (!empty($_COOKIE['blog_ghk']))) {
            //desencripto os dados
            $cookie['usuario'] = base64_decode($_COOKIE['blog_ghj']);
            $cookie['senha'] = base64_decode($_COOKIE['blog_ghk']);

            //Verifica se a senha é a mesma
            $this->load->model("login_model");
            if ($this->login_model->verificaLogin($cookie['usuario'], $cookie['senha'])) {
                $data['usuario'] = $cookie['usuario'];
                $data['senhha'] = $cookie['senha'];
                $data['lembrarMe'] = true;
            }
        }

        $this->load->view("login_view", $data);
    }

    public function cliente()
    {
        $this->apagar_sessao();

        $data = array();
        $this->load->view("login_cliente_view", $data);
    }

    public function verificaUsuarioExistente($usuario)
    {
        //Carrega Tabelas
        $this->load->model("login_model");
        //Verifica se o Usuário já existe
        if ($this->login_model->verificaUsuario($_REQUEST['usuario'])) {
            echo json_encode(array('classe' => 'erro', 'msg' => "Usuário já existente, por favor informe outro."));
            exit();
        }
        echo json_encode(array('classe' => 'acerto'));
    }

    public function recuperar_senha()
    {

        $data["titulo"] = "Recupere sua senha";
        $data["view"] = "esqueceu_view";

        $this->load->view("template_view", $data);
    }

    public function valida_recuperar_senha()
    {

        $email = $this->input->post("email");

        $this->load->model("login_model");
        $this->load->model("usuario_model");
        $gerarNovaSenha = $this->login_model->verificaEmail($email);

        if (!empty($gerarNovaSenha)) {

            $dadosUsuario = $this->usuario_model->getByEmail($email);
            $this->session->set_userdata(array('id_revenda' => $dadosUsuario['id_revenda_principal']));
            $this->load->model("email_model");
            $this->email_model->enviarEmail(array(
                'assunto' => "Recuperação de Senha",
                "msg" => "Olá, sua nova senha foi gerada com sucesso:<b>" . $gerarNovaSenha . "</b>",
                "para" => $email,
            ));
            $this->session->unset_userdata('id_revenda');
            echo json_encode(array('classe' => 'acerto', 'msg' => 'Nova senha gerada com sucesso e enviada para o email ' . $email, 'url' => base_url('login')));
            exit();
        } else {
            echo json_encode(array('classe' => 'erro', 'msg' => 'Não há nenhum usuario cadastrado com o email ' . $email, 'url' => base_url('login')));
            exit();
        }
    }

    public function nova_senha()
    {

        if (isset($_GET['codigo'])) {

            $codigo = $_GET['codigo'];

            $this->db->where("codigo", $codigo);
            $this->db->from("recupera_senha");

            $query = $this->db->get();

            if ($query->num_rows() == 1) {

                $usuario = $query->result_array();

                $this->session->set_userdata("id_usuario_senha", $usuario[0]['id_usuario']);

                $data["titulo"] = "Nova senha";
                $data["view"] = "nova_senha_view";

                $this->load->view("template_view", $data);
            } else {
                redirect("login");
            }
        } else {
            redirect("login");
        }
    }

    public function salva_nova_senha()
    {

        // echo "<pre>"; print_r($_POST); exit();

        $this->load->model("login_model");

        $this->session->userdata("id_usuario_senha");

        $id = $this->session->userdata("id_usuario_senha");
        $senha = $this->input->post("senha");

        $this->login_model->updateSenha($id, $senha);

        $this->session->unset_userdata("id_usuario_senha");

        redirect("login");
    }

    public function geraNumero()
    {
        session_start();
        $ranStr = md5(microtime());
        $ranStr = substr($ranStr, 0, 6);
        $_SESSION['cap_code'] = $ranStr;
        echo json_encode($ranStr);
    }

    public function captcha($ranStr)
    {
        session_start();
        $_SESSION['cap_code'] = $ranStr;
        $newImage = imagecreatefromjpeg(base_url('uploads/temp/cap_bg.jpg'));
        $txtColor = imagecolorallocate($newImage, 0, 0, 0);
        imagestring($newImage, 5, 5, 5, $ranStr, $txtColor);
        header("Content-type: image/jpeg");
        echo json_encode(imagejpeg($newImage));;
    }

    protected function lembrar($login, $senha)
    {
        $cookie = array(
            'usuario' => $this->salt() . base64_encode($login),
            'senha' => $this->salt() . base64_encode($senha)
        );
        setcookie('blog_ghj', $cookie['usuario'], (time() + (2 * 24 * 13600)), $_SERVER['SERVER_NAME']);
        setcookie('blog_ghk', $cookie['senha'], (time() + (2 * 24 * 13600)), $_SERVER['SERVER_NAME']);
    }

    public function nova_conta() {

        //Carrega tabelas
        $this->load->model("usuario_model");

        //Verifica se já existe Usuário cadastrado
        $verificaUsuarioExistente = $this->usuario_model->verificaLoginExistente($_REQUEST['email']);
        if (!empty($verificaUsuarioExistente)) {
            echo json_encode(array('classe' => 'erro', 'msg' => 'Login/Email já utilizado!<br/>Por favor informe outro.'));
            exit();
        }
        //Gera nova senha
        $novaSenha = $this->geraSenha(6);


        //Gera a data de validade
        $dataValidade = new DateTime();
        $dataValidade->setDate(date('Y-m-d'));
        $dataValidade = $dataValidade->modify('+30 day');
        $dataValidade = $dataValidade->format('Y-m-d');

        //Cadastra Usuário
        $idUsuario = $this->usuario_model->insert(array('nome_usuario' => $_REQUEST['nome_usuario'],
            'usuario' => $_REQUEST['email'],
            'senha' => md5($novaSenha),
            'lembrete_senha' => '',
            'cpf_usuario' => $_REQUEST['cpf_usuario'],
            'telefone_usuario' => $_REQUEST['telefone_usuario'],
            'alterar_senha' => 0,
            'data_validade' => $dataValidade,
            'id_grupo_usuario' => 2,
            'ativo' => 1
        ));

        //Carrega tabelas
        $this->load->model("email_model");
        $nomeCompleto = explode(" ",$_REQUEST['nome_usuario']);
        $enviarEmail = $this->email_model->enviarEmail(array(
            'de' => 'contato@uniadv.com.br',
            'assunto' => "CADASTRO REALIZADO COM SUCESSO - UNIADV",
            'msg' => "Olá ".$nomeCompleto[0].", obrigado por se cadastrar em nosso sistema, segue abaixo os dados para acesso:</br>
            <b>Login/Email:</b>".$_REQUEST['email']."<br/>
            <b>Senha:</b>".$novaSenha."<br/><br/>

        Para acessar o sistema, <a href='".base_url('login')."' target='_blank'>clique aqui</a>.<br/>
        Atenciosamente,
        Equipe UNIADV.",
            'para' => $_REQUEST['email']
        ));

        echo json_encode(array('classe' => 'acerto', 'msg' => "Nova conta criada com sucesso, sua senha foi enviada para o email: ".$_REQUEST['email'].".", 'url' => base_url('login')));
        exit();
    }

    public function entrar()
    {

        $this->load->model("login_model");

        $usuario = $this->input->post("usuario");
        $senha = $this->input->post("senha");

        if (empty($usuario) || empty($senha)) {
            echo json_encode(array('classe' => 'erro', 'msg' => 'Por favor, preencha o Usuário e senha.', 'url' => base_url('login')));
            exit();
        }
        //Verifica se o Login é válido
        if ($this->login_model->verificaLogin($usuario, $senha)) {

            //Lembrar Senha
            if (!empty($_REQUEST['lembrar-me'])) {
                $this->lembrar($usuario, $senha);
            }

            //$dados = array('nome' => $usuario['nome'], 'permissao' => $usuario['permissoes_id']);
            //$dados = array('nome' => $usuario->nome, 'id' => $usuario->idUsuarios,'permissao' => $usuario->permissoes_id , 'logado' => TRUE);
            //$this->session->set_userdata($dados);
            echo json_encode(array('classe' => 'acerto', 'msg' => "Usuário logado com sucesso!", 'url' => base_url('painel')));
            exit();

        } else {

            $http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
            $http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote_addr = $_SERVER['REMOTE_ADDR'];

            /* VERIFICO SE O IP REALMENTE EXISTE NA INTERNET */
            if (!empty($http_client_ip)) {
                $ip = $http_client_ip;
                /* VERIFICO SE O ACESSO PARTIU DE UM SERVIDOR PROXY */
            } elseif (!empty($http_x_forwarded_for)) {
                $ip = $http_x_forwarded_for;
            } else {
                /* CASO EU NÃO ENCONTRE NAS DUAS OUTRAS MANEIRAS, RECUPERO DA FORMA TRADICIONAL */
                $ip = $remote_addr;
            }

            $dadosUsuario = $this->login_model->getEmailUsuario($usuario);

            if (!empty($dadosUsuario)) {
             /*
                $this->session->set_userdata(array('id_revenda' => $dadosUsuario['id_revenda']));
                $this->load->model("email_model");
                $this->email_model->enviarEmail(array(
                    'assunto' => "OFICIALCS - Tentativa de Login",
                    'msg' => "Olá, acaba de ocorrer uma tentativa de login com o seu email no Painel do OFICIALCSP.
                    Os dados de IP da pessoa que se encontra tentando acesso são IP " . $ip . ".",
                    'para' => $dadosUsuario['email']
                ));
                $this->session->unset_userdata('id_revenda');
               */
                echo json_encode(array('classe' => 'erro', 'msg' => "Usuário ou senha inválidos", 'url' => base_url('login')));
                exit();
            } else {
                echo json_encode(array('classe' => 'erro', 'msg' => "Usuário inexistente", 'url' => base_url('login')));
                exit();
            }


        }
    }


    public function cliente_entrar()
    {
        $this->load->model("cliente_model");

        $email = $this->input->post("email");
        $login = $this->input->post("login");

        if (empty($email) || empty($login)) {
            echo json_encode(array('classe' => 'erro', 'msg' => 'Por favor, preencha o Email e Login.', 'url' => base_url('login/cliente/')));
            exit();
        }
        //Verifica se o Login é válido
        $verificaLogin = $this->cliente_model->verificaLoginCliente($email, $login);

        $situacaoLogin = $this->session->userdata("situacao_login");
        if (!empty($verificaLogin) && 'Ativo' == $situacaoLogin) {

            echo json_encode(array('classe' => 'acerto', 'msg' => "Cliente logado com sucesso!", 'url' => base_url('painel_cliente')));
            exit();

        } else {
            echo json_encode(array('classe' => 'erro', 'msg' => "Email ou Login inválido", 'url' => base_url('login/cliente')));
            exit();
        }/*else if(!empty($verificaLogin) && 'Inativo' == $situacaoLogin){

            //unseta as sessoes
            $this->session->unset_userdata('logado');
            $this->session->unset_userdata('id_login');
            $this->session->unset_userdata('id_revenda');
            $this->session->unset_userdata('usuario');
            $this->session->unset_userdata('nome_usuario');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('situacao_login');

            //destroi as sessoes
            $this->session->sess_destroy();

            echo json_encode(array('classe'=> 'alerta', 'msg' => "Usuário bloqueado !",'url'=> base_url('login/cliente')));
            exit();
        }*/
    }


    public function buscar_logins_xml($key)
    {
        //Carrega Tabelas
        $this->load->model("revenda_model");

        //Dados Parametros da Revenda logada
        $parametrosRevenda = $this->revenda_model->getParametrosRevenda(1);
        if (!empty($key) && $parametrosRevenda['revenda_key_csp'] == $key) {
            //Carrega Tabelas
            $this->load->model("cliente_model");
            /*
             *  array(array(
                    'campo'    => "l.id_cliente",
                    'operador' => null,
                    'valor'    => $idCliente
                )
                )

             */
            $logins = $this->cliente_model->buscarLoginsXml();

            $this->load->helper('xml');
            $xml = "<xml-user-manager ver=\"1.0\">\n";

            foreach ($logins as $login) {
                if (!empty($login['id_login'])) {
                    $name = "";
                    $displayname = "";
                    $password = "";
                    $profiles = "";
                    $maxconnections = "";

                    //Verifica a Situação das Revendas Pais
                    $revendasGeral = $this->revenda_model->getRevendasPaiPiramide($login['id_revenda']);


                    $blnSituacaoAtivo = true;
                    //Percorre todas revendas pai pra ver se tem alguma inativa
                    foreach ($revendasGeral as $revenda) {
                        if (date('Y-m-d') > $this->funcoes->formataDataBanco($revenda['data_validade']) || 'Inativo' == $revenda['situacao_revenda']) {
                            $blnSituacaoAtivo = false;
                        }
                    }

                    //verifica situação login
                    if (!empty($blnSituacaoAtivo) && ('Ativo' == $login['situacao_revenda'] || 'Bloqueado' == $login['situacao_revenda']) && 'Ativo' == $login['situacao_login'] && $login['validade'] >= date('Y-m-d H:i:s')) {

                        $blnSituacaoAtivo = true;
                        //verifica situação login
                        if ('Ativo' == $login['situacao_login']) {
                            $enabled = "enabled=\"true\"";
                        } else {
                            $enabled = "enabled=\"false\"";
                        }

                        //Se a data validade for maior ou igual a atual, não venceu
                        if ($login['validade'] >= date('Y-m-d H:i:s')) {
                            $enabled = "enabled=\"true\"";
                        } else {
                            $enabled = "enabled=\"false\"";
                        }


                        //Verifica Login
                        if (!empty($login['login'])) {

                            $name = "name=\"" . $login['login'] . "\" ";
                            $displayname = "display-name=\"" . $login['login'] . "\" ";
                        }


                        //Verifica Senha
                        if (!empty($login['senha']))
                            $password = "password=\"" . $login['senha'] . "\" ";


                        if (!empty($login['profilecsp'])) {
                            $profiles = "profiles=\"" . $login['profilecsp'] . "\" ";

                        }


                        if (!empty($login['quantidade']))
                            $maxconnections = "max-connections=\"" . $login['quantidade'] . "\" ";

                        $xml .= "<user " . $name . $password . $displayname . $profiles . $maxconnections . $enabled . "/>\n";
                    }
                }
            }
            $xml .= "</xml-user-manager>";
            //$xml = xml_convert($xml,true);
            echo $xml;
            //$data['xml'] = $xml;
            //$this->load->view('cliente/logins.xml',$data);

        } else {
            echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao encontrar dados!", 'url' => base_url('login')));
            exit();
        }
    }


    /**
     * Função para gerar senhas aleatórias
     *
     * @author    Thiago Belem <contato@thiagobelem.net>
     *
     * @param integer $tamanho Tamanho da senha a ser gerada
     * @param boolean $maiusculas Se terá letras maiúsculas
     * @param boolean $numeros Se terá números
     * @param boolean $simbolos Se terá símbolos
     *
     * @return string A senha gerada
     */
    public function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
    {
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;
    }

    public function sair()
    {

        $this->apagar_sessao();
        //manda pro login com um alert
        redirect("login");
    }

    public function cliente_sair()
    {

        $this->apagar_sessao();
        //manda pro login com um alert
        redirect("login/cliente");
    }

    private function apagar_sessao()
    {
        //unseta as sessoes
        $this->session->unset_userdata('logado');
        $this->session->unset_userdata('logado_cliente');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('id_usuario');
        $this->session->unset_userdata('id_revenda');
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('senha');
        $this->session->unset_userdata('nome_usuario');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_franquia');
        $this->session->unset_userdata('id_grupo_usuario');
        $this->session->unset_userdata('id_plano_atual');
        $this->session->unset_userdata('alterar_senha');

        //destroi as sessoes
        $this->session->sess_destroy();
    }
}

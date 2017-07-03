<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cadastre extends CI_Controller
{
	public function index()
	{
        echo "asdsa";
        exit();
        //Tela
        define('ID_MODULO',5);
        $this->load->model("login_model");
        $operacionais = $this->login_model->getOperacionaisTelaUser(ID_MODULO, $this->session->userdata("id") );
        $data = array();
        define('ID_MODULO',10);
        $this->template->controlearquivo($operacionais[0]['destino']."_view", $data);
	}

    public function editar($id)
    {
        $this->load->model("cliente_model");
        $this->load->model("usuario_model");

        $data["dados"] =  $this->cliente_model->getById($id);
        $data["titulo"] = "Editar Cliente";

        $data["privilegios"] = $this->usuario_model->getPrivilegios($this->session->userdata("id"));

        $this->template->controleArquivoJanela("cadastros/cliente_registro_view", $data);
    }




	public function registro($id = null)
	{
		$this->load->model("clientes_model");
        $this->load->model("perfil_model");
		
		if ($id != null) {

            $info_cliente = $this->clientes_model->getById($id);
            $titulo = "Cadastro do cliente ".$info_cliente['razao_social'];
		} else {

			$info_cliente = null;
			$titulo = "Novo Cadastro";
		}

		$data["info_cliente"] = $info_cliente;
		$data["perfis"] = $this->perfil_model->getAll();

	    $data["titulo"] = $titulo;
        
        $this->template->controlearquivo("cadastros/clientes_registro_view", $data);
	}

	public function cadastrar_nova()
	{
		$this->load->model("franquia_model");
        $this->load->model("pessoa_model");
        $this->load->model("usuario_model");
        $this->load->model("login_model");
        $this->load->model("email_model");

        $dadosFranquia = array('nome_franquia' => $_REQUEST['franquia_nome'],
            'id_estado' => $_REQUEST['franquia_id_estado'],
            'id_cidade' => $_REQUEST['franquia_id_cidade'],
            'logradouro_franquia' => $_REQUEST['franquia_logradouro'],
            'endereco_franquia' => $_REQUEST['franquia_logradouro'],
            'numero_franquia' => $_REQUEST['franquia_endereco_numero'],
            'bairro_franquia' => $_REQUEST['franquia_bairro'],
            'telefone_fixo_franquia'=> $_REQUEST['franquia_telefone_fixo'],
            'telefone_celular_franquia' => $_REQUEST['franquia_telefone_celular'],
            'email_corporativo_franquia' => $_REQUEST['franquia_email_corporativo'],
            'gerente_responsavel_franquia' => $_REQUEST['franquia_gerente_responsavel']);
        $idFranquia = $this->franquia_model->insert($dadosFranquia);

        $dadosBancario = array('id_franquia' => $idFranquia,
            'banco' => $_REQUEST['dados_bancario_banco'],
            'agencia' => $_REQUEST['dados_bancario_agencia'],
            'tipo_conta' => $_REQUEST['dados_bancario_tipo_conta'],
            'numero_conta' => $_REQUEST['dados_bancario_conta'],
            'digito_conta' => $_REQUEST['dados_bancario_digito']
        );

        $this->franquia_model->insertDadosBancarios($dadosBancario);

        $dadosPessoa = array(
            'nome' => $_REQUEST['pessoa_nome'],
            'identidade' => $_REQUEST['pessoa_identidade'],
            'cpf' => $_REQUEST['pessoa_cpf'],
            'idEstado' => $_REQUEST['pessoa_id_estado'],
            'idCidade' => $_REQUEST['pessoa_id_cidade'],
            'logradouro' => $_REQUEST['pessoa_logradouro'],
            'numeroEndereco' => $_REQUEST['pessoa_endereco_numero'],
            'bairro' => $_REQUEST['pessoa_bairro'],
            'email' => $_REQUEST['pessoa_email'],
            'telefoneFixo' => $_REQUEST['pessoa_telefone_fixo'],
            'telefoneFixo' => $_REQUEST['pessoa_telefone_celular'],
            'foto' => $_REQUEST['foto']);
        $idPessoa = $this->pessoa_model->insert($dadosPessoa);

        //Verifica se já existe Usuário cadastrado
        $verificaUsuarioExistente = $this->usuario_model->verificaLoginExistente($_REQUEST['usuario']);

        if(empty($verificaUsuarioExistente))
        {
            $this->session->set_userdata("retorno_acao", array('classe'=> 'erro', 'msg'=> "Login já utilizado."));
            //exit();
        }

        $novaSenha = $this->usuario_model->randGenerator(6);

        $enviarEmail = $this->email_model->EnviarEmail(array(
            'assunto' => 'Parabéns '.$_REQUEST['pessoa_nome'].', agora você faz parte da Rede de Franquias Aero 10!',
            'msg' => 'Olá, segue seus dados de acesso ao sistema de franqueado: <br/>Usuário: '.$_REQUEST['usuario'].' <br/>Senha:  '.$novaSenha.'.',
            'para' => $_REQUEST['pessoa_email']
        ));


        $idUsuario = $this->usuario_model->insert(array('nome'=> $_REQUEST['pessoa_nome'],
            'usuario' => $_REQUEST['usuario'],
            'senha' => md5($novaSenha),
            'lembrete_senha' => '',
            'alterar_senha' => 1,
            'email' => $_REQUEST['pessoa_email'],
            'id_grupo_usuario' => 3,
            'id_pessoa' => $idPessoa,
            'id_franquia' => $idFranquia
            ));

        $permissoesGrupoUsuario = $this->usuario_model->getPermissoesGrupoUsuario(3);
        $permissoes = explode(',',$permissoesGrupoUsuario['permissoes_grupo_usuario']);
        //Gravar Permissoes do Usuário
        foreach($permissoes as $idPermissao)
        {
            $this->usuario_model->insertPermissaoUsuario($idUsuario, $idPermissao);
        }


        //$this->session->set_userdata("retorno_acao", array('classe'=> 'acerto', 'msg'=> "Franquia cadastrada com sucesso!"));
        echo json_encode(array('classe'=> 'acerto', 'msg' => 'Franquia cadastrada com sucesso!'));
        //redirect("cadastro/franquia");

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
    public function gerarSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
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
            $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
    }
}	
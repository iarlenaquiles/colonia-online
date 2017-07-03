<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cadastro extends CI_Controller
{
	public function index()
	{
        $this->teste();
	}

    public function teste()
    {
        $data = array();
        $this->load->view("cliente/cadastrar_teste_view", $data);
    }

    public function valida_codigo_revenda($codigoRevenda)
    {
        $dadosRevenda = $this->revenda_model->getByCodigoRevenda($codigoRevenda);
    }


    public function cadastrar_login()
    {
        $this->load->model("usuario_model");
        $this->load->model("login_model");
        $this->load->model("email_model");

        //Verifica se já existe Usuário cadastrado
        $verificaUsuarioExistente = $this->usuario_model->verificaLoginExistente($_REQUEST['email']);

        if(!empty($verificaUsuarioExistente))
        {
            echo json_encode(array('classe'=> 'erro', 'msg' => 'Login já utilizado!'));
            exit();
        }

        $idUsuario = $this->usuario_model->insert(array('nome'=> $_REQUEST['pessoa_nome'],
            'usuario' => $_REQUEST['email'],
            'senha' => md5($_REQUEST['senha']),
            'lembrete_senha' => '',
            'alterar_senha' => 0,
            'email' => $_REQUEST['email'],
            'id_grupo_usuario' => 3,
            'id_correspondente' => 0,
            'id_solicitante' => 0,
            'id_plano_atual' => 0,
            'id_franquia' => 1,
            'ativo' => 0
        ));
        //Se cadastrou usuário, grava sessão
        if(!empty($idUsuario))
        {
            $session = array(
                "id_usuario" => $idUsuario,
                "usuario" => $_REQUEST['email'],
                "senha" => md5($_REQUEST['senha']),
                "pre_cadastro" => true
            );
            $this->session->set_userdata($session);
        }

        $permissoesGrupoUsuario = $this->usuario_model->getPermissoesGrupoUsuario(3);
        $permissoes = explode(',',$permissoesGrupoUsuario['permissoes_grupo_usuario']);
        //Gravar Permissoes do Usuário
        foreach($permissoes as $idPermissao)
        {
            $this->usuario_model->insertPermissaoUsuario($idUsuario, $idPermissao);
        }

        //$this->dados_pessoais($idUsuario);
        echo json_encode(array('classe'=> 'acerto', 'msg' => 'Login cadastrado.','url'=> base_url('cadastro/dados_pessoais/')));
    }

    public function dados_pessoais()
    {
        //Verifica Usuário Pré Cadastro
        $this->load->library('autenticacao');

        //Código do Usuário
        $idUsuario = $this->session->userdata("id_usuario");

        $data = array();
        $this->load->model( "estado_model" );
        $data['estados'] = $this->estado_model->getAll();
        $data['idUsuario'] = $idUsuario;
        $this->template->controlesite("cadastro/correspondente_dados_pessoais_view", $data);
    }

    public function planos()
    {
        //Verifica Usuário Pré Cadastro
        $this->load->library('autenticacao');

        //Código do Usuário
        $idUsuario = $this->session->userdata("id_usuario");

        $data = array();
        $this->load->model( "plano_model" );
        $planos = $this->plano_model->getAll();

        $data['planos'] = $planos;
        //Valores dos planos
        foreach($planos as $key => $plano)
        {
            $data['planos'][$key]['planos_valores'] = $this->plano_model->getValoresPlano($plano['id_plano']);
        }

        $data['idUsuario'] = $idUsuario;
        $this->template->controlesite("cadastro/correspondente_planos_view", $data);
    }

    public function escolher_plano_correspondente()
    {
        $idUsuario = $_REQUEST['idUsuario'];
        $idPlano = $_REQUEST['id_plano_valor'];
        $this->load->model("historico_pagamento_model");
        $this->load->model("usuario_model");
        $this->load->model("plano_model");
        $this->load->model("email_model");

        $dadosPlanoValor = $this->plano_model->getByIdPlanoValor($idPlano);


        //Criar Historico de Pagamento
        $situacao = 'Aberto';
        $dataPagamento = '';
        if(empty($dadosPlanoValor['valor'])){
            $dataPagamento = date('Y-m-d H:i:s');
            $situacao = 'Pago';
        }
        $this->historico_pagamento_model->insert(array('id_usuario'=> $idUsuario, 'id_plano_valor_escolhido' => $idPlano, 'valor_plano'=> $dadosPlanoValor['valor'], 'desconto'=>  $dadosPlanoValor['desconto'],  'data_pagamento' => $dataPagamento, 'situacao' => $situacao));

        //Atualiza Dados do Usuário
        $this->usuario_model->update($idUsuario, array('id_plano_atual' => $idPlano));

        //Caso tenha o usuário e senha na sessão
        $usuario = $this->session->userdata("usuario");
        $senha = $this->session->userdata("senha");
        $this->load->model("login_model");
        if ($this->login_model->verificaLoginMd5($usuario, $senha)) {
            echo json_encode(array('classe'=> 'acerto', 'msg' => 'Correspondente cadastrado com sucesso.','url'=> base_url('painel')));
        }
    }




public function salvar_dados_pessoais()
{

    $idUsuario = $_REQUEST['idUsuario'];
        $this->load->model("correspondente_model");
        $this->load->model("usuario_model");
        $this->load->model("login_model");
        $this->load->model("email_model");

    //Verifica se já existe Correspondente cadastrado
    $verificaCorrespondenteExistente = $this->usuario_model->verificarCorrespondenteExistente($idUsuario);

    if(!empty($verificaCorrespondenteExistente))
    {
        echo json_encode(array('classe'=> 'erro', 'msg'=> "Dados do Correspondente já foram cadastrados anteriormente."));
        exit();
    }

    $dadosUsuario = $this->usuario_model->getById($idUsuario);


    //Certificado Digital
    $certificado = 0;
    if(!empty($_REQUEST['certificado_digital']) && 'on' == $_REQUEST['certificado_digital'])
        $certificado = 1;

    //Grava dados do Correspondente
    $dadosCorrespondente = array(
        'nome_correspondente' => $dadosUsuario['nome_usuario'],
        'certificado_digital' => $certificado,
        'cpf_correspondente' => $_REQUEST['pessoa_cpf'],
        'id_estado_correspondente' => $_REQUEST['pessoa_id_estado'],
        'id_cidade_correspondente' => $_REQUEST['pessoa_id_cidade'],
        'endereco_correspondente' => $_REQUEST['pessoa_logradouro'],
        'numero_correspondente' => $_REQUEST['pessoa_endereco_numero'],
        'bairro_correspondente' => $_REQUEST['pessoa_bairro'],
        'complemento_correspondente' => $_REQUEST['pessoa_complemento'],
        'cep_correspondente' => $_REQUEST['pessoa_cep'],
        'oab' => $_REQUEST['oab'],
        'atuacao' => $_REQUEST['atuacao'],
        'telefone_1' => $_REQUEST['telefone_1'],
        'telefone_2' => $_REQUEST['telefone_2'],
        'telefone_3' => $_REQUEST['telefone_3'],
        'telefone_4' => $_REQUEST['telefone_4'],
        'facebook' => $_REQUEST['facebook'],
        'linkedin' => $_REQUEST['linkedin'],
        'foto' => $_REQUEST['foto']);
    $idCorrespondente = $this->correspondente_model->insert($dadosCorrespondente);

    //Inserir Comarca
    $this->correspondente_model->insertComarca(array('id_correspondente' => $idCorrespondente,
        'id_estado_atuacao' => $_REQUEST['pessoa_id_estado'],
        'id_cidade_atuacao' => $_REQUEST['pessoa_id_cidade']));

    //Verificar se existe alguma solicitação cadastrada e informar o solicitante que houve um novo cadastro que procurava.
   $this->verificar_solicitacao_correspondente($_REQUEST['pessoa_id_estado'],$_REQUEST['pessoa_id_cidade']);

    //Atualiza Dados do Usuário
    $this->usuario_model->update($idUsuario, array('id_correspondente' => $idCorrespondente));

    //Permissoes Correspondente
    $permissoesGrupoUsuario = $this->usuario_model->getPermissoesGrupoUsuario(3);
    $permissoes = explode(',',$permissoesGrupoUsuario['permissoes_grupo_usuario']);
    //Gravar Permissoes do Usuário
    foreach($permissoes as $idPermissao)
    {
        $this->usuario_model->insertPermissaoUsuario($idUsuario, $idPermissao);
    }
    echo json_encode(array('classe'=> 'acerto', 'msg' => 'Dados pessoais cadastrados com sucesso.','url'=> base_url('cadastro/planos/')));
}

    public function verificar_solicitacao_correspondente($idEstado, $idCidade)
    {
        $this->load->model( "solicitacao_correspondente_model" );
        //Verifica se existe alguma solicitação de comarca para o estado e cidade do cadastro
        $verificaSolicitacaoExistente = $this->solicitacao_correspondente_model->getAll(array(array('campo' => 'sc.id_estado', 'valor' => $idEstado), array('campo'=>'sc.id_cidade','valor' => $idCidade)));
        //Se já houver solicitação, envia email para o solicitante e inativa a mesma.
        if(!empty($verificaSolicitacaoExistente))
        {
            //Envia Email Solicitante
            $this->load->model("email_model");
            $enviarEmail = $this->email_model->EnviarEmail(array(
                'assunto' => 'ACHEI CORRESPONDENTES - Correspondente Encontrado ',
                'msg' => ' Prezado(a) solicitante '.$verificaSolicitacaoExistente[0]['nome_solicitante'].', a busca do correspondente para a comarca de <a href="'.base_url('correspondentes/buscar').'?id_estado='.$idEstado.'&id_cidade='.$idCidade.'" target="_blank">'.$verificaSolicitacaoExistente[0]['nome_cidade'].'/'.$verificaSolicitacaoExistente[0]['uf'].'</a> foi encontrada com sucesso. <br/> A Equipe Achei Correspondentes agradece sua paciência e compreensão. Estamos à disposição. </br> Obrigado. ',
                'para' => $verificaSolicitacaoExistente[0]['email_solicitante']
            ));

            //Inativa Solicitação
            $this->solicitacao_correspondente_model->inativaSolicitacao($verificaSolicitacaoExistente[0]['id_solicitacao_correspondente']);
        }
    }

    public function correspondente()
    {

        $data = array();
        $this->load->model( "estado_model" );
        $data['estados'] = $this->estado_model->getAll();
        $this->template->controlesite("cadastro/correspondente_view", $data);
    }


    public function upload_foto() {
        $this->load->model("usuario_model");

        if ($img = $this ->usuario_model->uploadFoto('uploadfoto')) {
            echo $img;
        } else {
            echo 'false';
        }
    }

    public function confirmacao_gestor($idAgendaHomologacao,$novaTentativa)
    {
        $this->load->model( "agenda_model" );

        $data['tentativas'] = $this->agenda_model->getTentativasConfirmacaoGestorPorHomologacao($idAgendaHomologacao);
        $data['id_agenda_homologacao'] = $idAgendaHomologacao;
        $data['nova_tentativa'] = $novaTentativa;
        $data["titulo"] = "Confirmação Gestor";
        echo $this->load->view("agenda/agenda_modal_confirmacao_gestor_view", $data, true);
    }



    public function envia_sms()
    {
        $this->load->model("agenda_model");
        $this->load->model("exfuncionarios_model");
        $this->load->model("sindicatos_model");

        $id_agenda = $this->input->post("id_agenda");
        $mensagem = $this->input->post("sms");

        $agenda = $this->agenda_model->getById( $id_agenda );
        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );
        $homologacao[count($homologacao)-1]['id_motivo'] = $agenda['id_motivo'];

        $exfuncionario = $this->exfuncionarios_model->getById( $agenda['id_exfuncionario'] );
        $sindicato     = $this->sindicatos_model->getById( $exfuncionario['id_sindicato'] );

        $sindicato_razao = $sindicato['razao_social'];
        $sindicato_endereco = $sindicato['endereco'];
        $data = $homologacao[ count($homologacao)-1 ]['data'];
        $hora = $homologacao[ count($homologacao)-1 ]['hora'];

        $telefone = str_replace("(", "", $exfuncionario['celular']);
        $telefone = str_replace(")", "", $telefone);
        $telefone = str_replace("-", "", $telefone);
        $telefone = str_replace(".", "", $telefone);
        $telefone = str_replace(" ", "", $telefone);
        $telefone = (substr($telefone,0,1)=='0' ? substr($telefone,1) : $telefone);

        if ($telefone!=null || $telefone!="0" || $telefone!="9999999999") {

            $this->load->model("sms_model");
            $this->sms_model->envio_sms( $telefone, $mensagem);

            //redirect("exfuncionarios");
        }
        if(!empty($exfuncionario['email']))
        {
            $this->load->model("email_model");
            $this->email_model->enviaEmailConteudoSms($exfuncionario, $homologacao[ count($homologacao)-1 ], $sindicato);
        }
        $this->agenda_model->updateFlagSms($homologacao[ count($homologacao)-1 ]['id'],1);
    }

public function envia_email_teste()
    {
echo "ENTRO";

            $this->load->model("email_model");
            $this->email_model->enviaEmailTeste();
    }


}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class painel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");
    }

    public function index()
    {

        //Carrega Tabelas
        $this->load->model("usuario_model");
        $this->load->model("processo_model");
        $this->load->model("pessoa_model");


        $this->load->library("funcoes");

        $data = array();
        //Dados do Usuário
        $dadosUsuario = $this->usuario_model->getById($this->session->userdata("id_usuario"));

        //CONTAGEM TOPO

        $data['quantidade_pessoas'] = $this->pessoa_model->count();

        $this->template->controlearquivo("home_view", $data);
    }


    public function cliente()
    {
        //Carrega Tabelas
        $this->load->model("cliente_model");
        $this->load->model("revenda_model");
        $this->load->model("plano_model");

        $data = array();
        //Buscar dados do Login/Cliente
        $data['dadosLogin'] = $this->cliente_model->getByIdLogin($this->session->userdata("id_login"));
        $data['registros'] = $this->cliente_model->getHistoricoPagamentos(array(
            array(
                'campo' => "lhp.id_login",
                'operador' => "=",
                'valor' => $this->session->userdata("id_login")
            )
        ));
        $data['planos'] = $this->plano_model->getAll(array(
            array(
                'campo' => "rp.id_revenda",
                'operador' => null,
                'valor' => $data['dadosLogin']['id_revenda']
            )
        ));

        //Dados da Revenda
        $data['dadosRevenda'] = $this->revenda_model->getById($data['dadosLogin']['id_revenda']);

        $data['parametrosRevenda'] = $this->revenda_model->getParametrosRevenda($data['dadosLogin']['id_revenda']);

        $this->template->controlearquivocliente("home_cliente_view", $data);
    }

    /*
        `rc`.`id_revenda` = '1'
        AND `l`.`validade` > '2015-11-19 16:09:01'
        AND `c`.`tipo` = 'Cliente'
        AND `c`.`situacao_cliente` = 'Ativo'
        AND l.situacao_login = 'Ativo'*/

    private function buscar_quantidade_clientes_ativos()
    {

        //Carrega Tabelas
        $this->load->model("cliente_model");

        $loginsAtivos = $this->cliente_model->buscarLogins(array(
            array(
                'campo' => "rc.id_revenda",
                'operador' => null,
                'valor' => $this->session->userdata("id_revenda")
            ),
            array(
                'campo' => "l.validade",
                'operador' => ">",
                'valor' => date('Y-m-d H:i:s')
            ),
            array(
                'campo' => "c.tipo",
                'operador' => "=",
                'valor' => 'Cliente'
            ),
            array(
                'campo' => "c.situacao_cliente",
                'operador' => "=",
                'valor' => 'Ativo'
            )
        ));

        $qtdGeral = 0;
        foreach ($loginsAtivos as $login) {
            $qtdGeral += ($login['quantidade_multipla'] * $login['quantidade']);;
        }
        return $qtdGeral;
    }

    private function buscar_logins_testes_ativos()
    {
        //Carrega Tabelas
        $this->load->model("cliente_model");

        $loginsAtivos = $this->cliente_model->buscarLogins(array(
            array(
                'campo' => "rc.id_revenda",
                'operador' => null,
                'valor' => $this->session->userdata("id_revenda")
            ),
            array(
                'campo' => "l.validade",
                'operador' => ">",
                'valor' => date('Y-m-d H:i:s')
            ),
            array(
                'campo' => "c.tipo",
                'operador' => "=",
                'valor' => 'Teste'
            ),
            array(
                'campo' => "c.situacao_cliente",
                'operador' => "=",
                'valor' => 'Ativo'
            )
        ));
        return $loginsAtivos;
    }


    private function buscar_clientes_vencidos()
    {

        //Carrega Tabelas
        $this->load->model("cliente_model");

        return $this->cliente_model->buscarClientesVencidos(array(
            array(
                'campo' => "rc.id_revenda",
                'operador' => null,
                'valor' => $this->session->userdata("id_revenda")
            ),
            array(
                'campo' => "l.validade",
                'operador' => "<",
                'valor' => date('Y-m-d H:i:s')
            ),
            array(
                'campo' => "c.tipo",
                'operador' => "=",
                'valor' => 'Cliente'
            ),
            array(
                'campo' => "c.situacao_cliente",
                'operador' => "=",
                'valor' => 'Ativo'
            )
        ));


    }


    public function correspondente()
    {
        $this->load->library("autenticacao");

        //Caso o usuário esteja logado exibe a tela do sistema
        $data = array();

        $this->load->model("correspondente_model");
        $idUsuario = $this->session->userdata("id_usuario");

        $dadosCorrespondente = $this->correspondente_model->getAll(array(array(
            'campo' => "u.id",
            'operador' => "=",
            'valor' => $idUsuario
        )));

        $data['dadosCorrespondente'] = $dadosCorrespondente[0];
        $data['comarcas'] = $this->correspondente_model->getComarcas($dadosCorrespondente[0]['id_correspondente']);

        $this->template->controlesite("painel_site/home_correspondente_view", $data);
    }


    public function situacao_servidor($ip, $porta)
    {
        /*
                $ip = 'cs.oficialcs.com.br';

                $porta = '301';*/
        //ip do servidor onde esta IP padrão localhost
        //troque onde está PORTA DO SERVIDOR pelo ip do server ex:EasyPHP | porta:3306
        $fp = @fsockopen($ip, $porta, $errno, $errstr, 1);
        if ($fp >= 1) {
            return array('situacao' => 'ONLINE', 'msg' => 'Nosso Servidor está operando normalmente neste momento.');
        } else {
            return array('situacao' => 'OFF-LINE', 'msg' => 'Nosso Servidor está passando por manutenções neste momento.');
        }
    }

    public function cadastro($dados)
    {

        $this->load->library("autenticacao");


        /*
            $idCorrespondente = $this->input->post("id_correspondente");
            $idEstado = $this->input->post("id_estado");
            $idCidade = $this->input->post("id_cidade");

            //Insere a comarca ao correspondente
            $this->load->model( "correspondente_model" );
            $this->correspondente_model->insertComarca(array('id_correspondente'=> $idCorrespondente,
                'id_estado_atuacao' => $idEstado,
                'id_cidade_atuacao' => $idCidade));
            echo json_encode(array('classe'=> 'acerto', "id"=> $id,'msg' => "Comarca vinculada com sucesso!",'url'=> base_url('painel/comarca')));
            exit();
        */
        //Caso o usuário esteja logado exibe a tela do sistema
        $data = array();

        $this->load->model("correspondente_model");
        $idUsuario = $this->session->userdata("id_usuario");

        $dadosCorrespondente = $this->correspondente_model->getAll(array(array(
            'campo' => "u.id",
            'operador' => "=",
            'valor' => $idUsuario
        )));

        $data['dadosCorrespondente'] = $dadosCorrespondente[0];

        $this->load->model("estado_model");
        $data['estados'] = $this->estado_model->getAll();

        $this->template->controlesite("painel_site/cadastro_correspondente_view", $data);
    }

    public function atualizar_meu_cadastro()
    {
        //Código do COrrespondente
        $idCorrespondente = $_REQUEST['id_correspondente'];

        //Certificado Digital
        $certificado = 0;
        if (!empty($_REQUEST['certificado_digital']) && 'on' == $_REQUEST['certificado_digital'])
            $certificado = 1;

        //Grava dados do Correspondente
        $dadosCorrespondente = array(
            'certificado_digital' => $certificado,
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
        $this->load->model("correspondente_model");
        $this->correspondente_model->update($idCorrespondente, $dadosCorrespondente);

        echo json_encode(array('classe' => 'acerto', 'msg' => "Cadastro atualizado com sucesso!", 'url' => base_url('painel/cadastro')));
    }


    public function comarca($dados)
    {

        $this->load->library("autenticacao");

        $acao = $this->input->post("action");
        $id = $this->input->post("id");

        if ($acao == 'delete') {
            $this->load->model("correspondente_model");
            $this->correspondente_model->desvincularComarca($id);
            echo json_encode(array('classe' => 'acerto', "id" => $id, 'msg' => "Comarca desvinculada com sucesso!", 'url' => base_url('painel/comarca')));
            exit();
        } elseif ($acao == 'inserir') {
            $idCorrespondente = $this->input->post("id_correspondente");
            $idEstado = $this->input->post("id_estado");
            $idCidade = $this->input->post("id_cidade");

            //Insere a comarca ao correspondente
            $this->load->model("correspondente_model");
            $this->correspondente_model->insertComarca(array('id_correspondente' => $idCorrespondente,
                'id_estado_atuacao' => $idEstado,
                'id_cidade_atuacao' => $idCidade));
            echo json_encode(array('classe' => 'acerto', "id" => $id, 'msg' => "Comarca vinculada com sucesso!", 'url' => base_url('painel/comarca')));
            exit();
        }

        //Caso o usuário esteja logado exibe a tela do sistema
        $data = array();

        $this->load->model("correspondente_model");
        $idUsuario = $this->session->userdata("id");

        $dadosCorrespondente = $this->correspondente_model->getAll(array(array(
            'campo' => "u.id",
            'operador' => "=",
            'valor' => $idUsuario
        )));

        $data['dadosCorrespondente'] = $dadosCorrespondente[0];
        $data['comarcas'] = $this->correspondente_model->getComarcas($dadosCorrespondente[0]['id_correspondente']);
        $this->load->model("estado_model");
        $data['estados'] = $this->estado_model->getAll();

        $this->template->controlesite("painel_site/comarcas_correspondente_view", $data);


    }

    public function financeiro($dados)
    {
        //Caso o usuário esteja logado exibe a tela do sistema
        $data = array();
        $this->load->library("autenticacao");

        $acao = $this->input->post("action");
        $id = $this->input->post("id");

        if ($acao == 'delete') {
            $this->load->model("correspondente_model");
            $this->correspondente_model->desvincularComarca($id);
            echo json_encode(array('classe' => 'acerto', "id" => $id, 'msg' => "Comarca desvinculada com sucesso!", 'url' => base_url('painel/comarca')));
            exit();
        }


        $this->load->model("historico_pagamento_model");
        $idUsuario = $this->session->userdata("id");

        $data['pagamentos'] = $this->historico_pagamento_model->getAll(array(array(
            'campo' => "hp.id_usuario",
            'operador' => "=",
            'valor' => $idUsuario
        )));

        $this->template->controlesite("painel_site/financeiro_correspondente_view", $data);


    }


    public function correspondente_logar()
    {

        $this->load->model("login_model");

        $usuario = $this->input->post("usuario");
        $senha = $this->input->post("senha");
        if (empty($usuario) || empty($senha)) {
            redirect("painel/correspondente_login");
            //echo json_encode(array('classe'=> 'erro', 'msg' => 'Por favor, preencha o Login e senha.'));
        }
        if ($this->login_model->verificaLogin($usuario, $senha)) {
            echo json_encode(array('classe' => 'acerto', 'msg' => "Usuário logado com sucesso!", 'url' => base_url('painel/correspondente')));

        } else {
            echo json_encode(array('classe' => 'erro', 'msg' => "Usuário ou senha invalidos"));
        }
    }

    public function alterar_senha()
    {

        $this->load->model("login_model");

        //Código do Usuário
        $idUsuario = $this->session->userdata("id_usuario");

        //Se a nova senha foi informada
        if (!empty($_REQUEST['nova_senha'])) {
            //Verificar a Senha Atual
            $verificarSenha = $this->login_model->verificarSenha($idUsuario, $_REQUEST['senha_atual']);

            if (empty($verificarSenha)) {
                echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao alterar, senha atual não confere!", 'url' => base_url('revenda/configuracoes_usuario')));
                exit();
            }

            //Atualiza nova senha
            $this->login_model->updateSenha($idUsuario, md5($_REQUEST['nova_senha']));
            echo json_encode(array('classe' => 'acerto', 'msg' => "Senha atualizada com sucesso.", 'url' => base_url('login/sair')));
            exit();

        }
    }

    public function upload_foto()
    {
        $this->load->model("usuario_model");
        //$this->load->model("revenda_model");
        if ($img = $this->usuario_model->uploadFoto('uploadfoto')) {
            //Atualiza o Link da Foto
            $this->usuario_model->updateFoto($this->session->userdata("id"), $img);
            redirect(base_url('index.php/usuario/minhaconta'));
            //echo json_encode(array('classe'=> 'acerto', 'msg' => "Foto atualizada com sucesso.",'url'=> base_url('revenda/configuracoes_usuario')));
        } else {
            redirect(base_url('index.php/usuario/minhaconta'));
            //echo json_encode(array('classe'=> 'erro', 'msg' => "Erro ao atulizar Foto.",'url'=> base_url('revenda/configuracoes_usuario')));
        }
    }

    public function salva_nova_senha()
    {


        $senhaAtual = $this->input->post("senha_atual");
        $novaSenha = $this->input->post("senha");

        $this->load->model("login_model");

        //ID DO USUARIO
        $idUsuario = $this->session->userdata("id");
        $verificarSenha = $this->login_model->verificarSenha($idUsuario, $senhaAtual);

        if (empty($verificarSenha)) {
            echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao alterar, senha atual não confere!", 'url' => base_url('painel/alterar_senha')));
            exit();
        }

        //Atualiza nova senha
        $this->login_model->updateSenha($idUsuario, $novaSenha);

        echo json_encode(array('classe' => 'acerto', 'msg' => "Senha atualizada com sucesso.", 'url' => base_url('painel/correspondente')));
    }

    public function alterar_ssenha()
    {
        $data = array();
        $this->template->controlesite("painel_site/senha_correspondente_view", $data);
    }


    public function correspondente_login()
    {
        $data = array();
        $this->template->controlesite("painel_site/login_correspondente_view", $data);
    }


    public function confirmacao_funcionario($idAgendaHomologacao, $novaTentativa)
    {
        $this->load->model("agenda_model");

        $data['tentativas'] = $this->agenda_model->getTentativasConfirmacaoFuncionarioPorHomologacao($idAgendaHomologacao);
        $data['id_agenda_homologacao'] = $idAgendaHomologacao;
        $data['nova_tentativa'] = $novaTentativa;
        $data["titulo"] = "Confirmação Funcionário";
        echo $this->load->view("agenda/agenda_modal_confirmacao_funcionario_view", $data, true);
    }

    public function confirmacao_gestor($idAgendaHomologacao, $novaTentativa)
    {
        $this->load->model("agenda_model");

        $data['tentativas'] = $this->agenda_model->getTentativasConfirmacaoGestorPorHomologacao($idAgendaHomologacao);
        $data['id_agenda_homologacao'] = $idAgendaHomologacao;
        $data['nova_tentativa'] = $novaTentativa;
        $data["titulo"] = "Confirmação Gestor";
        echo $this->load->view("agenda/agenda_modal_confirmacao_gestor_view", $data, true);
    }

    public function motivo_pendencia($idAgendaHomologacao)
    {

        $this->load->model("agenda_model");

        //$data['tentativas'] = $this->agenda_model->getTentativasConfirmacaoGestorPorHomologacao($idAgendaHomologacao);
        $this->load->model("motivo_pendencia_model");
        $filtro_motivo[0] = array(
            'campo' => "motivo_pendencia.ativo",
            'operador' => null,
            'valor' => 1
        );
        $filtro_motivo[1] = array(
            'campo' => "motivo_pendencia.id_motivo_pendencia_principal",
            'operador' => null,
            'valor' => 0
        );

        $data['motivos_principais'] = $this->motivo_pendencia_model->getMotivos($filtro_motivo);
        $data['id_agenda_homologacao'] = $idAgendaHomologacao;
        $data["titulo"] = "Motivos da Pendência";

        echo $this->load->view("agenda/agenda_modal_motivo_pendencia_view", $data, true);
    }

    public function exibir_motivo_pendencia($idPendencia)
    {

        $this->load->model("agenda_model");

        $dadosHomologacaoPendente = $this->agenda_model->getHomologacaoPendente($idPendencia);


        $this->load->model("motivo_pendencia_model");
        $filtro_motivo[0] = array(
            'campo' => "hpm.id_agenda_homologacao",
            'operador' => null,
            'valor' => $dadosHomologacaoPendente[0]['id_agenda_homologacao']
        );


        $data['dados_homologacao_pendente'] = $dadosHomologacaoPendente[0];
        $data['motivosSelecionados'] = $this->motivo_pendencia_model->getMotivosPorHomologacao($filtro_motivo);
        $data['id_agenda_homologacao'] = $dadosHomologacaoPendente[0]['id_agenda_homologacao'];
        $data["titulo"] = "Motivos da Pendência";

        echo $this->load->view("agenda/agenda_modal_exibir_motivo_pendencia_view", $data, true);
    }


    public function confirmacao_gestor_gerente($idAgendaHomologacao, $novaTentativa, $sucessoContato)
    {
        $this->load->model("agenda_model");

        $data['id_agenda_homologacao'] = $idAgendaHomologacao;
        $data['nova_tentativa'] = $novaTentativa;
        $data['sucesso_contato'] = $sucessoContato;
        $data["titulo"] = "Confirmação Gestor";
        echo $this->load->view("agenda/agenda_modal_confirmacao_gerente_gestor_view", $data, true);
    }

    public function documentacao_digital($idAgendaHomologacao)
    {
        $this->load->model("agenda_model");

        $data['id_agenda_homologacao'] = $idAgendaHomologacao;
        $filtro[0] = array(
            'campo' => "agenda_homologacao.id",
            'operador' => null,
            'valor' => $idAgendaHomologacao
        );
        $homologacao = $this->agenda_model->getHomologacaoAll($filtro);

        $data['recebimento_doc_gestor'] = $homologacao[0]['recebimento_doc_gestor'];
        // print_r($homologacao);

        $data['pasta_documento'] = $homologacao[0]['pasta_documento'];
        $data["titulo"] = "Documentação";
        echo $this->load->view("agenda/agenda_documentacao_digital_view", $data, true);
    }


    public function registro($id = null)
    {
        /*
        $data["privilegios"] = $this->usuario_model->getPrivilegios( $id_usuario );
*/
        $data = array();
        echo $this->load->view("agenda/agenda_modal_view", $data, true);
    }

    /* Ajax */
    public function salva_status()
    {
        $erro = false;

        $id = $this->input->post('id');

        $kit_preposto = $this->input->post("kit_preposto");
        $pre_agenda = $this->input->post("preagenda");
        $exam_demissional = "N/D";//$this->input->post("exam_demissional");
        $envio_doc_prepos = "N/D";// $this->input->post("envio_doc_prepos");
        $apto_envio = "N/D"; //$this->input->post("apto_envio");
        $protocolo = $this->input->post("protocolo");
        $acao = "N/D"; //$this->input->post("acao");
        $envio_sms = $this->input->post("envio_sms");

        $andamento = null;

        $this->load->model("agenda_model");

        if ($id != null) {

            // Trazer infos do Preposto, Ex-funcionários
            $this->load->model("agenda_model");

            /*
            $this->load->model("exfuncionarios_model");
            $this->load->model("sindicatos_model");
            $this->load->model("prepostos_model");

            $info_agenda    = $this->agenda_model->getById( $id );
            $info_exfunc    = $this->exfuncionarios_model->getById( $info_agenda['id_exfuncionario'] );
            $info_sindicato = $this->exfuncionarios_model->getById( $info_exfunc['id_sindicato'] );
            */

            $homologacao = $this->agenda_model->getHomologacao($id);

            /*
            if ($homologacao[ count($homologacao)-1 ]['id_preposto']!=null)
            {
                $info_preposto = $this->prepostos_model->getById( $homologacao[ count($homologacao)-1 ]['id_preposto'] );

                if ($kit_preposto=="on")
                {
                    $arquivos = $this->agenda_model->arquivosKit( $id );

                    if (count($arquivos)>0) {
                        $this->load->model("email_model");
                        $this->email_model->enviaEmailKit( $info_preposto, $info_exfunc, $homologacao[ count($homologacao)-1 ], $info_sindicato, $arquivos );
                    }
                }

                if ($exam_demissional=="on")
                {
                    $arquivos_exame = $this->agenda_model->arquivosExame( $id );

                    if (count($arquivos_exame)>0) {
                        $this->load->model("email_model");
                        $this->email_model->enviaEmailExame( $info_preposto, $info_exfunc, $homologacao[ count($homologacao)-1 ], $info_sindicato, $arquivos_exame );
                    }
                }
            }
            */

            if ($homologacao[count($homologacao) - 1]['telegrama'] == 0 && $kit_preposto == '' && $envio_doc_prepos == '') {
                $andamento = 2;
            }

            if ($kit_preposto == 'on' && $homologacao[count($homologacao) - 1]['telegrama'] == 1 && $pre_agenda == 'on'/*&& $apto_envio==false && $envio_doc_prepos==false*/) {
                $andamento = 3;
            }


            if ($homologacao[count($homologacao) - 1]['confirmacao_funcionario'] == 1 && $homologacao[count($homologacao) - 1]['confirmacao_preposto'] == 1 && $homologacao[count($homologacao) - 1]['envio_sms'] == 1 /*&& ($apto_envio=='' || $envio_doc_prepos=='')*/) {
                $andamento = 4;
            }
            if ($homologacao[count($homologacao) - 1]['recebimento_doc_gestor'] == 1 && $homologacao[count($homologacao) - 1]['doc_digitalizada'] == 1 && $protocolo == null) {
                $andamento = 5;
            }
            if ($homologacao[count($homologacao) - 1]['recebimento_doc_gestor'] == 1 && $homologacao[count($homologacao) - 1]['doc_digitalizada'] == 1 && $protocolo != null) {
                $andamento = 6;
            }
            /*
                        if ($apto_envio=='on' && $envio_doc_prepos=='on' && $homologacao[ count($homologacao)-1 ]['doc_digitalizada']==1 && $protocolo!=null) {
                            $andamento = 5;
                        }*/

            //echo "<pre>"; print_r($envio_sms); exit();

            $this->agenda_model->update(
                $id,
                $kit_preposto,
                $exam_demissional,
                $envio_doc_prepos,
                $apto_envio,
                $protocolo,
                $acao,
                $envio_sms,
                "N/D",
                "N/D",
                $pre_agenda
            );

            // if (/* $info_telegrama && $info_telegrama && $info_conf_func && $info_conf_prepos &&*/
            //     ($apto_envio!=null || $apto_envio=="" || $apto_envio==0) || ($protocolo!=null || $protocolo=="" || $protocolo==0)) {
            //     $andamento = 5;
            // }

            if ($andamento != null) {
                $this->agenda_model->updateAndamento($id, $andamento);
            }

            echo $andamento;
            //echo "<pre>"; print_r($_POST); exit();
        }
    }

    public function envia_documentos()
    {
        $erro = false;

        $id = $this->input->post('id');

        $kit_preposto = $this->input->post("kit_preposto");
        $exam_demissional = $this->input->post("exam_demissional");

        if ($id != null) {

            // Trazer infos do Preposto, Ex-funcionários
            $this->load->model("agenda_model");
            $this->load->model("exfuncionarios_model");
            $this->load->model("sindicatos_model");
            $this->load->model("prepostos_model");

            $info_agenda = $this->agenda_model->getById($id);
            $info_exfunc = $this->exfuncionarios_model->getById($info_agenda['id_exfuncionario']);
            $info_sindicato = $this->sindicatos_model->getById($info_exfunc['id_sindicato']);

            $homologacao = $this->agenda_model->getHomologacao($id);
            $homologacao[count($homologacao) - 1]['id_motivo'] = $info_agenda['id_motivo'];

            if ($homologacao[count($homologacao) - 1]['id_preposto'] != null) {
                $info_preposto = $this->prepostos_model->getById($homologacao[count($homologacao) - 1]['id_preposto']);

                /*if ($kit_preposto=="on")
                {*/
                $arquivos = $this->agenda_model->arquivosKit($id);

                if (count($arquivos) > 0) {
                    $this->load->model("email_model");
                    $this->email_model->enviaEmailKit($info_preposto, $info_exfunc, $homologacao[count($homologacao) - 1], $info_sindicato, $arquivos);
                } else {
                    $this->load->model("email_model");
                    $this->email_model->enviaEmailKitSemAnexo($info_preposto, $info_exfunc, $homologacao[count($homologacao) - 1], $info_sindicato);
                }

                $this->agenda_model->update(
                    $id,
                    "on",
                    "N/D",
                    "N/D",
                    "N/D",
                    "N/D",
                    "N/D",
                    "N/D",
                    "N/D",
                    "N/D",
                    "N/D"
                );
                /*}*/

                if ($exam_demissional == "on") {
                    $arquivos_exame = $this->agenda_model->arquivosExame($id);

                    if (count($arquivos_exame) > 0) {
                        $this->load->model("email_model");
                        $this->email_model->enviaEmailExame($info_preposto, $info_exfunc, $homologacao[count($homologacao) - 1], $info_sindicato, $arquivos_exame);
                    } else {
                        $this->load->model("email_model");
                        $this->email_model->enviaEmailExameSemAnexo($info_preposto, $info_exfunc, $homologacao[count($homologacao) - 1], $info_sindicato);
                    }
                }
            }
        }
    }

    /*
     * antigo / backup
     * public function envia_documentos_kit()
    {
        $erro=false;

        $id = $this->input->post('id');

        $kit_preposto       = $this->input->post("kit_preposto");

        if ($id!=null) {

            // Trazer infos do Preposto, Ex-funcionários
            $this->load->model("agenda_model");
            $this->load->model("exfuncionarios_model");
            $this->load->model("sindicatos_model");
            $this->load->model("prepostos_model");
            $this->load->model("gestores_model");

            $info_agenda    = $this->agenda_model->getById( $id );
            $info_exfunc    = $this->exfuncionarios_model->getById( $info_agenda['id_exfuncionario'] );
            $info_sindicato = $this->sindicatos_model->getById( $info_exfunc['id_sindicato'] );

            $homologacao    = $this->agenda_model->getHomologacao( $id );

            if ($homologacao[ count($homologacao)-1 ]['id_gestor']!=null)
            {
                //$info_preposto = $this->prepostos_model->getById( $homologacao[ count($homologacao)-1 ]['id_preposto'] );
                $info_gestor = $this->gestores_model->getById( $homologacao[ count($homologacao)-1 ]['id_gestor'] );

                if ($kit_preposto=="on")
                {
                    $arquivos = $this->agenda_model->arquivosKit( $id );

                    if (count($arquivos)>0) {
                        $this->load->model("email_model");
                        $this->email_model->enviaEmailKit( $info_gestor, $info_exfunc, $homologacao[ count($homologacao)-1 ], $info_sindicato, $arquivos);
                    }else{
                        $this->load->model("email_model");
                        $this->email_model->enviaEmailKitSemAnexo( $info_gestor, $info_exfunc, $homologacao[ count($homologacao)-1 ], $info_sindicato);
                    }
                }
            }
        }
    }
     * */

    public function envia_documentos_kit()
    {
        $erro = false;

        $id = $this->input->post('id');

        $kit_preposto = $this->input->post("kit_preposto");

        if ($id != null) {

            // Trazer infos do Preposto, Ex-funcionários
            $this->load->model("agenda_model");
            $this->load->model("exfuncionarios_model");
            $this->load->model("sindicatos_model");
            $this->load->model("prepostos_model");
            $this->load->model("gestores_model");

            $info_agenda = $this->agenda_model->getById($id);
            $info_exfunc = $this->exfuncionarios_model->getById($info_agenda['id_exfuncionario']);
            $info_sindicato = $this->sindicatos_model->getById($info_exfunc['id_sindicato']);

            $homologacao = $this->agenda_model->getHomologacao($id);
            $homologacao[count($homologacao) - 1]['id_motivo'] = $info_agenda['id_motivo'];

            if ($homologacao[count($homologacao) - 1]['id_gestor'] != null) {
                //$info_preposto = $this->prepostos_model->getById( $homologacao[ count($homologacao)-1 ]['id_preposto'] );
                $info_gestor = $this->gestores_model->getById($homologacao[count($homologacao) - 1]['id_gestor']);

                /*
                if ($kit_preposto=="on")
                {*/
                $arquivos = $this->agenda_model->arquivosKit($homologacao[count($homologacao) - 1]['id']);

                //if (count($arquivos)>0) {
                $this->load->model("email_model");
                $this->email_model->enviaEmailKit($info_gestor, $info_exfunc, $homologacao[count($homologacao) - 1], $info_sindicato, $arquivos);
                //}else{
                //    $this->load->model("email_model");
                //    $this->email_model->enviaEmailKitSemAnexo( $info_gestor, $info_exfunc, $homologacao[ count($homologacao)-1 ], $info_sindicato);
                //}

                $this->agenda_model->updateKitPreposto($homologacao[count($homologacao) - 1]['id'], 1);


                /*}*/
            }
        }
    }

    public function envia_documentos_preagenda()
    {
        $erro = false;

        $id = $this->input->post('id');

        $pre_agenda = $this->input->post("preagenda");

        if ($id != null) {

            // Trazer infos do Preposto, Ex-funcionários
            $this->load->model("agenda_model");
            $this->load->model("exfuncionarios_model");
            $this->load->model("sindicatos_model");
            $this->load->model("prepostos_model");
            $this->load->model("gestores_model");

            $info_agenda = $this->agenda_model->getById($id);
            $info_exfunc = $this->exfuncionarios_model->getById($info_agenda['id_exfuncionario']);
            $info_sindicato = $this->sindicatos_model->getById($info_exfunc['id_sindicato']);

            $homologacao = $this->agenda_model->getHomologacao($id);
            if ($homologacao[count($homologacao) - 1]['id_gestor'] != null) {
                $info_gestor = $this->gestores_model->getById($homologacao[count($homologacao) - 1]['id_gestor']);

                $this->agenda_model->updatePreAgenda($homologacao[count($homologacao) - 1]['id'], 1);

                if (!empty($info_gestor['id'])) {
                    $this->load->model("gestores_model");
                    $info_gestor = $this->gestores_model->getById($info_gestor['id']);
                    $telefoneGestor = str_replace("(", "", $info_gestor['celular']);
                    $telefoneGestor = str_replace(")", "", $telefoneGestor);
                    $telefoneGestor = str_replace("-", "", $telefoneGestor);
                    $telefoneGestor = str_replace(".", "", $telefoneGestor);
                    $telefoneGestor = str_replace(" ", "", $telefoneGestor);
                    $telefoneGestor = (substr($telefoneGestor, 0, 1) == '0' ? substr($telefoneGestor, 1) : $telefoneGestor);

                    if ($telefoneGestor != null || $telefoneGestor != "0" || $telefoneGestor != "9999999999") {
                        $mensagemGestor = "Homologacao de {$info_agenda['nome_exfuncionario']} agendada para o dia " . $homologacao[count($homologacao) - 1]['data'] . " às " . $homologacao[count($homologacao) - 1]['hora'] . " , no {$info_agenda['razao_social']}. Duvidas ligar(11)30102100.Banco Santander.";

                        $this->load->model("sms_model");
                        $this->sms_model->envio_sms($telefoneGestor, $mensagemGestor);
                    }
                }
                $this->load->model("email_model");
                $this->email_model->enviaEmailKitSemAnexo($info_gestor, $info_exfunc, $homologacao[count($homologacao) - 1], $info_sindicato);
                echo "Email enviado com sucesso!";

            } else {
                echo "Por favor selecione primeiro o gestor";
            }
        }
    }

    public function envia_documentos_exame()
    {
        $erro = false;

        $id = $this->input->post('id');

        $exam_demissional = $this->input->post("exam_demissional");

        if ($id != null) {

            // Trazer infos do Preposto, Ex-funcionários
            $this->load->model("agenda_model");
            $this->load->model("exfuncionarios_model");
            $this->load->model("sindicatos_model");
            //$this->load->model("prepostos_model");
            $this->load->model("gestores_model");

            $info_agenda = $this->agenda_model->getById($id);
            $info_exfunc = $this->exfuncionarios_model->getById($info_agenda['id_exfuncionario']);
            $info_sindicato = $this->sindicatos_model->getById($info_exfunc['id_sindicato']);

            $homologacao = $this->agenda_model->getHomologacao($id);

            if ($homologacao[count($homologacao) - 1]['id_gestor'] != null) {
                //$info_gestor = $this->gestores_model->getById( $homologacao[ count($homologacao)-1 ]['id_preposto'] );
                $info_gestor = $this->gestores_model->getById($homologacao[count($homologacao) - 1]['id_gestor']);

                if ($exam_demissional == "on") {
                    $arquivos_exame = $this->agenda_model->arquivosExame($id);

                    if (count($arquivos_exame) > 0) {
                        $this->load->model("email_model");
                        $this->email_model->enviaEmailExame($info_gestor, $info_exfunc, $homologacao[count($homologacao) - 1], $info_sindicato, $arquivos_exame);
                    } else {
                        $this->load->model("email_model");
                        $this->email_model->enviaEmailExameSemAnexo($info_gestor, $info_exfunc, $homologacao[count($homologacao) - 1], $info_sindicato);
                    }
                }
            }
        }
    }

    public function controlUploadKit()
    {
        $this->load->model("agenda_model");

        $id = $this->input->post("id_agenda");

        $homologacao = $this->agenda_model->getHomologacao($id);

        //echo "<pre>"; print_r($_FILES); exit();

        if ($_FILES['arquivos_kit']['name'][0] != "") {

            echo $this->agenda_model->arqUploadKit($homologacao[count($homologacao) - 1]['id'], "arquivos_kit");
        }
    }

    public function controlUploadExame()
    {
        $this->load->model("agenda_model");

        $id_agenda = $this->input->post("id_agenda");

        $homologacao = $this->agenda_model->getHomologacao($id_agenda);
        print_r($homologacao[count($homologacao) - 1]);
        exit();
        $id = 1;

        //echo "<pre>"; print_r($_FILES); exit();

        if ($_FILES['arquivos_exame']['name'][0] != "") {

            //echo $this->agenda_model->arqUploadExame( $id, "arquivos_exame" );
        }
    }

    public function pdf_telegrama($id_agenda)
    {
        $this->load->model("agenda_model");
        $this->load->model("exfuncionarios_model");
        $this->load->model("sindicatos_model");

        $agenda = $this->agenda_model->getById($id_agenda);

        $data['homologacao'] = $this->agenda_model->getHomologacao($id_agenda);
        $data['exfuncionario'] = $this->exfuncionarios_model->getById($agenda['id_exfuncionario']);
        $data['sindicato'] = $this->sindicatos_model->getById($data['exfuncionario']['id_sindicato']);
        $data['homologacao'][count($data['homologacao']) - 1]['id_motivo'] = $agenda['id_motivo'];

        switch ($agenda['id_motivo']) {
            case 4: // Falecimento
                $htmlEmail = $this->load->view('email/telegrama_padrao', $data, true);
                $htmlPdf = $this->load->view('pdf/telegrama_padrao', $data, true);
                break;
            case 5: // Justa Causa
                $htmlEmail = $this->load->view('email/telegrama_padrao', $data, true);
                $htmlPdf = $this->load->view('pdf/telegrama_padrao', $data, true);
                break;
            case 17: // Justa Causa - Abandono
                $htmlEmail = $this->load->view('email/telegrama_padrao', $data, true);
                $htmlPdf = $this->load->view('pdf/telegrama_padrao', $data, true);
                break;
            default:
                $htmlEmail = $this->load->view('email/telegrama_aposentadoria', $data, true);
                $htmlPdf = $this->load->view('pdf/telegrama_aposentadoria', $data, true);
                break;
        }

        if (!empty($data['exfuncionario']['email'])) {
            $this->load->model("email_model");
            $this->email_model->enviaEmailConteudoTelegrama($data['exfuncionario'], $htmlEmail);
        }

        $this->agenda_model->updateFlagTelegrama($data['homologacao'][count($data['homologacao']) - 1]['id'], 1);

        // Gerar PDF
        $this->load->library('pdflib');

        $this->pdflib->charset_in = 'utf-8';

        // Exibir a pagina inteira no browser
        $this->pdflib->SetDisplayMode('fullpage');

        $this->pdflib->WriteHTML($htmlPdf);

        // define um nome para o arquivo PDF
        $filename = 'telegrama.pdf';

        $this->pdflib->Output($filename, 'I');

    }

    public function envia_sms()
    {
        $this->load->model("agenda_model");
        $this->load->model("exfuncionarios_model");
        $this->load->model("sindicatos_model");

        $id_agenda = $this->input->post("id_agenda");
        $mensagem = $this->input->post("sms");

        $agenda = $this->agenda_model->getById($id_agenda);
        $homologacao = $this->agenda_model->getHomologacao($id_agenda);
        $homologacao[count($homologacao) - 1]['id_motivo'] = $agenda['id_motivo'];

        $exfuncionario = $this->exfuncionarios_model->getById($agenda['id_exfuncionario']);
        $sindicato = $this->sindicatos_model->getById($exfuncionario['id_sindicato']);

        $sindicato_razao = $sindicato['razao_social'];
        $sindicato_endereco = $sindicato['endereco'];
        $data = $homologacao[count($homologacao) - 1]['data'];
        $hora = $homologacao[count($homologacao) - 1]['hora'];

        $telefone = str_replace("(", "", $exfuncionario['celular']);
        $telefone = str_replace(")", "", $telefone);
        $telefone = str_replace("-", "", $telefone);
        $telefone = str_replace(".", "", $telefone);
        $telefone = str_replace(" ", "", $telefone);
        $telefone = (substr($telefone, 0, 1) == '0' ? substr($telefone, 1) : $telefone);

        if ($telefone != null || $telefone != "0" || $telefone != "9999999999") {

            $this->load->model("sms_model");
            $this->sms_model->envio_sms($telefone, $mensagem);

            //redirect("exfuncionarios");
        }
        if (!empty($exfuncionario['email'])) {
            $this->load->model("email_model");
            $this->email_model->enviaEmailConteudoSms($exfuncionario, $homologacao[count($homologacao) - 1], $sindicato);
        }
        $this->agenda_model->updateFlagSms($homologacao[count($homologacao) - 1]['id'], 1);
    }

    public function envia_email_teste()
    {
        echo "ENTRO";

        $this->load->model("email_model");
        $this->email_model->enviaEmailTeste();
    }


    /*function enviarAnexoKit() {

        // verificar

        $Assunto  = "Contato - Trabalhe Conosco";
        $Mensagem = $this->load->view("email/msg_padrao", $data, true);

        $this->load->library('upload');

        //echo "<pre>"; print_r( $_FILES ); exit();

        if ($_FILES['arquivos_kit']['size'] > 0) {

            $aConfig['upload_path']   = './uploads/kits_preposto/';
            $aConfig['allowed_types'] = '*';
            $aConfig['max_size']      = '5000';
            $aConfig['max_width']     = '1920';
            $aConfig['max_height']    = '1080';

            $this->upload->initialize( $aConfig );

            if ($this->upload->do_upload( "arquivos_kit" )) {

                $info = $this->upload->data();
                $fpath = $info['file_path'] . $info['file_name'];

                $Anexos[] = $fpath;
            } else {
                $Anexos = null;
            }
        } else {
            $Anexos = null;
        }

        $this->load->model("email_model");

        if ( !$this->email_model->EnviarEmailAnexo($Assunto, $Mensagem, $Anexos) ) {

            $this->session->set_userdata("erro", "Não foi possivel enviar! Tente novamente mais tarde!");
        }
    }

    function enviarAnexoExame() {

        $Assunto  = "Contato - Trabalhe Conosco";
        $Mensagem = $this->load->view("email/msg_padrao", $data, true);

        $this->load->library('upload');

        //echo "<pre>"; print_r( $_FILES ); exit();

        if ($_FILES['arquivos_exame']['size'] > 0) {

            $aConfig['upload_path']   = './uploads/exame_demissional/';
            $aConfig['allowed_types'] = '*';
            $aConfig['max_size']      = '5000';
            $aConfig['max_width']     = '1920';
            $aConfig['max_height']    = '1080';

            $this->upload->initialize( $aConfig );

            if ($this->upload->do_upload( "arquivos_exame" )) {

                $info = $this->upload->data();
                $fpath = $info['file_path'] . $info['file_name'];

                $Anexos[] = $fpath;
            } else {
                $Anexos = null;
            }
        } else {
            $Anexos = null;
        }

        $this->load->model("email_model");

        if ( !$this->email_model->EnviarEmailAnexo($Assunto, $Mensagem, $Anexos) ) {

            $this->session->set_userdata("erro", "Não foi possivel enviar! Tente novamente mais tarde!");
        }

        redirect("site/trabalhe");
    }*/
}

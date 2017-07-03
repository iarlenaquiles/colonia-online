<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class processo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code

        //Carrega Tabelas
        $this->load->model("processo_model");


        $this->load->library('funcoes');

    }

    public function index()
    {
        $this->listar();
    }

    public function cadastrar()
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        $this->load->model( "estado_model" );
        $data['estados'] = $this->estado_model->getAll();


        $this->template->controlearquivo("processo/cadastrar", $data);
    }

    public function partes($id)
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        $data['processo'] = $this->processo_model->getById($id);
        $data['parteCliente'] = $this->processo_model->getParteCliente($id);
        $data['outraParte'] = $this->processo_model->getOutraParte($id);

        $data['pendencias'] = $this->processo_model->getPendenciasByProcesso($id);
        $this->template->controlearquivo("processo/partes", $data);
    }

    public function completo($id)
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        $data['processo'] = $this->processo_model->getById($id);
        $data['parteCliente'] = $this->processo_model->getParteCliente($id);
        $data['outraParte'] = $this->processo_model->getOutraParte($id);

        $this->load->model( "tipo_justica_model" );
        $data['tipos_justica'] = $this->tipo_justica_model->getAll();

        $this->load->model( "tipo_processo_model" );
        $data['tipos_processo'] = $this->tipo_processo_model->getAll();

        $this->load->model( "procedimento_model" );
        $data['procedimentos'] = $this->procedimento_model->getAll();

        $this->load->model( "desfecho_processo_model" );
        $data['desfechos_processo'] = $this->desfecho_processo_model->getAll();

        $this->load->model( "resultado_recurso_model" );
        $data['resultados_recurso'] = $this->resultado_recurso_model->getAll();


        $this->load->model( "situacao_processo_model" );
        $data['situacoes_processo'] = $this->situacao_processo_model->getAll();


        $this->load->model( "usuario_model" );
        $data['responsaveis'] = $this->usuario_model->getUsuariosResponsaveis($this->session->userdata("id_usuario_principal"));


        $this->load->model( "estado_model" );
        $data['estados'] = $this->estado_model->getAll();

        $data['pendencias'] = $this->processo_model->getPendenciasByProcesso($id);
        $data['peticoes'] = $this->processo_model->getPeticoesByProcesso($id);
        $data['andamento'] = $this->processo_model->getAndamento($id);
        $data['eventos'] = $this->processo_model->getEventos($id);
        $data['anexos'] = $this->processo_model->getAnexos($id);
        $this->template->controlearquivo("processo/completo", $data);
    }

    public function pendencias($id)
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        $data['processo'] = $this->processo_model->getById($id);

        $data['pendencias'] = $this->processo_model->getPendenciasByProcesso($id);
        $this->template->controlearquivo("processo/pendencias", $data);
    }

    public function nova_peticao($id)
    {
        $this->session->set_userdata(array('aba_atual' => 'peticoes'));
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        $data['processo'] = $this->processo_model->getById($id);

        //Carrega Tabelas
        $this->load->model("ramo_direito_model");

        $filtrosRD[] = array(
            'campo' => "rd.ativo",
            'operador' => null,
            'valor' => 1
        );
        $data['ramos_direito'] = $this->ramo_direito_model->getAll($filtrosRD);
        $this->template->controlearquivo("processo/nova_peticao", $data);
    }

    public function eventos($id)
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        $data['processo'] = $this->processo_model->getById($id);

        $data['eventos'] = $this->processo_model->getEventos($id);
        $this->template->controlearquivo("processo/eventos", $data);
    }

    public function anexos($id)
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        $data['processo'] = $this->processo_model->getById($id);

        $data['anexos'] = $this->processo_model->getAnexos($id);
        $this->template->controlearquivo("processo/anexos", $data);
    }

    public function andamento($id)
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        $data['processo'] = $this->processo_model->getById($id);

        $data['andamento'] = $this->processo_model->getAndamento($id);
        $this->template->controlearquivo("processo/andamento", $data);
    }

    public function upload_anexo()
    {
        $this->session->set_userdata(array('aba_atual' => 'anexos'));
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        if ($xml = $this->processo_model->uploadAnexo('uploadanexo')) {
            echo $xml;
        } else {
            echo 'false';
        }
    }


    public function salvar_anexo(){
        $this->session->set_userdata(array('aba_atual' => 'anexos'));
        if(!empty($_REQUEST['id_processo_anexo']))
        {
            //EDITA
            if(!empty($_REQUEST['excluir'])){

                $processo_anexo = $this->processo_model->getByIdAnexo($_REQUEST['id_processo_anexo']);
                unlink($processo_anexo['caminho_anexo']);
                $this->processo_model->deleteAnexo($_REQUEST['id_processo_anexo']);
                echo json_encode(array('classe' => 'acerto', 'msg' => "Anexo excluído com sucesso.",'url'=> base_url('processo/completo')."/".$_REQUEST['id_processo']));

            }
        }else{
            //Inserir Novo registro
            $idProcessoAnexo = $this->processo_model->insert_anexo(array(
                'id_processo' => $_REQUEST['id_processo'],
                'nome_anexo' => $_REQUEST['nome_anexo'],
                'caminho_anexo' => $_REQUEST['anexo'],
                'data_cadastro'=> date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => $this->session->userdata("id_usuario")
            ));
            echo json_encode(array('classe' => 'acerto', 'msg' => "Anexo cadastrado com sucesso.",'url'=> base_url('processo/completo')."/".$_REQUEST['id_processo']));
        }
    }

    public function peticao($id)
    {
        $this->session->set_userdata(array('aba_atual' => 'peticoes'));

        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();
        $dadosPeticao = $this->processo_model->getDadosPeticaoById($id);

        $modeloMigrado = $this->migrar_dados_peticao($dadosPeticao);
        $data['registro'] = $dadosPeticao;
        $data['modelo_novo'] = nl2br($modeloMigrado);
        $this->template->controlearquivo("processo/peticao", $data);
    }

    public function peticao_pdf($id)
    {
        $this->session->set_userdata(array('aba_atual' => 'peticoes'));

        //Verificação da Sessão de Login
        $this->load->library("autenticacao");
        $this->load->library("mpdf");

        $data = array();
        $dadosPeticao = $this->processo_model->getDadosPeticaoById($id);
        $nomeArquivo =  $dadosPeticao['codigo_processo_interno']."-".$dadosPeticao['ano_processo_interno']."-".$dadosPeticao['nome_tipo_peticao'].".pdf";

        // Instancia a classe mPDF
        $mpdf = new mPDF();
        // Ao invés de imprimir a view 'welcome_message' na tela, passa o código
        // HTML dela para a variável $html
        $html = $dadosPeticao['peticao_html'];// $this->load->view('welcome_message','',TRUE);
        // Define um Cabeçalho para o arquivo PDF
        //$mpdf->SetHeader('Gerando PDF no CodeIgniter com a biblioteca mPDF');
        // Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
        // página através da pseudo-variável PAGENO
        $mpdf->SetFooter('{PAGENO}');
        // Insere o conteúdo da variável $html no arquivo PDF
        $mpdf->writeHTML($html);
        // Cria uma nova página no arquivo
        //$mpdf->AddPage();
        // Insere o conteúdo na nova página do arquivo PDF
        //$mpdf->WriteHTML();
        // Gera o arquivo PDF
        $mpdf->Output($nomeArquivo,"D");
        //$this->template->controlearquivo("processo/peticao", $data);
    }

    public function migrar_dados_peticao($dadosPeticao)
    {
        //Dados Gerais
        $novoModelo = $dadosPeticao['modelo_original'];
        $novoModelo = str_replace('[#data_cadastro#]',$dadosPeticao['data_cadastro_completa'],$novoModelo);


        //Monta os dados da parte do Cliente
        $parteCliente = $this->processo_model->getParteCliente($dadosPeticao['id_processo']);

        //Percorre todos envolvidos na parte cliente
        foreach($parteCliente as $cliente)
        {
            //Se for Autor
            if('Autor' == $cliente['tipo_pessoa']){
                $novoModelo = str_replace('[#nome_pessoa_autor_cliente#]',$cliente['nome_pessoa'],$novoModelo);
                $novoModelo = str_replace('[#cpf_cnpj_autor_cliente#]',$cliente['cpf_cnpj'],$novoModelo);
                $novoModelo = str_replace('[#data_nascimento_autor_cliente#]',$cliente['data_nascimento'] != '0000-00-00'? $this->funcoes->inverteDataBanco($cliente['data_nascimento']):"",$novoModelo);
                $novoModelo = str_replace('[#estado_civil_autor_cliente#]',$cliente['estado_civil'],$novoModelo);
                $novoModelo = str_replace('[#nacionalidade_autor_cliente#]',$cliente['nacionalidade'],$novoModelo);
                $novoModelo = str_replace('[#naturalidade_autor_cliente#]',$cliente['naturalidade'],$novoModelo);
                $novoModelo = str_replace('[#profissao_autor_cliente#]',$cliente['profissao'],$novoModelo);
                $novoModelo = str_replace('[#numero_rg_autor_cliente#]',$cliente['numero_rg'],$novoModelo);
                $novoModelo = str_replace('[#data_expedicao_rg_autor_cliente#]',$cliente['data_expedicao_rg'] != '0000-00-00'?$this->funcoes->inverteDataBanco($cliente['data_expedicao_rg']):"",$novoModelo);
                $novoModelo = str_replace('[#orgao_expedicao_rg_autor_cliente#]',$cliente['orgao_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#estado_expedicao_rg_autor_cliente#]',$cliente['estado_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#numero_ctps_autor_cliente#]',$cliente['numero_ctps'],$novoModelo);
                $novoModelo = str_replace('[#serie_ctps_autor_cliente#]',$cliente['serie_ctps'],$novoModelo);
                $novoModelo = str_replace('[#estado_emissao_ctps_autor_cliente#]',$cliente['estado_emissao_ctps'],$novoModelo);
                $novoModelo = str_replace('[#numero_oab_autor_cliente#]',$cliente['numero_oab'],$novoModelo);
                $novoModelo = str_replace('[#endereco_logradouro_autor_cliente#]',$cliente['endereco_logradouro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_numero_autor_cliente#]',$cliente['endereco_numero'],$novoModelo);
                $novoModelo = str_replace('[#endereco_bairro_autor_cliente#]',$cliente['endereco_bairro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_complemento_autor_cliente#]',$cliente['endereco_complemento'],$novoModelo);
                $novoModelo = str_replace('[#estado_autor_cliente#]',$cliente['nome_estado'],$novoModelo);
                $novoModelo = str_replace('[#cidade_autor_cliente#]',$cliente['nome_cidade'],$novoModelo);
                $novoModelo = str_replace('[#cep_autor_cliente#]',$cliente['cep'],$novoModelo);
                $novoModelo = str_replace('[#telefones_autor_cliente#]',$cliente['telefones'],$novoModelo);
                $novoModelo = str_replace('[#email_autor_cliente#]',$cliente['email'],$novoModelo);
                $novoModelo = str_replace('[#nome_pai_autor_cliente#]',$cliente['nome_pai'],$novoModelo);
                $novoModelo = str_replace('[#nome_mae_autor_cliente#]',$cliente['nome_mae'],$novoModelo);
                $novoModelo = str_replace('[#observacao_autor_cliente#]',$cliente['observacao'],$novoModelo);
            }
            //Se for Autor
            else if('Representante' == $cliente['tipo_pessoa']){
                $novoModelo = str_replace('[#nome_pessoa_representante_cliente#]',$cliente['nome_pessoa'],$novoModelo);
                $novoModelo = str_replace('[#cpf_cnpj_representante_cliente#]',$cliente['cpf_cnpj'],$novoModelo);
                $novoModelo = str_replace('[#data_nascimento_representante_cliente#]',$cliente['data_nascimento'] != '0000-00-00'?$this->funcoes->inverteDataBanco($cliente['data_nascimento']):"",$novoModelo);
                $novoModelo = str_replace('[#estado_civil_representante_cliente#]',$cliente['estado_civil'],$novoModelo);
                $novoModelo = str_replace('[#nacionalidade_representante_cliente#]',$cliente['nacionalidade'],$novoModelo);
                $novoModelo = str_replace('[#naturalidade_representante_cliente#]',$cliente['naturalidade'],$novoModelo);
                $novoModelo = str_replace('[#profissao_representante_cliente#]',$cliente['profissao'],$novoModelo);
                $novoModelo = str_replace('[#numero_rg_representante_cliente#]',$cliente['numero_rg'],$novoModelo);
                $novoModelo = str_replace('[#data_expedicao_rg_representante_cliente#]',$cliente['data_expedicao_rg'] != '0000-00-00'?$this->funcoes->inverteDataBanco($cliente['data_expedicao_rg']):"",$novoModelo);
                $novoModelo = str_replace('[#orgao_expedicao_rg_representante_cliente#]',$cliente['orgao_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#estado_expedicao_rg_representante_cliente#]',$cliente['estado_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#numero_ctps_representante_cliente#]',$cliente['numero_ctps'],$novoModelo);
                $novoModelo = str_replace('[#serie_ctps_representante_cliente#]',$cliente['serie_ctps'],$novoModelo);
                $novoModelo = str_replace('[#estado_emissao_ctps_representante_cliente#]',$cliente['estado_emissao_ctps'],$novoModelo);
                $novoModelo = str_replace('[#numero_oab_representante_cliente#]',$cliente['numero_oab'],$novoModelo);
                $novoModelo = str_replace('[#endereco_logradouro_representante_cliente#]',$cliente['endereco_logradouro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_numero_representante_cliente#]',$cliente['endereco_numero'],$novoModelo);
                $novoModelo = str_replace('[#endereco_bairro_representante_cliente#]',$cliente['endereco_bairro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_complemento_representante_cliente#]',$cliente['endereco_complemento'],$novoModelo);
                $novoModelo = str_replace('[#estado_representante_cliente#]',$cliente['nome_estado'],$novoModelo);
                $novoModelo = str_replace('[#cidade_representante_cliente#]',$cliente['nome_cidade'],$novoModelo);
                $novoModelo = str_replace('[#cep_representante_cliente#]',$cliente['cep'],$novoModelo);
                $novoModelo = str_replace('[#telefones_representante_cliente#]',$cliente['telefones'],$novoModelo);
                $novoModelo = str_replace('[#email_representante_cliente#]',$cliente['email'],$novoModelo);
                $novoModelo = str_replace('[#nome_pai_representante_cliente#]',$cliente['nome_pai'],$novoModelo);
                $novoModelo = str_replace('[#nome_mae_representante_cliente#]',$cliente['nome_mae'],$novoModelo);
                $novoModelo = str_replace('[#observacao_representante_cliente#]',$cliente['observacao'],$novoModelo);
            }
            //Se for Autor
            else if('Réu' == $cliente['tipo_pessoa']){
                $novoModelo = str_replace('[#nome_pessoa_reu_cliente#]',$cliente['nome_pessoa'],$novoModelo);
                $novoModelo = str_replace('[#cpf_cnpj_reu_cliente#]',$cliente['cpf_cnpj'],$novoModelo);
                $novoModelo = str_replace('[#data_nascimento_reu_cliente#]',$cliente['data_nascimento'] != '0000-00-00'?$this->funcoes->inverteDataBanco($cliente['data_nascimento']):"",$novoModelo);
                $novoModelo = str_replace('[#estado_civil_reu_cliente#]',$cliente['estado_civil'],$novoModelo);
                $novoModelo = str_replace('[#nacionalidade_reu_cliente#]',$cliente['nacionalidade'],$novoModelo);
                $novoModelo = str_replace('[#naturalidade_reu_cliente#]',$cliente['naturalidade'],$novoModelo);
                $novoModelo = str_replace('[#profissao_reu_cliente#]',$cliente['profissao'],$novoModelo);
                $novoModelo = str_replace('[#numero_rg_reu_cliente#]',$cliente['numero_rg'],$novoModelo);
                $novoModelo = str_replace('[#data_expedicao_rg_reu_cliente#]',$cliente['data_expedicao_rg'] != '0000-00-00'?$this->funcoes->inverteDataBanco($cliente['data_expedicao_rg']):"",$novoModelo);
                $novoModelo = str_replace('[#orgao_expedicao_rg_reu_cliente#]',$cliente['orgao_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#estado_expedicao_rg_reu_cliente#]',$cliente['estado_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#numero_ctps_reu_cliente#]',$cliente['numero_ctps'],$novoModelo);
                $novoModelo = str_replace('[#serie_ctps_reu_cliente#]',$cliente['serie_ctps'],$novoModelo);
                $novoModelo = str_replace('[#estado_emissao_ctps_reu_cliente#]',$cliente['estado_emissao_ctps'],$novoModelo);
                $novoModelo = str_replace('[#numero_oab_reu_cliente#]',$cliente['numero_oab'],$novoModelo);
                $novoModelo = str_replace('[#endereco_logradouro_reu_cliente#]',$cliente['endereco_logradouro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_numero_reu_cliente#]',$cliente['endereco_numero'],$novoModelo);
                $novoModelo = str_replace('[#endereco_bairro_reu_cliente#]',$cliente['endereco_bairro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_complemento_reu_cliente#]',$cliente['endereco_complemento'],$novoModelo);
                $novoModelo = str_replace('[#estado_reu_cliente#]',$cliente['nome_estado'],$novoModelo);
                $novoModelo = str_replace('[#cidade_reu_cliente#]',$cliente['nome_cidade'],$novoModelo);
                $novoModelo = str_replace('[#cep_reu_cliente#]',$cliente['cep'],$novoModelo);
                $novoModelo = str_replace('[#telefones_reu_cliente#]',$cliente['telefones'],$novoModelo);
                $novoModelo = str_replace('[#email_reu_cliente#]',$cliente['email'],$novoModelo);
                $novoModelo = str_replace('[#nome_pai_reu_cliente#]',$cliente['nome_pai'],$novoModelo);
                $novoModelo = str_replace('[#nome_mae_reu_cliente#]',$cliente['nome_mae'],$novoModelo);
                $novoModelo = str_replace('[#observacao_reu_cliente#]',$cliente['observacao'],$novoModelo);
            }
            else if('Advogado' == $cliente['tipo_pessoa']){
                $novoModelo = str_replace('[#nome_pessoa_adv_cliente#]',$cliente['nome_pessoa'],$novoModelo);
                $novoModelo = str_replace('[#cpf_cnpj_adv_cliente#]',$cliente['cpf_cnpj'],$novoModelo);
                $novoModelo = str_replace('[#data_nascimento_adv_cliente#]',$this->funcoes->inverteDataBanco($cliente['data_nascimento']),$novoModelo);
                $novoModelo = str_replace('[#estado_civil_adv_cliente#]',$cliente['estado_civil'],$novoModelo);
                $novoModelo = str_replace('[#nacionalidade_adv_cliente#]',$cliente['nacionalidade'],$novoModelo);
                $novoModelo = str_replace('[#naturalidade_adv_cliente#]',$cliente['naturalidade'],$novoModelo);
                $novoModelo = str_replace('[#profissao_adv_cliente#]',$cliente['profissao'],$novoModelo);
                $novoModelo = str_replace('[#numero_rg_adv_cliente#]',$cliente['numero_rg'],$novoModelo);
                $novoModelo = str_replace('[#data_expedicao_rg_adv_cliente#]',$cliente['data_expedicao_rg'] != '0000-00-00'?$this->funcoes->inverteDataBanco($cliente['data_expedicao_rg']):"",$novoModelo);
                $novoModelo = str_replace('[#orgao_expedicao_rg_adv_cliente#]',$cliente['orgao_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#estado_expedicao_rg_adv_cliente#]',$cliente['estado_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#numero_ctps_adv_cliente#]',$cliente['numero_ctps'],$novoModelo);
                $novoModelo = str_replace('[#serie_ctps_adv_cliente#]',$cliente['serie_ctps'],$novoModelo);
                $novoModelo = str_replace('[#estado_emissao_ctps_adv_cliente#]',$cliente['estado_emissao_ctps'],$novoModelo);
                $novoModelo = str_replace('[#numero_oab_adv_cliente#]',$cliente['numero_oab'],$novoModelo);
                $novoModelo = str_replace('[#endereco_logradouro_adv_cliente#]',$cliente['endereco_logradouro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_numero_adv_cliente#]',$cliente['endereco_numero'],$novoModelo);
                $novoModelo = str_replace('[#endereco_bairro_adv_cliente#]',$cliente['endereco_bairro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_complemento_adv_cliente#]',$cliente['endereco_complemento'],$novoModelo);
                $novoModelo = str_replace('[#estado_adv_cliente#]',$cliente['nome_estado'],$novoModelo);
                $novoModelo = str_replace('[#cidade_adv_cliente#]',$cliente['nome_cidade'],$novoModelo);
                $novoModelo = str_replace('[#cep_adv_cliente#]',$cliente['cep'],$novoModelo);
                $novoModelo = str_replace('[#telefones_adv_cliente#]',$cliente['telefones'],$novoModelo);
                $novoModelo = str_replace('[#email_adv_cliente#]',$cliente['email'],$novoModelo);
                $novoModelo = str_replace('[#nome_pai_adv_cliente#]',$cliente['nome_pai'],$novoModelo);
                $novoModelo = str_replace('[#nome_mae_adv_cliente#]',$cliente['nome_mae'],$novoModelo);
                $novoModelo = str_replace('[#observacao_adv_cliente#]',$cliente['observacao'],$novoModelo);
            }
        }


        //Monta os dados da outra parte
        $outraParte = $this->processo_model->getOutraParte($dadosPeticao['id_processo']);

        //Percorre todos envolvidos da outra parte
        foreach($outraParte as $outra_parte)
        {
            //Se for Autor
            if('Autor' == $outra_parte['tipo_pessoa']){
                $novoModelo = str_replace('[#nome_pessoa_autor_outra_parte#]',$outra_parte['nome_pessoa'],$novoModelo);
                $novoModelo = str_replace('[#cpf_cnpj_autor_outra_parte#]',$outra_parte['cpf_cnpj'],$novoModelo);
                $novoModelo = str_replace('[#data_nascimento_autor_outra_parte#]',$outra_parte['data_nascimento'] != '0000-00-00'?$this->funcoes->inverteDataBanco($outra_parte['data_nascimento']):"",$novoModelo);
                $novoModelo = str_replace('[#estado_civil_autor_outra_parte#]',$outra_parte['estado_civil'],$novoModelo);
                $novoModelo = str_replace('[#nacionalidade_autor_outra_parte#]',$outra_parte['nacionalidade'],$novoModelo);
                $novoModelo = str_replace('[#naturalidade_autor_outra_parte#]',$outra_parte['naturalidade'],$novoModelo);
                $novoModelo = str_replace('[#profissao_autor_outra_parte#]',$outra_parte['profissao'],$novoModelo);
                $novoModelo = str_replace('[#numero_rg_autor_outra_parte#]',$outra_parte['numero_rg'],$novoModelo);
                $novoModelo = str_replace('[#data_expedicao_rg_autor_outra_parte#]',$outra_parte['data_expedicao_rg'] != '0000-00-00'?$this->funcoes->inverteDataBanco($outra_parte['data_expedicao_rg']):"",$novoModelo);
                $novoModelo = str_replace('[#orgao_expedicao_rg_autor_outra_parte#]',$outra_parte['orgao_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#estado_expedicao_rg_autor_outra_parte#]',$outra_parte['estado_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#numero_ctps_autor_outra_parte#]',$outra_parte['numero_ctps'],$novoModelo);
                $novoModelo = str_replace('[#serie_ctps_autor_outra_parte#]',$outra_parte['serie_ctps'],$novoModelo);
                $novoModelo = str_replace('[#estado_emissao_ctps_autor_outra_parte#]',$outra_parte['estado_emissao_ctps'],$novoModelo);
                $novoModelo = str_replace('[#numero_oab_autor_outra_parte#]',$outra_parte['numero_oab'],$novoModelo);
                $novoModelo = str_replace('[#endereco_logradouro_autor_outra_parte#]',$outra_parte['endereco_logradouro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_numero_autor_outra_parte#]',$outra_parte['endereco_numero'],$novoModelo);
                $novoModelo = str_replace('[#endereco_bairro_autor_outra_parte#]',$outra_parte['endereco_bairro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_complemento_autor_outra_parte#]',$outra_parte['endereco_complemento'],$novoModelo);
                $novoModelo = str_replace('[#estado_autor_outra_parte#]',$outra_parte['nome_estado'],$novoModelo);
                $novoModelo = str_replace('[#cidade_autor_outra_parte#]',$outra_parte['nome_cidade'],$novoModelo);
                $novoModelo = str_replace('[#cep_autor_outra_parte#]',$outra_parte['cep'],$novoModelo);
                $novoModelo = str_replace('[#telefones_autor_outra_parte#]',$outra_parte['telefones'],$novoModelo);
                $novoModelo = str_replace('[#email_autor_outra_parte#]',$outra_parte['email'],$novoModelo);
                $novoModelo = str_replace('[#nome_pai_autor_outra_parte#]',$outra_parte['nome_pai'],$novoModelo);
                $novoModelo = str_replace('[#nome_mae_autor_outra_parte#]',$outra_parte['nome_mae'],$novoModelo);
                $novoModelo = str_replace('[#observacao_autor_outra_parte#]',$outra_parte['observacao'],$novoModelo);
            }
            //Se for Autor
            else if('Representante' == $outra_parte['tipo_pessoa']){
                $novoModelo = str_replace('[#nome_pessoa_representante_outra_parte#]',$outra_parte['nome_pessoa'],$novoModelo);
                $novoModelo = str_replace('[#cpf_cnpj_representante_outra_parte#]',$outra_parte['cpf_cnpj'],$novoModelo);
                $novoModelo = str_replace('[#data_nascimento_representante_outra_parte#]',$outra_parte['data_nascimento'] != '0000-00-00'?$this->funcoes->inverteDataBanco($outra_parte['data_nascimento']):"",$novoModelo);
                $novoModelo = str_replace('[#estado_civil_representante_outra_parte#]',$outra_parte['estado_civil'],$novoModelo);
                $novoModelo = str_replace('[#nacionalidade_representante_outra_parte#]',$outra_parte['nacionalidade'],$novoModelo);
                $novoModelo = str_replace('[#naturalidade_representante_outra_parte#]',$outra_parte['naturalidade'],$novoModelo);
                $novoModelo = str_replace('[#profissao_representante_outra_parte#]',$outra_parte['profissao'],$novoModelo);
                $novoModelo = str_replace('[#numero_rg_representante_outra_parte#]',$outra_parte['numero_rg'],$novoModelo);
                $novoModelo = str_replace('[#data_expedicao_rg_representante_outra_parte#]',$outra_parte['data_expedicao_rg'] != '0000-00-00'?$this->funcoes->inverteDataBanco($outra_parte['data_expedicao_rg']):"",$novoModelo);
                $novoModelo = str_replace('[#orgao_expedicao_rg_representante_outra_parte#]',$outra_parte['orgao_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#estado_expedicao_rg_representante_outra_parte#]',$outra_parte['estado_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#numero_ctps_representante_outra_parte#]',$outra_parte['numero_ctps'],$novoModelo);
                $novoModelo = str_replace('[#serie_ctps_representante_outra_parte#]',$outra_parte['serie_ctps'],$novoModelo);
                $novoModelo = str_replace('[#estado_emissao_ctps_representante_outra_parte#]',$outra_parte['estado_emissao_ctps'],$novoModelo);
                $novoModelo = str_replace('[#numero_oab_representante_outra_parte#]',$outra_parte['numero_oab'],$novoModelo);
                $novoModelo = str_replace('[#endereco_logradouro_representante_outra_parte#]',$outra_parte['endereco_logradouro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_numero_representante_outra_parte#]',$outra_parte['endereco_numero'],$novoModelo);
                $novoModelo = str_replace('[#endereco_bairro_representante_outra_parte#]',$outra_parte['endereco_bairro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_complemento_representante_outra_parte#]',$outra_parte['endereco_complemento'],$novoModelo);
                $novoModelo = str_replace('[#estado_representante_outra_parte#]',$outra_parte['nome_estado'],$novoModelo);
                $novoModelo = str_replace('[#cidade_representante_outra_parte#]',$outra_parte['nome_cidade'],$novoModelo);
                $novoModelo = str_replace('[#cep_representante_outra_parte#]',$outra_parte['cep'],$novoModelo);
                $novoModelo = str_replace('[#telefones_representante_outra_parte#]',$outra_parte['telefones'],$novoModelo);
                $novoModelo = str_replace('[#email_representante_outra_parte#]',$outra_parte['email'],$novoModelo);
                $novoModelo = str_replace('[#nome_pai_representante_outra_parte#]',$outra_parte['nome_pai'],$novoModelo);
                $novoModelo = str_replace('[#nome_mae_representante_outra_parte#]',$outra_parte['nome_mae'],$novoModelo);
                $novoModelo = str_replace('[#observacao_representante_outra_parte#]',$outra_parte['observacao'],$novoModelo);
            }
            //Se for Autor
            else if('Réu' == $outra_parte['tipo_pessoa']){
                $novoModelo = str_replace('[#nome_pessoa_reu_outra_parte#]',$outra_parte['nome_pessoa'],$novoModelo);
                $novoModelo = str_replace('[#cpf_cnpj_reu_outra_parte#]',$outra_parte['cpf_cnpj'],$novoModelo);
                $novoModelo = str_replace('[#data_nascimento_reu_outra_parte#]',$outra_parte['data_nascimento'] != '0000-00-00'?$this->funcoes->inverteDataBanco($outra_parte['data_nascimento']):"",$novoModelo);
                $novoModelo = str_replace('[#estado_civil_reu_outra_parte#]',$outra_parte['estado_civil'],$novoModelo);
                $novoModelo = str_replace('[#nacionalidade_reu_outra_parte#]',$outra_parte['nacionalidade'],$novoModelo);
                $novoModelo = str_replace('[#naturalidade_reu_outra_parte#]',$outra_parte['naturalidade'],$novoModelo);
                $novoModelo = str_replace('[#profissao_reu_outra_parte#]',$outra_parte['profissao'],$novoModelo);
                $novoModelo = str_replace('[#numero_rg_reu_outra_parte#]',$outra_parte['numero_rg'],$novoModelo);
                $novoModelo = str_replace('[#data_expedicao_rg_reu_outra_parte#]',$outra_parte['data_expedicao_rg'] != '0000-00-00'?$this->funcoes->inverteDataBanco($outra_parte['data_expedicao_rg']):"",$novoModelo);
                $novoModelo = str_replace('[#orgao_expedicao_rg_reu_outra_parte#]',$outra_parte['orgao_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#estado_expedicao_rg_reu_outra_parte#]',$outra_parte['estado_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#numero_ctps_reu_outra_parte#]',$outra_parte['numero_ctps'],$novoModelo);
                $novoModelo = str_replace('[#serie_ctps_reu_outra_parte#]',$outra_parte['serie_ctps'],$novoModelo);
                $novoModelo = str_replace('[#estado_emissao_ctps_reu_outra_parte#]',$outra_parte['estado_emissao_ctps'],$novoModelo);
                $novoModelo = str_replace('[#numero_oab_reu_outra_parte#]',$outra_parte['numero_oab'],$novoModelo);
                $novoModelo = str_replace('[#endereco_logradouro_reu_outra_parte#]',$outra_parte['endereco_logradouro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_numero_reu_outra_parte#]',$outra_parte['endereco_numero'],$novoModelo);
                $novoModelo = str_replace('[#endereco_bairro_reu_outra_parte#]',$outra_parte['endereco_bairro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_complemento_reu_outra_parte#]',$outra_parte['endereco_complemento'],$novoModelo);
                $novoModelo = str_replace('[#estado_reu_outra_parte#]',$outra_parte['nome_estado'],$novoModelo);
                $novoModelo = str_replace('[#cidade_reu_outra_parte#]',$outra_parte['nome_cidade'],$novoModelo);
                $novoModelo = str_replace('[#cep_reu_outra_parte#]',$outra_parte['cep'],$novoModelo);
                $novoModelo = str_replace('[#telefones_reu_outra_parte#]',$outra_parte['telefones'],$novoModelo);
                $novoModelo = str_replace('[#email_reu_outra_parte#]',$outra_parte['email'],$novoModelo);
                $novoModelo = str_replace('[#nome_pai_reu_outra_parte#]',$outra_parte['nome_pai'],$novoModelo);
                $novoModelo = str_replace('[#nome_mae_reu_outra_parte#]',$outra_parte['nome_mae'],$novoModelo);
                $novoModelo = str_replace('[#observacao_reu_outra_parte#]',$outra_parte['observacao'],$novoModelo);
            }
            else if('Advogado' == $outra_parte['tipo_pessoa']){
                $novoModelo = str_replace('[#nome_pessoa_adv_outra_parte#]',$outra_parte['nome_pessoa'],$novoModelo);
                $novoModelo = str_replace('[#cpf_cnpj_adv_outra_parte#]',$outra_parte['cpf_cnpj'],$novoModelo);
                $novoModelo = str_replace('[#data_nascimento_adv_outra_parte#]',$outra_parte['data_nascimento'] != '0000-00-00'?$this->funcoes->inverteDataBanco($outra_parte['data_nascimento']):"",$novoModelo);
                $novoModelo = str_replace('[#estado_civil_adv_outra_parte#]',$outra_parte['estado_civil'],$novoModelo);
                $novoModelo = str_replace('[#nacionalidade_adv_outra_parte#]',$outra_parte['nacionalidade'],$novoModelo);
                $novoModelo = str_replace('[#naturalidade_adv_outra_parte#]',$outra_parte['naturalidade'],$novoModelo);
                $novoModelo = str_replace('[#profissao_adv_outra_parte#]',$outra_parte['profissao'],$novoModelo);
                $novoModelo = str_replace('[#numero_rg_adv_outra_parte#]',$outra_parte['numero_rg'],$novoModelo);
                $novoModelo = str_replace('[#data_expedicao_rg_adv_outra_parte#]',$outra_parte['data_expedicao_rg'] != '0000-00-00'?$this->funcoes->inverteDataBanco($outra_parte['data_expedicao_rg']):"",$novoModelo);
                $novoModelo = str_replace('[#orgao_expedicao_rg_adv_outra_parte#]',$outra_parte['orgao_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#estado_expedicao_rg_adv_outra_parte#]',$outra_parte['estado_expedicao_rg'],$novoModelo);
                $novoModelo = str_replace('[#numero_ctps_adv_outra_parte#]',$outra_parte['numero_ctps'],$novoModelo);
                $novoModelo = str_replace('[#serie_ctps_adv_outra_parte#]',$outra_parte['serie_ctps'],$novoModelo);
                $novoModelo = str_replace('[#estado_emissao_ctps_adv_outra_parte#]',$outra_parte['estado_emissao_ctps'],$novoModelo);
                $novoModelo = str_replace('[#numero_oab_adv_outra_parte#]',$outra_parte['numero_oab'],$novoModelo);
                $novoModelo = str_replace('[#endereco_logradouro_adv_outra_parte#]',$outra_parte['endereco_logradouro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_numero_adv_outra_parte#]',$outra_parte['endereco_numero'],$novoModelo);
                $novoModelo = str_replace('[#endereco_bairro_adv_outra_parte#]',$outra_parte['endereco_bairro'],$novoModelo);
                $novoModelo = str_replace('[#endereco_complemento_adv_outra_parte#]',$outra_parte['endereco_complemento'],$novoModelo);
                $novoModelo = str_replace('[#estado_adv_outra_parte#]',$outra_parte['nome_estado'],$novoModelo);
                $novoModelo = str_replace('[#cidade_adv_outra_parte#]',$outra_parte['nome_cidade'],$novoModelo);
                $novoModelo = str_replace('[#cep_adv_outra_parte#]',$outra_parte['cep'],$novoModelo);
                $novoModelo = str_replace('[#telefones_adv_outra_parte#]',$outra_parte['telefones'],$novoModelo);
                $novoModelo = str_replace('[#email_adv_outra_parte#]',$outra_parte['email'],$novoModelo);
                $novoModelo = str_replace('[#nome_pai_adv_outra_parte#]',$outra_parte['nome_pai'],$novoModelo);
                $novoModelo = str_replace('[#nome_mae_adv_outra_parte#]',$outra_parte['nome_mae'],$novoModelo);
                $novoModelo = str_replace('[#observacao_adv_outra_parte#]',$outra_parte['observacao'],$novoModelo);
            }
        }

        //Campos Extras
        $camposExtras = $this->processo_model->getCamposExtrasPeticaoById($dadosPeticao['id_processo_peticao']);
//print_r($camposExtras);


        return $novoModelo;

    }

    public function salvar_peticao(){
        $this->session->set_userdata(array('aba_atual' => 'anexos'));
        if(!empty($_REQUEST['id_processo_peticao']))
        {
            $this->processo_model->update('processo_peticao', array('peticao_html'=> $_REQUEST['peticao_html']), 'id_processo_peticao', $_REQUEST['id_processo_peticao']);

            echo json_encode(array('classe' => 'acerto', 'msg' => "Petição gerada com sucesso.",'url'=> base_url('processo/peticao_pdf')."/".$_REQUEST['id_processo_peticao']));
        }else{
            //Pegar último código da peticao
            $proximoCodInterno = $this->processo_model->getByProximoIdPeticaoInterno();

            $idProcessoPeticao = $this->processo_model->insert_peticao(array(
                'id_processo' => $_REQUEST['id_processo'],
                'id_processo_peticao_interno'=> $proximoCodInterno,
                'id_tipo_peticao' => $_REQUEST['tipo_peticao'],
                'data_cadastro'=> date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => $this->session->userdata("id_usuario")
            ));
            //Grava os campos extras da petição
            foreach($_REQUEST as $campo => $valor)
            {
                if(is_int($campo))
                {
                    $idProcessoPeticaoCampo = $this->processo_model->insert_peticao_campo(array(
                        'id_processo_peticao' => $idProcessoPeticao,
                        'id_tipo_peticao_campo' => $campo,
                        'valor_campo' => $valor
                    ));
                    //echo $campo." v".$valor;

                }
            }
            echo json_encode(array('classe' => 'acerto', 'msg' => "Petição cadastrada com sucesso.",'url'=> base_url('processo/peticao')."/".$idProcessoPeticao));
        }
    }

    public function editar($id)
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        $data['processo'] = $this->processo_model->getById($id);
        $data['parteCliente'] = $this->processo_model->getParteCliente($id);
        $data['outraParte'] = $this->processo_model->getOutraParte($id);

        $this->load->model( "tipo_justica_model" );
        $data['tipos_justica'] = $this->tipo_justica_model->getAll();

        $this->load->model( "tipo_processo_model" );
        $data['tipos_processo'] = $this->tipo_processo_model->getAll();

        $this->load->model( "procedimento_model" );
        $data['procedimentos'] = $this->procedimento_model->getAll();

        $this->load->model( "usuario_model" );
        $data['responsaveis'] = $this->usuario_model->getUsuariosResponsaveis($this->session->userdata("id_usuario_principal"));


        $this->load->model( "estado_model" );
        $data['estados'] = $this->estado_model->getAll();

        $data['pendencias'] = $this->processo_model->getPendenciasByProcesso($id);
        $this->template->controlearquivo("processo/editar", $data);
    }


    public function desvincular_pessoa($id)
    {

        $this->session->set_userdata(array('aba_atual' => 'partes'));
        $this->processo_model->deleteParte($id);

        echo json_encode(array('classe' => 'acerto', 'msg' => "Pessoa desvinculada com sucesso!"));
        exit();
    }



    public function salvar_parte(){

        $this->session->set_userdata(array('aba_atual' => 'partes'));


        if(!empty($_REQUEST['id_processo_parte']))
        {
            //EDITA
            if(!empty($_REQUEST['tipo_pessoa']))
                $data['tipo_pessoa'] = $_REQUEST['tipo_pessoa'];

            $this->processo_model->update('processo_parte', $data, 'id_processo_parte', $_REQUEST['id_processo_parte']);
        }else{
            //INSERE UM NOVO
            //Inserir Novo registro
            $idProcessoParte = $this->processo_model->insert_parte(array(
                'id_processo' => $_REQUEST['id_processo'],
                'lado_parte' => $_REQUEST['lado_parte'],
                'id_pessoa'=> $_REQUEST['id_pessoa']
            ));
            echo json_encode(array('classe' => 'acerto', 'msg' => "Pessoa vinculada com sucesso.",'url'=> base_url('processo/completo')."/".$_REQUEST['id_processo']));
        }
    }

    public function salvar_andamento(){
        $this->session->set_userdata(array('aba_atual' => 'andamento'));
        if(!empty($_REQUEST['id_processo_andamento']))
        {
            //EDITA
            if(!empty($_REQUEST['resolvido'])){
                $data['resolvido'] = 1;
                $data['data_resolvido'] = date('Y-m-d H:i:s');
            }
            $this->processo_model->update('processo_andamento', $data, 'id_processo_pendencia', $_REQUEST['id_processo_andamento']);
            echo json_encode(array('classe' => 'acerto', 'msg' => "Pendência marcada como resolvida.",'url'=> base_url('processo/completo')."/".$_REQUEST['id_processo']));
        }else{
            //Inserir Novo registro
            $idProcessoAndamento = $this->processo_model->insert_andamento(array(
                'id_processo' => $_REQUEST['id_processo'],
                'descricao' => $_REQUEST['descricao'],
                'data_cadastro'=> date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => $this->session->userdata("id_usuario")
            ));
            echo json_encode(array('classe' => 'acerto', 'msg' => "Andamento cadastrado com sucesso.",'url'=> base_url('processo/completo')."/".$_REQUEST['id_processo']));
        }
    }

    public function salvar_evento(){
        $this->session->set_userdata(array('aba_atual' => 'eventos'));
        if(!empty($_REQUEST['id_processo_evento']))
        {
            //EDITA
            if(!empty($_REQUEST['cancelar'])){
                $data['situacao'] = 'Cancelado';
            }
            $this->processo_model->update('processo_evento', $data, 'id_processo_evento', $_REQUEST['id_processo_evento']);
            echo json_encode(array('classe' => 'acerto', 'msg' => "Evento cancelado com sucesso.",'url'=> base_url('processo/completo')."/".$_REQUEST['id_processo']));
        }else{

            $data = '';
            if('Prazo' == $_REQUEST['tipo_evento'])
                $data = $_REQUEST['data_prazo'];
            else
                $data = $_REQUEST['data_evento'];

            $hora = '00:00:00';
            if(!empty($_REQUEST['hora_evento']))
                $hora = $_REQUEST['hora_evento'].":00";

            //Inserir Novo registro
            $idProcessoPendencia = $this->processo_model->insert_evento(array(
                'id_processo' => $_REQUEST['id_processo'],
                'tipo_evento' => $_REQUEST['tipo_evento'],
                'tipo_prazo' => $_REQUEST['tipo_prazo'],
                'id_local_evento' => $_REQUEST['id_forum'],
                'data_evento' => $this->funcoes->formataDataBanco($data)." ".$hora,
                'observacao' => $_REQUEST['observacao'],
                'data_cadastro'=> date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => $this->session->userdata("id_usuario")
            ));
            echo json_encode(array('classe' => 'acerto', 'msg' => "Evento cadastrado com sucesso.",'url'=> base_url('processo/completo')."/".$_REQUEST['id_processo']));
        }
    }

    public function salvar_pendencia(){
        $this->session->set_userdata(array('aba_atual' => 'pendencias'));
        if(!empty($_REQUEST['id_processo_pendencia']))
        {
            //EDITA
            if(!empty($_REQUEST['resolvido'])){
                $data['resolvido'] = 1;
                $data['data_resolvido'] = date('Y-m-d H:i:s');
            }
            $this->processo_model->update('processo_pendencia', $data, 'id_processo_pendencia', $_REQUEST['id_processo_pendencia']);
            echo json_encode(array('classe' => 'acerto', 'msg' => "Pendência marcada como resolvida.",'url'=> base_url('processo/completo')."/".$_REQUEST['id_processo']));
        }else{
            //Inserir Novo registro
            $idProcessoPendencia = $this->processo_model->insert_pendencia(array(
                'id_processo' => $_REQUEST['id_processo'],
                'pendencia' => $_REQUEST['pendencia'],
                'data_cadastro'=> date('Y-m-d H:i:s'),
                'id_usuario_cadastro' => $this->session->userdata("id_usuario")
            ));
            echo json_encode(array('classe' => 'acerto', 'msg' => "Pendência cadastrada com sucesso.",'url'=> base_url('processo/completo')."/".$_REQUEST['id_processo']));
        }
    }



    public function listar()
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $data = array();

        /*
        $filtros[] = array(
            'campo' => "rc.id_revenda",
            'operador' => null,
            'valor' => $_REQUEST['revenda']
        );*/

        $data["registros"] = $this->processo_model->getAll($filtros);
        $this->template->controlearquivo("processo/listar", $data);
    }

    /** Método responsável por gerar o relatório em PDF dos lançamentos
     * @author Tássio Neri
     * @name gerar_pdf
     * @access public
     * @return string View completa
     */
    public function gerar_pdf()
    {
        //Chama da Biblioteca mPDF
        $this->load->library('mpdf');

        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        //Carrega Tabelas
        $this->load->model("cliente_model");
        $this->load->model("revenda_model");
        $idRevenda = $this->session->userdata("id_revenda");


        $data = array();
        if (!empty($idRevenda) && empty($_REQUEST['revenda'])) {
            $filtros[] = array(
                'campo' => "rc.id_revenda",
                'operador' => null,
                'valor' => $idRevenda
            );

            $data['dadosRevenda'] = $this->revenda_model->getById($idRevenda);

        } else if (!empty($_REQUEST['revenda'])) {
            $filtros[] = array(
                'campo' => "rc.id_revenda",
                'operador' => null,
                'valor' => $_REQUEST['revenda']
            );

            $data['dadosRevenda'] = $this->revenda_model->getById($_REQUEST['revenda']);
        }

        $data["registros"] = $this->cliente_model->getAll($filtros);

        $this->load->view("cliente/listar_pdf_view", $data);
    }

    public function registro($id = null)
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        $this->load->model("clientes_model");
        $this->load->model("perfil_model");

        if ($id != null) {

            $info_cliente = $this->clientes_model->getById($id);
            $titulo = "Cadastro do cliente " . $info_cliente['razao_social'];
        } else {

            $info_cliente = null;
            $titulo = "Novo Cadastro";
        }

        $data["info_cliente"] = $info_cliente;
        $data["perfis"] = $this->perfil_model->getAll();

        $data["titulo"] = $titulo;

        $this->template->controlearquivo("cadastros/clientes_registro_view", $data);
    }

    public function verificaLoginExistente($login)
    {
        //Carrega Tabelas
        $this->load->model("cliente_model");

        //Verifica se o Login já existe
        if ($this->cliente_model->verificaLogin($login)) {
            echo json_encode(array('classe' => 'erro', 'msg' => "Login já existente, por favor informe outro."));
            exit();
        }
        echo json_encode(array('classe' => 'acerto'));
    }

    public function verificaEmailExistente()
    {
        $email = $_REQUEST['email'];
        //Carrega Tabelas
        $this->load->model("cliente_model");

        //Verifica se o Email já existe
        if ($this->cliente_model->verificaEmail($email)) {
            echo json_encode(array('classe' => 'erro', 'msg' => "Email já cadastrado, por favor informe outro."));
            exit();
        }
        echo json_encode(array('classe' => 'acerto'));
    }

    public function salvar()
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        //Carrega Tabelas
        $this->load->model("processo_model");


        //Se for informado o id atualiza, caso contrário insere
        if (!empty($_REQUEST['id_colonia'])) {

            $this->processo_model->update('colonia',array(
                'id_tipo_justica' => $_REQUEST['tipo_justica'],
                'id_tipo_processo' => $_REQUEST['tipo_processo'],
                'id_acao' => $_REQUEST['id_acao'],
                'numero_processo_justica' => $_REQUEST['numero_processo'],
                'numero_processo_tribunal' => $_REQUEST['numero_processo_tribunal'],
                'id_estado_comarca' => $_REQUEST['estado_comarca'],
                'id_cidade_comarca' => $_REQUEST['cidade_comarca'],
                'id_forum' => $_REQUEST['id_forum'],
                'id_resultado_recurso' => $_REQUEST['resultado_recurso'],
                'id_desfecho_processo' => $_REQUEST['desfecho_processo'],
                'id_situacao_processo' => $_REQUEST['situacao_processo'],
                'tipo_tribunal' => $_REQUEST['tipo_tribunal'],
                'vara_subsecao' => $_REQUEST['vara_subsecao'],
                'id_procedimento' => $_REQUEST['procedimento'],
                'honorario' => $this->funcoes->formataMoedaInt($_REQUEST['honorario']),
                'porcentagem_causa' => $_REQUEST['porcentagem_causa'],
                'observacao' => $_REQUEST['observacao'],
                'tipo_acesso' => $_REQUEST['tipo_acesso']
            ),'id_processo', $_REQUEST['id_processo']);

            echo json_encode(array('classe' => 'acerto', 'msg' => "Processo atualizado com sucesso!", 'url' => base_url('processo/completo')."/".$_REQUEST['id_processo']));
            exit();

        } else {

            //Verifica se o Processo já existe
            if(!empty($_REQUEST['id_colonia']))
                $verificaProcessoExistente = $this->processo_model->getByProcesso($_REQUEST['numero_processo']);

            //Se existir continua o processo
            if(!empty($verificaProcessoExistente))
            {
                echo json_encode(array('classe' => 'acerto', 'msg' => "Processo já cadastrado!", 'url' => base_url('processo/completo')."/".$verificaProcessoExistente[0]['id_processo']));
                exit();
            }

            //Pegar último código do processo interno
            $proximoCodInterno = $this->processo_model->getByProximoIdInterno();

            //Inserir Novo registro
            $idProcesso = $this->processo_model->insert(array(

                    'id_tipo_processo' => $_REQUEST['tipo_processo'],
                    'id_acao' => $_REQUEST['id_acao'],
                    'ano_processo_interno'=> date('Y'),
                    'codigo_processo_interno' => $proximoCodInterno,
                    'numero_processo_justica' => $_REQUEST['numero_processo'],
                    'numero_processo_tribunal' => $_REQUEST['numero_processo_tribunal'],
                    'id_estado_comarca' => $_REQUEST['estado_comarca'],
                    'id_cidade_comarca' => $_REQUEST['cidade_comarca'],
                    'id_forum' => $_REQUEST['id_forum'],
                    'id_resultado_recurso' => $_REQUEST['resultado_recurso'],
                    'id_desfecho_processo' => $_REQUEST['desfecho_processo'],
                    'id_situacao_processo' => $_REQUEST['situacao_processo'],
                    'tipo_tribunal' => $_REQUEST['tipo_tribunal'],
                    'vara_subsecao' => $_REQUEST['vara_subsecao'],
                    'id_procedimento' => $_REQUEST['procedimento'],
                    'honorario' => $this->funcoes->formataMoedaInt($_REQUEST['honorario']),
                    'porcentagem_causa' => $_REQUEST['porcentagem_causa'],
                    'observacao' => $_REQUEST['observacao'],

                    'data_cadastro' => date('Y-m-d H:i:s'),
                    'foto' => $_REQUEST['foto']
                    ),$_REQUEST['usuario_responsavel']
            );

            echo json_encode(array('classe' => 'acerto', 'msg' => "Processo cadastrado com sucesso!", 'url' => base_url('processo/completo')."/".$idProcesso));
            exit();
        }
    }

    public function geraNumero($tamanho)
    {
        $ranStr = md5(microtime());
        return substr($ranStr, 0, $tamanho);
    }

    function tirarAcentos($string)
    {
        $novoString = strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");

        return $novoString;
    }


    public function limparString($string)
    {
        $converte = array('á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'é' => 'e',
            'ê' => 'e', 'í' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', "ö" => "o",
            'ú' => 'u', 'ü' => 'u', 'ç' => 'c', 'ñ' => 'n', 'Á' => 'A', 'À' => 'A', 'Ã' => 'A',
            'Â' => 'A', 'É' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Ï' => 'I', "Ö" => "O", 'Ó' => 'O',
            'Ô' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ü' => 'U', 'Ç' => 'C', 'N' => 'N');

        return str_replace(" ", "", strtr(($string), $converte));
        // ANTES return str_replace(" ","",strtr(utf8_encode($string), $converte));

    }

    public function desconnectar()
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");


        //Carrega Tabelas
        $this->load->model("cliente_model");
        $this->load->model("revenda_model");

        //Dados da Revenda
        $filtros[] = array(
            'campo' => "r.id_revenda",
            'operador' => null,
            'valor' => $_REQUEST['id_revenda']
        );
        $filtros[] = array(
            'campo' => "rp.id_profile",
            'operador' => null,
            'valor' => $_REQUEST['id_profile']
        );
        $dadosRevenda = $this->revenda_model->getAll($filtros);

        if (!empty($dadosRevenda)) {
            simplexml_load_file("http://" . $dadosRevenda[0]['usuarioadm'] . ":" . $dadosRevenda[0]['senhaadm'] . "@" . $dadosRevenda[0]['url'] . ":" . $dadosRevenda[0]['portacsp'] . "/xmlHandler?command=kick-user&name=" . $_REQUEST['csplogin']);

            echo json_encode(array('classe' => 'acerto', 'msg' => "Login " . $_REQUEST['csplogin'] . " desconnectado com sucesso!", 'url' => base_url('cliente/listar_onlines')));
            exit();
        } else {
            echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao desconnectar login " . $_REQUEST['csplogin'] . "!", 'url' => base_url('cliente/listar_onlines')));
            exit();
        }
    }

    public function limparCache()
    {
        $idRevenda = $this->session->userdata("id_revenda");

        //Se o servidor for local usa o memcache especifico
        if ('localhost' == $_SERVER['HTTP_HOST']) {
            //echo "ENTROU LOCALHOST";
            // Load library
            $this->load->library('Memcached_library');
            $resultsRevenda = $this->memcached_library->get(diretorio_sistema() . '/listar_revendas' . $idRevenda);
            $resultsClientes = $this->memcached_library->get(diretorio_sistema() . '/listar_clientes' . $idRevenda);

            // Se existir cache Revendas, deleta os dados
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

    public function excluir($idProcesso)
    {
        //Carrega Tabelas
        $this->processo_model->delete($idProcesso);
        echo json_encode(array('classe' => 'acerto', 'msg' => "Processo excluído com sucesso!", 'url' => base_url('processo/listar')));
        exit();
    }



    public function excluirMassa()
    {

        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        //Limpar Cache
        $this->limparCache();

        //Carrega Tabelas
        $this->load->model("cliente_model");
        foreach ($_REQUEST['checkeds'] as $idCliente) {
            $this->cliente_model->delete($idCliente);
        }
        echo json_encode(array('classe' => 'acerto', 'msg' => "Clientes selecionados excluído com sucesso!", 'url' => base_url('cliente/busca_detalhada')));
        exit();
    }

    public function realizar_pagamento()
    {
        //Verificação da Sessão de Login
        $this->load->library("AutenticacaoCliente");

        //Carrega Tabelas
        $this->load->model("cliente_model");
        $this->load->model("plano_model");
        $this->load->model("profile_model");

        $comprovante = '';
        $situacaoPagamento = 'Aberto';

        //Se o comprovante for enviado
        if (isset($_FILES['comprovante']) && !empty($_FILES['comprovante']['name'])) {
            $novoNome = md5($_FILES['file']['name'] . date('Y-m-d')) . ".jpg";
            $caminho = "uploads/clientes/comprovantes/";
            move_uploaded_file($_FILES['comprovante']['tmp_name'], $caminho . $novoNome);
            $comprovante = $caminho . $novoNome;
            $situacaoPagamento = 'Aguardando Compensação';
        }

        $dadosPlano = $this->plano_model->getById($_REQUEST['plano']);

        //Dados do Login
        $dadosLogin = $this->cliente_model->getByIdLogin($this->session->userdata("id_login"));

        $dadosProfile = $this->profile_model->getById($dadosLogin['id_profile']);

        $area_cliente = $this->input->post('area_cliente', TRUE); // so multiplica na area do admin

        //Se o profile for multiplo, multiplica pelo numero de vezes o valor do plano
        if ((empty($area_cliente) || $area_cliente != 'S') && !empty($dadosProfile['quantidade_multipla'])) {
            echo $dadosPlano['valor_plano'] = ($dadosPlano['valor_plano'] * $dadosProfile['quantidade_multipla']);
        }

        //Grava histórico Pagamento
        $historico = $this->cliente_model->insertHistoricoPagamentoLogin(array('id_login' => $this->session->userdata("id_login"),
                'tipo_pagamento' => $_REQUEST['tipo'],
                'referencia' => $_REQUEST['tipo'],
                'vencimento' => $_REQUEST['vencimento'],
                'valor' => $dadosPlano['valor_plano'],
                'id_plano_escolhido' => $_REQUEST['plano'],
                'dias_plano' => $dadosPlano['quantidade_dias'],
                'situacao_pagamento' => $situacaoPagamento,
                'comprovante' => $comprovante
            )
        );

        //Verifica o Método de Pagamento
        if (!empty($_REQUEST['tipo']) && 'PagSeguro' == $_REQUEST['tipo']) {
            //Efetua Pagamento no PagSeguro
            $this->efetuar_pagamento_plano(array('plano' => $_REQUEST['plano'],
                    'codigoHistorico' => $historico)
            );

        } elseif (!empty($_REQUEST['tipo']) && 'MercadoPago' == $_REQUEST['tipo']) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            require_once(APPPATH . 'controllers/mercadopago_api.php');
            $mercado_pago = new Mercadopago_api();

            //Efetua Pagamento no Mercado Pago
            $mercado_pago->index(array('id_revenda' => $dadosLogin['id_revenda'],'plano' => $_REQUEST['plano'],
                    'codigoHistorico' => $historico)
            );

        } elseif (!empty($_REQUEST['tipo']) && 'Depósito Bancário' == $_REQUEST['tipo']) {
            //Verifica se foi inserido
            if (!empty($historico)) {
                echo json_encode(array('classe' => 'acerto', 'tipo' => $_REQUEST['tipo'], 'msg' => "Confirmação realizada com sucesso!", 'url' => base_url('painel_cliente')));
                exit();
            } else {
                echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao Confirmar Pagamento!", 'url' => base_url('painel_cliente')));
                exit();
            }
        }


    }


    public function upload_comprovante()
    {

        //Verificação da Sessão de Login
        $this->load->library("autenticacao");


        $this->load->model("cliente_model");

        if ($img = $this->cliente_model->uploadComprovante('uploadfoto')) {
            echo $img;
        } else {
            echo 'false';
        }
    }


    public function pagamento_avulso()
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

        //Limpar Cache
        $this->limparCache();

        //Carrega Tabelas
        $this->load->model("cliente_model");
        $this->load->model("plano_model");
        $this->load->model("profile_model");

        $comprovante = '';

        //Se o comprovante for enviado
        if (isset($_FILES['comprovante']) && !empty($_FILES['comprovante']['name'])) {
            $novoNome = md5($_FILES['file']['name'] . date('Y-m-d')) . ".jpg";
            $caminho = "uploads/clientes/comprovantes/";
            move_uploaded_file($_FILES['comprovante']['tmp_name'], $caminho . $novoNome);
            $comprovante = $caminho . $novoNome;
        }

        $dadosPlano = $this->plano_model->getById($_REQUEST['plano']);

        //Dados do Login
        $dadosLogin = $this->cliente_model->getByIdLogin($_REQUEST['id_login']);

        $dadosProfile = $this->profile_model->getById($dadosLogin['id_profile']);

        //Se o profile for multiplo, multiplica pelo numero de vezes o valor do plano
        if (!empty($dadosProfile['quantidade_multipla']))
            $dadosPlano['valor_plano'] = $dadosPlano['valor_plano'] * $dadosProfile['quantidade_multipla'];


        //Validade
        $validade = explode(" ", $dadosLogin['validade']);


        //Data da Validade
        $data = explode('/', $_REQUEST['data_pagamento']);
        //Formatar Data
        $dataPagamento = new DateTime();
        $dataPagamento->setDate($data[2], $data[1], $data[0]);
        $dataPagamento = $dataPagamento->format("Y-m-d");

        //Grava histórico Pagamento
        $historico = $this->cliente_model->insertHistoricoPagamentoLogin(array('id_login' => $_REQUEST['id_login'],
                'tipo_pagamento' => $_REQUEST['tipo'],
                'referencia' => $_REQUEST['referencia'],
                'vencimento' => $validade[0],
                'valor' => $dadosPlano['valor_plano'],
                'id_plano_escolhido' => $_REQUEST['plano'],
                'dias_plano' => $dadosPlano['quantidade_dias'],
                'data_pagamento' => $dataPagamento,
                'situacao_pagamento' => $_REQUEST['situacao_pagamento'],
                'comprovante' => $comprovante
            )
        );

        //Se caso foi pago
        if ('Pago' == $_REQUEST['situacao_pagamento']) {

            //Se a data de pagamento for maior que a data de vencimento
            $dataValidade = explode(" ", $dadosLogin['validade']);

            //Data da Validade
            $data = explode('/', $_REQUEST['data_pagamento']);
            //Formatar Data
            $dataPagamento = new DateTime();
            $dataPagamento->setDate($data[2], $data[1], $data[0]);
            $dataPagamento = $dataPagamento->format("Y-m-d");

            if ($dataPagamento > $dataValidade[0]) {
                $novaDataVencimento = new DateTime($dataPagamento);
                $novaDataVencimento->modify("+" . $dadosPlano['quantidade_dias'] . " day");
                $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
            } else {
                $novaDataVencimento = new DateTime($dataValidade[0]);
                $novaDataVencimento->modify("+" . $dadosPlano['quantidade_dias'] . " day");
                $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
            }

            $this->cliente_model->updateLogin($_REQUEST['id_login'], array(
                    'validade' => $novaDataVencimento . " " . date('H:i:s'),
                    'situacao_login' => 'Ativo',
                    'situacao_login_anterior' => 'Ativo',
                    'id_plano' => $_REQUEST['plano'])
            );
        }

        //Verifica se foi inserido
        if (!empty($historico)) {
            echo json_encode(array('classe' => 'acerto', 'tipo' => $_REQUEST['tipo'], 'msg' => "Pagamento realizado com sucesso!", 'url' => base_url('cliente/listar')));
            exit();
        } else {
            echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao Cadastrar Pagamento!", 'url' => base_url('cliente/listar')));
            exit();
        }
    }

    public function consultar_transacao_pagseguro()
    {
        $servidor = "https://ws.pagseguro.uol.com.br/v2/transactions/C3EDDCA5838368D114589FBACA1AC6FE?email=suporte@lojamodelo.com.br&token=95112EE828D94278BD394E91C4388F20";


        // Parametros da requisição
        $content = http_build_query(array(
            'txtXML' => $_POST['txtXML']
        ));

        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => "Connection: close\r\n" .
                    "Content-type: application/x-www-form-urlencoded\r\n" .
                    "Content-Length: " . strlen($content) . "\r\n",
                'content' => $content
            )
        ));
        // Realize comunicação com o servidor
        $contents = file_get_contents($servidor, null, $context);
        $resposta = json_decode($contents);  //Parser da resposta Json
        print_r($resposta);
    }

    /**
     * retornoPagamentoPagseguro
     *
     * Recebe o retorno de pagamento da promoção via pagseguro
     * @access public
     * @return void
     */
    public function retornoPagamento()
    {

    }

    public function retorno_pagamento_pagseguro()
    {
        $idLogin = $this->session->userdata("id_login");

        print_r($_REQUEST);
        $this->urlCallback = base_url('payment/callback');

        $this->load->config('pagseguro');
        $this->load->library('pagsegurolibrary/pagseguro', 'pagseguro');


        $urlCallback = $this->urlCallback;

        print_r($urlCallback);

        $retorno = base_url('payment/getTransaction/' . $this->urlCallback);
        //F37B5606-C0BF-41CF-B587-ECBE3B1B8419

        // VC PODE COLOCAR A URL QUE VC DESEJA ENVIAR O USUARIO APOS CONCLUIR A COMPRA
        //redirect ( base_url() );
        exit();

        //Se for informado o código da Transação
        if (!empty($_REQUEST['transaction_id']) && $idLogin) {
            //Grava dados PagSeguro
            $historico = $this->cliente_model->insertHistoricoPagamentoLogin(array('id_login' => $this->session->userdata("id_login"),
                    'tipo_pagamento' => $_REQUEST['tipo'],
                    'referencia' => '' != $_REQUEST['referencia'] ? $_REQUEST['referencia'] : '',
                    'vencimento' => $_REQUEST['vencimento'],
                    'valor' => $dadosPlano['valor_plano'],
                    'dias_plano' => $dadosPlano['quantidade_dias'],
                    'situacao_pagamento' => $situacaoPagamento,
                    'comprovante' => $comprovante
                )
            );
        }


    }

    private function efetuar_pagamento_plano($dados)
    {
        //Verificação da Sessão de Login
        // $this->load->library( "autenticacao" );

        //Carrega Tabelas
        $this->load->model("cliente_model");
        $this->load->model("plano_model");

        //Buscar dados do Login/Cliente
        $dadosLogin = $this->cliente_model->getByIdLogin($this->session->userdata("id_login"));

        $this->urlCallback = base_url('payment/callback?id_revenda=' . $dadosLogin['id_revenda']);
        $this->session->set_userdata(array('id_revenda_pagamento' => $dadosLogin['id_revenda']));
        $this->load->config('pagseguro');
        $this->load->library('pagsegurolibrary/pagseguro', 'pagseguro');

        /* Página de Retorno */
        extract($dados);

        $urlCallback = $this->urlCallback;


        $dadosPlano = $this->plano_model->getById($dados['plano']);

        /* Dados Compra */
        $items = array();

        $valorPlano = str_replace(",", ".", str_replace(".", "", $this->funcoes->formataMoedaFloat($dadosPlano['valor_plano'] / 100)));
        $items[] = array(
            'description' => $dadosPlano['nome_plano'],
            'amount' => $valorPlano,
            'quantity' => 1
        );

        $customerTest = pagseguro::getPurchaserTest();

        /* Dados Cliente */
        $customer = array();
        $customer['client_name'] = $dadosLogin['nome_cliente'];
        $customer['client_email'] = $dadosLogin['email_cliente'];
        $customer['client_ddd'] = "";
        $customer['client_phone'] = "";

        /* Dados Frete */
        $shipping = array();

        $shipping['frete'] = 3;
        $shipping['cep'] = "";
        $shipping['rua'] = '';
        $shipping['numero'] = '';
        $shipping['complemento'] = '';
        $shipping['bairro'] = '';
        $shipping['cidade'] = '';
        $shipping['estado'] = '';
        $shipping['pais'] = '';

        /* Referência (ID da Compra)*/
        $reference = $dados['codigoHistorico'];

        /* Gera URL da Pagamento */
        $paymentURL = $this->pagseguro->requestPayment($items, false, $reference, false, $urlCallback);

        /* Redireciona para o PagSeguro */
        if ($paymentURL) {
            echo json_encode(array('tipo' => 'PagSeguro', 'url' => $paymentURL));
            exit();
        } else {
            echo json_encode(array('classe' => 'erro', 'msg' => 'Erro ao redirecionar para o PAGSEGURO. Parâmetros incorretos.'));
            exit();
        }
    }



}

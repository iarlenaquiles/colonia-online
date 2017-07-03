<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends CI_Controller
{

    public function getCidades($idEstado)
    {
            $this->load->model( "cidade_model" );
            $filtro[] = array(
                'campo'    => 'c.id_estado',
                'operador' => null,
                'valor'    => $_REQUEST['idEstado']
            );
            $cidades = $this->cidade_model->getAll($filtro);
            echo json_encode($cidades);
    }

    public function getTiposPeticao($idRamoDireito)
    {
        $this->load->model( "tipo_peticao_model" );
        $filtro[] = array(
            'campo'    => 'tp.id_ramo_direito',
            'operador' => null,
            'valor'    => $_REQUEST['idRamoDireito']
        );
        $filtro[] = array(
            'campo'    => 'tp.ativo',
            'operador' => null,
            'valor'    => 1
        );
        $tipos_peticao = $this->tipo_peticao_model->getAll($filtro);
        echo json_encode($tipos_peticao);
    }

    public function getCamposPeticao()
    {
        $this->load->model( "tipo_peticao_model" );
        $this->load->model( "processo_model" );
        $filtro[] = array(
            'campo'    => 'tp.id_tipo_peticao',
            'operador' => null,
            'valor'    => $_REQUEST['idTipoPeticao']
        );
        if(!empty($_REQUEST['idProcessoPeticao']))
        {
            $filtro[] = array(
                'campo'    => 'pp.id_processo_peticao',
                'operador' => null,
                'valor'    => $_REQUEST['idProcessoPeticao']
            );
        }

        $camposPeticao = $this->processo_model->getCamposPeticao($filtro);

        $htmlCompleto = '<div class="row"><div class="col-lg-12">';

        foreach($camposPeticao as $campo)
        {
            $campoIndividual = str_replace("#id_campo_peticao",$campo['id_campo_peticao'],$campo['html_campo']);
            $campoIndividual = str_replace("#nome_campo",$campo['nome_campo'],$campoIndividual);
            //Se já existir processo criado busca o valor preenchido
            if(!empty($_REQUEST['idProcessoPeticao'])) {
                $campoIndividual = str_replace("#valor", $campo['valor_campo'], $campoIndividual);
            }else{
                $campoIndividual = str_replace("#valor", "", $campoIndividual);
            }
            $campoIndividual = str_replace("#obrigatorio","required",$campoIndividual);
            $htmlCompleto .= $campoIndividual;
        }

        $htmlCompleto .= '</div></div>';


        $modeloPdf = $this->tipo_peticao_model->getById($_REQUEST['idTipoPeticao']);
        $modeloPdf = str_replace("\r","<br/>",$modeloPdf['modelo_original']);
        echo json_encode(array('campos'=>$htmlCompleto,'modelo_pdf'=> $modeloPdf));
    }

    public function banner()
    {
        $id_banner = $this->input->post("id_banner");
        $acao = $this->input->post("acao");

        if(!empty($acao) && 'Excluir' == $acao)
        {
            $this->load->model( "banner_model" );
            $homologacao = $this->banner_model->delete( $id_banner);
            echo json_encode(array('classe'=> 'acerto', 'msg' => 'Banner excluído com sucesso!'));
        }
    }

    public function companhia()
    {
        $id_companhia = $this->input->post("id_companhia");
        $acao = $this->input->post("acao");

        if(!empty($acao) && 'Inativar' == $acao)
        {
            $this->load->model( "companhia_model" );
            $this->companhia_model->updateStatus($id_companhia,0);
            echo json_encode(array('classe'=> 'acerto', 'msg' => 'Companhia inativada com sucesso!'));
        }
        else if(!empty($acao) && 'Ativar' == $acao)
        {
            $this->load->model( "companhia_model" );
            $this->companhia_model->updateStatus($id_companhia,1);
            echo json_encode(array('classe'=> 'acerto', 'msg' => 'Companhia ativada com sucesso!'));
        }
    }

	public function cidades_xml( $id_estado )
    {
        //$id_estado = $this->input->post( 'id_estado' );

        $this->load->model("cidades_estados_model");

        $filtro[] = array(
        	'campo'    => 'id_estado',
        	'operador' => null,
        	'valor'    => $id_estado
        );
        $XML = $this->cidades_estados_model->getCidades( $filtro, 'xml' );

        echo $XML;
    }

    /*public function load_andamento_qtde()
    {
        $filtro = $this->session->userdata('filtro');

        $this->load->model( "agenda_model" );
        $this->load->model( "exfuncionarios_model" );
        $this->load->model( "sindicatos_model" );
        $this->load->model( "prepostos_model" );

        $data["filtro_preposto"] = $this->prepostos_model->getAll();
        $data["filtro_sindicato"] = $this->sindicatos_model->getAll();

        $data["cadastros"] = $this->agenda_model->countAndamentos();

        $data["titulo"] = "Agenda";
        $this->template->controlearquivo("agenda/agenda_view", $data);
    }*/

    /* Agenda - Aba com a Lista dos Agendamentos */
    public function load_agenda_lista()
    {
        $this->load->model('agenda_model');

        // Filtro
        $numero_funcional       = $this->input->post("numero_funcional");
        $nome_exfuncionario     = $this->input->post("nome_exfuncionario");
        $preposto               = $this->input->post("preposto");
        $sindicato              = $this->input->post("sindicato");
        $filtro_data_homolog    = $this->input->post("filtro_data_homolog");
        $data_demissao          = $this->input->post("data_demissao");

        $filtro = null;

        if ($numero_funcional != "") {

            $filtro['numero_funcional'] = array(
                "campo"    => "ex_funcionarios.cod_funcional",
                "operador" => null,
                "valor"    => $numero_funcional
            );
        } else {
            unset($filtro['numero_funcional']);
        }

        if ($nome_exfuncionario != "") {

            $filtro['nome_exfuncionario'] = array(
                "campo"    => "ex_funcionarios.nome",
                "operador" => 'LIKE',
                "valor"    => $nome_exfuncionario
            );
        } else {
            unset($filtro['nome_exfuncionario']);
        }

        if ($preposto != "") {

            $where = "agenda.id IN (SELECT id_agenda FROM agenda_homologacao WHERE id_preposto = $preposto)";

            $filtro['preposto'] = array(
                "campo"    => null,
                "operador" => null,
                "valor"    => $where
            );
        } else {
            unset($filtro['preposto']);
        }

        if ($sindicato != "") {

            $filtro['sindicato'] = array(
                "campo"    => "ex_funcionarios.id_sindicato",
                "operador" => null,
                "valor"    => $sindicato
            );
        } else {
            unset($filtro['sindicato']);
        }

        if ($filtro_data_homolog != "") {

            $filtro_data_homolog = implode('-', array_reverse(explode('/', $filtro_data_homolog)));

            $filtro['filtro_data_homolog'] = array(
                "campo"    => null,
                "operador" => null,
                "valor"    => "(SELECT agenda_homologacao.data FROM agenda_homologacao WHERE agenda_homologacao.id_agenda = agenda.id ORDER BY tentativa DESC LIMIT 1) = '".$filtro_data_homolog."'"
            );
        } else {
            unset($filtro['filtro_data_homolog']);
        }

        if ($data_demissao != "") {

            $data_demissao = implode('-', array_reverse(explode('/', $data_demissao)));

            $filtro['data_demissao'] = array(
                "campo"    => "ex_funcionarios.data_desligamento",
                "operador" => "LIKE",
                "valor"    => $data_demissao
            );
        } else {
            unset($filtro['data_demissao']);
        }

        $aba = $this->input->post('aba');
        $data['aba'] = $aba;
        $data['cadastros'] = $this->agenda_model->getByStatus( $aba, $filtro );

        echo $this->load->view('agenda/agenda_ajax_view', $data);
    }

    /* Agenda - Prepostos */
    public function salva_preposto()
    {
        $id_agenda                = $this->input->post("id_agenda");
        $id_preposto              = $this->input->post("id_preposto");
        $obs_preposto             = $this->input->post("obs_preposto");
        $tentativa                = $this->input->post("tentativa");
        $telegrama                = $this->input->post("telegrama");
        $doc_digitalizada         = $this->input->post("docdigital");
        $confirmacao_funcionario  = $this->input->post("conffunc");
        $confirmacao_preposto     = $this->input->post("confprepos");
        $id_sindicato             = $this->input->post("id_sindicato");

        $this->load->model( "agenda_model" );
        $this->load->model( "prepostos_model" );

        $preposto = $this->prepostos_model->getById( $id_preposto );
        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

        if ( $homologacao!=null && $homologacao[ count($homologacao)-1 ]['tentativa']==$tentativa ) {

            $id = $homologacao[ count($homologacao)-1 ]['id'];

            $this->agenda_model->updateHomologacao( $id, "N/D", $id_preposto, "N/D", "N/D", "N/D", "N/D", $preposto['valor_'.$tentativa], "N/D", "N/D", "N/D", $telegrama,
            $doc_digitalizada, $confirmacao_funcionario, $confirmacao_preposto, $id_sindicato);

            $this->agenda_model->update( $id_agenda, "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", $obs_preposto,0);

            $this->agenda_model->updateAndamento( $id_agenda, 2 );

            echo "true";
        } else {
            echo "false";
        }
    }

    /* Confirma Funcionário */
    public function confirma_funcionario()
    {
        $id_agenda_homologacao                = $this->input->post("id_agenda_homologacao");
        $sucesso_contato              = $this->input->post("sucesso_contato");
        $nova_tentativa             = $this->input->post("nova_tentativa");
        $realizou_exame = $this->input->post("realizou_exame");

        $this->load->model( "agenda_model" );


        $this->agenda_model->updateRealizouExame($id_agenda_homologacao, $realizou_exame);

        if(!empty($sucesso_contato) && ('Sim' == $sucesso_contato || ('Não' == $sucesso_contato && (5 == $nova_tentativa))))
        {
            $this->agenda_model->updateHomologacao(
                $id_agenda_homologacao, "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D",
                "N/D", "on", "N/D", "N/D"
            );
        }

        $this->agenda_model->insertConfirmacaoFuncionario($id_agenda_homologacao, $nova_tentativa, $sucesso_contato, date('Y-m-d H:i:s'));
    }

    /* Confirma Gestor */
    public function confirma_gestor()
    {
        $id_agenda_homologacao                = $this->input->post("id_agenda_homologacao");
        $sucesso_contato              = $this->input->post("sucesso_contato");
        $nova_tentativa             = $this->input->post("nova_tentativa");

        $nome_gerente             = $this->input->post("nome_gerente");
        if(empty($nome_gerente))
            $nome_gerente = "";

        $matricula_gerente             = $this->input->post("matricula_gerente");
        if(empty($matricula_gerente))
            $matricula_gerente = "";


        $this->load->model( "agenda_model" );

        if(!empty($sucesso_contato) && 'Sim' == $sucesso_contato || ('Não' == $sucesso_contato && (5 == $nova_tentativa)))
        {
            $this->agenda_model->updateHomologacao(
                $id_agenda_homologacao, "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D",
                "N/D", "N/D", "on", "N/D"
            );
        }
        $this->agenda_model->insertConfirmacaoGestor($id_agenda_homologacao, $nova_tentativa, $sucesso_contato, date('Y-m-d H:i:s'),$nome_gerente, $matricula_gerente);

    }

    /* Salva documentos */
    public function salva_documentos()
    {
        $id_agenda_homologacao                = $this->input->post("id_agenda_homologacao");
        $nome_pasta              = $this->input->post("nome_pasta");
        $recebimento_doc             = $this->input->post("recebimento_doc");

        $this->load->model( "agenda_model" );

        if(!empty($recebimento_doc) && 'on' == $recebimento_doc)
        {
            $this->agenda_model->updateHomologacao(
                $id_agenda_homologacao, "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D",
                "on", "N/D", "N/D", "N/D","on",$nome_pasta
            );
        }
        else{
            $this->agenda_model->updateHomologacao(
                $id_agenda_homologacao, "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D",
                "N/D", "N/D", "N/D", "N/D","N/D",$nome_pasta
            );
        }
    }

    //Salva os motivos da pendencia
    public function salva_motivos_pendencia()
    {
        $count = count($_REQUEST['linha']);

        $id_agenda_homologacao                = $_REQUEST['id_agenda_homologacao'];//$this->input->post("id_agenda_homologacao");
        $observacao_pendencia              = $_REQUEST['observacao_pendencia'];
        $interesse_homologar             = $_REQUEST['interesse_homologar'];

        $motivos = array();
        for($i =0; $i < $count;$i++)
        {
            $motivos[$i]['motivo_principal'] = '';
            $motivos[$i]['sub_motivo'] = '';
            $motivos[$i]['outro'] = '';
        }
        foreach($_REQUEST['motivo_principal'] as $key => $motivo_principal)
        {
            $motivos[$key]['motivo_principal'] = $motivo_principal;
            //echo "CHAVE".$key."MOVIO".$motivo_principal;
        }
        foreach($_REQUEST['sub_motivo'] as $key => $subMotivos)
        {
            $motivos[$key]['sub_motivo'] = $subMotivos;
            //echo "CHAVE".$key."MOVIO".$motivo_principal;
        }
        foreach($_REQUEST['outro'] as $key => $outros)
        {
            $motivos[$key]['outro'] = $outros;
            //echo "CHAVE".$key."MOVIO".$motivo_principal;
        }

        foreach($motivos as $m)
        {
            $this->load->model( "motivo_pendencia_model" );
            if(!empty($m['sub_motivo']) && 'OUTROS' == $m['sub_motivo'])
                $m['sub_motivo'] = 0;
            $this->motivo_pendencia_model->insert($id_agenda_homologacao, $m['motivo_principal'], $m['sub_motivo'], $m['outro'], date('Y-m-d'));
        }

        $this->load->model( "agenda_model" );
        $this->agenda_model->updateHomologacao(
            $id_agenda_homologacao, "N/D", "N/D", "N/D", "N/D", 5, "N/D", "N/D", "N/D",
            "N/D", "N/D", "N/D", "N/D",'N/D',null
        );

        $idPendencia = $this->motivo_pendencia_model->insertHomologacaoPendente($id_agenda_homologacao,$interesse_homologar,$observacao_pendencia);

        //redirect("agenda/exibir_motivo_pendencia/".$idPendencia);
        // array('teste'=> 'vaca');
    }



    /* Agenda - Gestores */
    public function salva_gestor()
    {
        $id_agenda                = $this->input->post("id_agenda");
        $id_gestor             = $this->input->post("id_gestor");
        $obs_gestor             = $this->input->post("obs_gestor");
        $tentativa                = $this->input->post("tentativa");
        $telegrama                = $this->input->post("telegrama");
        $doc_digitalizada         = $this->input->post("docdigital");
        $confirmacao_funcionario  = $this->input->post("conffunc");
        $confirmacao_preposto     = $this->input->post("confprepos");
        $id_sindicato             = null;//$this->input->post("id_sindicato");

        $this->load->model( "agenda_model" );
        $this->load->model( "gestores_model" );

        $gestor = $this->gestores_model->getById( $id_gestor );
        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );


        if ( $homologacao!=null && $homologacao[ count($homologacao)-1 ]['tentativa']==$tentativa ) {
            $id = $homologacao[ count($homologacao)-1 ]['id'];

            $this->agenda_model->updateHomologacao( $id, "N/D", $id_gestor, "N/D", "N/D", "N/D", "N/D", "0", "N/D", "N/D", "N/D", $telegrama,
                $doc_digitalizada, $confirmacao_funcionario, $confirmacao_preposto, $id_sindicato);

            $this->agenda_model->update( $id_agenda, "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", $obs_gestor,0);

            if(!empty($homologacao[ count($homologacao)-1 ]['data']) && !empty($homologacao[ count($homologacao)-1 ]['hora']))
            {
                $this->agenda_model->updateAndamento( $id_agenda, 2 );
            }

            echo "true";
        }
        /*elseif($homologacao!=null && !empty($tentativa) && ($homologacao[ count($homologacao)-1 ]['tentativa']!=$tentativa)){
            //echo "ENTRO AQUI";
            $this->agenda_model->insertHomologacao(
                $id_agenda, "N/D", $id_gestor, "", "N/D", "", $tentativa, "N/D", "N/D", "N/D", "N/D",
                "N/D", "N/D", "N/D", "N/D"
            );
        }*/
        else {
            echo "false";
        }
    }

        /* Agenda - Altera o Prepostos */
    public function altera_preposto()
    {
        $id_agenda = $this->input->post("id_agenda");

        $this->load->model( "agenda_model" );
        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

        if ( $homologacao!=null ) {

            $id = $homologacao[ count($homologacao)-1 ]['id'];

            $this->agenda_model->updateHomologacao( $id, "N/D", null, "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D",
            "N/D", "N/D", "N/D", "N/D");

            echo "true";
        } else {
            echo "false";
        }
    }

    /* Agenda - Altera o Gestor */
    public function altera_gestor()
    {
        $id_agenda = $this->input->post("id_agenda");

        $this->load->model( "agenda_model" );
        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

        if ( $homologacao!=null ) {

            $id = $homologacao[ count($homologacao)-1 ]['id'];

            $this->agenda_model->updateHomologacao( $id, "N/D", null, "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D",
                "N/D", "N/D", "N/D", "N/D");

            echo "true";
        } else {
            echo "false";
        }
    }

    public function load_preposto_selecionado()
    {
        $this->load->model( "agenda_model" );
        $this->load->model( "prepostos_model" );

        $id_agenda = $this->input->post('id_agenda');
        $id_preposto = $this->input->post('id_preposto');

        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

        $data['info_agenda']   = $this->agenda_model->getById( $id_agenda );
        $data['info_preposto'] = $this->prepostos_model->getById( $id_preposto );
        $data['info_preposto']['valor_homologacao'] = $homologacao[ count($homologacao)-1 ]['valor_homologacao'];

        $this->load->view("agenda/agenda_modal_prepostos_selecionado_view", $data);
    }

    public function load_gestor_selecionado()
    {
        $this->load->model( "agenda_model" );
        $this->load->model( "gestores_model" );
        $this->load->model("usuario_model");
        $id_agenda = $this->input->post('id_agenda');
        $id_gestor = $this->input->post('id_gestor');

        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

        $id_usuario = $this->session->userdata("id");
        $data["privilegios"] = $this->usuario_model->getPrivilegios( $id_usuario );

        $data['info_agenda']   = $this->agenda_model->getById( $id_agenda );
        $info_gestor = $this->gestores_model->getById( $id_gestor );
        $data['info_gestor'] = $this->gestores_model->getById( $id_gestor );
        $data['info_gestor']['valor_homologacao'] = null;//$homologacao[ count($homologacao)-1 ]['valor_homologacao'];

        $gestoresAnteriores = array();
        $posicao = 0;
        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );
        foreach($homologacao as $posicao => $homo)
        {
            if(!empty($homo['id_gestor']) && ($info_gestor['id'] != $homo['id_gestor'])
                && (!empty($homo['status'])))
            {
                $gestoresAnteriores[$posicao]['gestor'] = $this->gestores_model->getById( $homo['id_gestor'] );
                $gestoresAnteriores[$posicao]['gestor']['tentativa'] = $homo['tentativa'];
            }
            $posicao ++;
        }
        $data['gestores_anteriores']     = $gestoresAnteriores;

        $this->load->view("agenda/agenda_modal_gestores_selecionado_view", $data);
    }

    public function load_prepostos()
    {
        $id_agenda = $this->input->post('id_agenda');

        $this->load->model("agenda_model");
        $this->load->model("exfuncionarios_model");
        $this->load->model("sindicatos_model");
        $this->load->model("prepostos_model");

        $info_agenda = $this->agenda_model->getById( $id_agenda );
        $info_exfunc = $this->exfuncionarios_model->getById( $info_agenda['id_exfuncionario'] );

        $filtro_preposto[] = array(
            'campo'    => "prepostos.estado",
            'operador' => null,
            'valor'    => $info_exfunc['id_estado']
        );

        $prepostos     = $this->prepostos_model->getAll( $filtro_preposto );
        $info_preposto = null;

        $data['info_agenda']   = $info_agenda;
        $data['info_exfunc']   = $info_exfunc;
        $data['info_preposto'] = $info_preposto;
        $data['prepostos']     = $prepostos;

        $this->load->view( "agenda/agenda_modal_prepostos_view", $data );
    }

    public function load_gestores()
    {
        $id_agenda = $this->input->post('id_agenda');

        $this->load->model("agenda_model");
        $this->load->model("exfuncionarios_model");
        $this->load->model("sindicatos_model");
        $this->load->model("prepostos_model");
        $this->load->model("gestores_model");

        $info_agenda = $this->agenda_model->getById( $id_agenda );
        $info_exfunc = $this->exfuncionarios_model->getById( $info_agenda['id_exfuncionario'] );

        $filtro_gestor[] = array(
            'campo'    => "gestores.estado",
            'operador' => null,
            'valor'    => $info_exfunc['id_estado']
        );

        $gestores     = $this->gestores_model->getAll( $filtro_gestor );
        $info_gestor = null;

        $data['info_agenda']   = $info_agenda;
        $data['info_exfunc']   = $info_exfunc;
        $data['info_gestor'] = $info_gestor;
        $data['gestores']     = $gestores;
        $this->load->view( "agenda/agenda_modal_gestores_view", $data );
    }

    /* Agenda - Homologacao */
    public function salva_homologacao()
    {
        /* Captura as Informações Enviadas */
        $id = $this->input->post("id");

        $id_agenda = $this->input->post("id_agenda");

        $data                     = $this->input->post("data");
        $hora                     = $this->input->post("hora");
        $status                   = $this->input->post("status");
        if(empty($status))
            $status = null;
        $obs                      = $this->input->post("obs");
        $telegrama                = $this->input->post("telegrama");
        $doc_digitalizada         = $this->input->post("doc_digitalizada");
        $confirmacao_funcionario  = $this->input->post("confirmacao_funcionario");
        //$confirmacao_funcionario = 0;
        $confirmacao_preposto     = $this->input->post("confirmacao_preposto");
        //$confirmacao_funcionario = 0;
        $id_sindicato             = $this->input->post("id_sindicato");

        $tentativa = $this->input->post("tentativa");

        $andamento = null;

        /* Verifica as Informações Enviadas */
        $data   = array_reverse(explode('/', $data));



        if (!(strlen($data[0])==4)||!(in_array($data[1],array(1,2,3,4,5,6,7,8,9,10,11,12))))
        {
            $data   = null;
            $hora   = null;
            //$status = null;
            //$obs    = null;
            $telegrama = null;
            $doc_digitalizada = null;
            $confirmacao_funcionario = null;
            $confirmacao_preposto = null;
            $id_sindicato = null;
        } else {
            $data = implode('-', $data);
        }

        $this->load->model("agenda_model");

        //echo "<pre>"; var_dump($status); exit();

        /* Insere ou Atualiza as Informações depois de Verificadas */

        $blnProcessoNormal = true;

        if ($id==null) {
            $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

            if (count($homologacao)<5) {
                if($tentativa != $homologacao[count($homologacao)-1]['tentativa'])
                {
                    if((!empty($data)) || !empty($obs))
                    {

                        $this->agenda_model->insertHomologacao(
                            $id_agenda, "N/D", $data, $hora, "N/D", $obs, $tentativa, "N/D", "N/D", "N/D", $telegrama,
                            $doc_digitalizada, $confirmacao_funcionario, $confirmacao_preposto, $id_sindicato
                        );


                        /*if(!empty($homologacao[count($homologacao)-1]['id_gestor']))
                        {
                            $this->agenda_model->updateAndamento( $id_agenda, 2 );
                        }*/
if(!empty($telegrama) && empty($homologacao[count($homologacao)-1]['telegrama']))
{
   //Atualiza a data do envio do telegrama
   $this->agenda_model->updateDataEnvioTelegrama( $id);
}

                        $agenda_info = $this->agenda_model->getById( $id_agenda );
                        if (($agenda_info["kit_preposto"]=='' || $telegrama=='')) {
                            $andamento = 1;
                        }
                    }
                }
                if ($status=="4") {
                    $this->agenda_model->updateHomologacao(
                        $id, "N/D", "N/D", "N/D", "N/D", $status, $obs, "N/D", "N/D",
                        "N/D", "N/D", "N/D", "N/D",'N/D',null
                    );
                    $this->agenda_model->updateAndamento( $id_agenda, 6);
                    $andamento = 6;
                }
            }
        } else {
            if ($status=="2") {
                $this->agenda_model->updateHomologacao(
                    $id, "N/D", "N/D", "N/D", "N/D", $status, $obs, "N/D", "N/D",
                    "N/D", "N/D", "N/D", "N/D",'N/D',null
                );
                $this->agenda_model->updateAndamento( $id_agenda, 5);
                $andamento = 5;
            }
            else if ($status=="3") {
                $this->agenda_model->update( $id_agenda, null, null, null, null, null, null, null, null ,0);
                $this->agenda_model->updateHomologacao(
                    $id, $id_agenda, "N/D", $data, $hora, $status, $obs, "N/D", "N/D", $telegrama,
                    $doc_digitalizada, $confirmacao_funcionario, $confirmacao_preposto, $id_sindicato,'N/D',""
                );
                $andamento = 1;

                $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

                $idGestorAnterior = $homologacao[count($homologacao)-1]['id_gestor'];
                $this->agenda_model->insertHomologacao(
                    $id_agenda, $idGestorAnterior,"", "", "N/D", "", $tentativa+1, "N/D", "N/D", "N/D", "N/D",
                    "N/D", "N/D", "N/D", "N/D"
                );
            }
            else if ($status=="4") {
                $this->agenda_model->updateHomologacao(
                    $id, "N/D", "N/D", "N/D", "N/D", $status, $obs, "N/D", "N/D",
                    "N/D", "N/D", "N/D", "N/D",'N/D',null
                );
                $this->agenda_model->updateAndamento( $id_agenda, 6);
                $andamento = 6;
            }
            else if ($status=="5") {
                $this->agenda_model->updateHomologacao(
                    $id, "N/D", "N/D", "N/D", "N/D", $status, $obs, "N/D", "N/D",
                    "N/D", "N/D", "N/D", "N/D",'N/D',null
                );
                $blnProcessoNormal = false;
            }
            else {
                $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

                $id_gestor = 0;
                if(!empty($homologacao[ count($homologacao)-1 ]['id_gestor']))
                    $id_gestor = $homologacao[ count($homologacao)-1 ]['id_gestor'];

                if ( $homologacao!=null && $homologacao[ count($homologacao)-1 ]['data']!=null && $homologacao[ count($homologacao)-1 ]['hora']!=null ) {

                    $this->agenda_model->updateHomologacao(
                        $id, $id_agenda, $id_gestor, $data, $hora, $status, $obs, "N/D", "N/D", $telegrama,
                        $doc_digitalizada, $confirmacao_funcionario, $confirmacao_preposto, $id_sindicato,'N/D',null
                    );
                    $agenda_info = $this->agenda_model->getById( $id_agenda );

                    if(!empty($telegrama) && empty($homologacao[count($homologacao)-1]['telegrama']))
                    {
                        //Atualiza a data do envio do telegrama
                        $this->agenda_model->updateDataEnvioTelegrama( $id);
                    }

                    // Caso o gestor já venha selecionado grava muda a aba para homologação
                    if(!empty($homologacao[ count($homologacao)-1 ]['id_gestor']) && !empty($homologacao[ count($homologacao)-1 ]['data']))
                    {
                        $andamento = 2;
                    }
                    /*
                    if ($agenda_info["kit_preposto"]==true && $telegrama==true  && $agenda_info["apto_envio"]==false && $agenda_info["envio_doc_prepos"]==false) {
                        $andamento = 3;
                    }

                    if ($confirmacao_funcionario=='on' && $confirmacao_preposto=='on') {
                        $andamento = 4;
                    }*/
                    if (($status=="1" || $status=="2" || $status=="4") && $homologacao[ count($homologacao)-1 ]['id_gestor']!=null && $confirmacao_funcionario=='on' && $confirmacao_preposto=='on') {
                        $andamento = 5;
                    }
                } else {
                    $this->agenda_model->updateHomologacao(
                        $id, $id_agenda, "N/D", $data, $hora, $status, $obs, "N/D", "N/D", $telegrama,
                        $doc_digitalizada, $confirmacao_funcionario, $confirmacao_preposto, $id_sindicato,'N/D',null
                    );

                    // Caso o gestor já venha selecionado grava muda a aba para homologação
                    if(!empty($homologacao[ count($homologacao)-1]) && !empty($homologacao[ count($homologacao)-1 ]['data']))
                        $this->agenda_model->updateAndamento( $id_agenda, 2);
                }
            }
        }

        if ($andamento!=null && ($blnProcessoNormal == true)) {
            $this->agenda_model->updateAndamento( $id_agenda, $andamento );
        }

        /* ENVIAR SMS AO SALVAR
        if(!empty($agenda_info['celular']) && ($blnProcessoNormal == true))
        {
            $telefoneExFuncionario = str_replace("(", "", $agenda_info['celular']);
            $telefoneExFuncionario = str_replace(")", "", $telefoneExFuncionario);
            $telefoneExFuncionario = str_replace("-", "", $telefoneExFuncionario);
            $telefoneExFuncionario = str_replace(".", "", $telefoneExFuncionario);
            $telefoneExFuncionario = str_replace(" ", "", $telefoneExFuncionario);
            $telefoneExFuncionario = (substr($telefoneExFuncionario,0,1)=='0' ? substr($telefoneExFuncionario,1) : $telefoneExFuncionario);

            if ($telefoneExFuncionario!=null || $telefoneExFuncionario!="0" || $telefoneExFuncionario!="9999999999") {
                //$mensagemExFuncionario = "Sua homologação foi marcada para o dia " .date("d/m/Y", strtotime($data)). " às " .$hora. " horas.";
                $mensagemExFuncionario = "Sua homologacao foi marcada para o dia " .date("d/m/Y", strtotime($data)). " as " .$hora. " horas, no ".$agenda_info['razao_social']." (levar CTPS e exame).Dúvidas ligar(11)30101200.Banco Santander.";
                $this->load->model("sms_model");
                $this->sms_model->envio_sms($telefoneExFuncionario, $mensagemExFuncionario);
            }
        }
        if(!empty($agenda_info['gestor']) && ($blnProcessoNormal == true))
        {
            $this->load->model("gestores_model");
            $info_gestor = $this->gestores_model->getById($agenda_info['gestor']);
            $telefoneGestor = str_replace("(", "", $info_gestor['telefone']);
            $telefoneGestor = str_replace(")", "", $telefoneGestor);
            $telefoneGestor = str_replace("-", "", $telefoneGestor);
            $telefoneGestor = str_replace(".", "", $telefoneGestor);
            $telefoneGestor = str_replace(" ", "", $telefoneGestor);
            $telefoneGestor = (substr($telefoneGestor,0,1)=='0' ? substr($telefoneGestor,1) : $telefoneGestor);

            if ($telefoneGestor!=null || $telefoneGestor!="0" || $telefoneGestor!="9999999999") {
                //$mensagemGestor = "Sua homologação foi marcada para o dia " .date("d/m/Y", strtotime($data)). " às " .$hora. " horas.";
                $mensagemGestor = "Homologação de {$agenda_info['nome_exfuncionario']} agendada para o dia " .date("d/m/Y", strtotime($data)). " as " .$hora. " horas, no ".$agenda_info['razao_social']." (levar CTPS e exame).Dúvidas ligar(11)3010-1200.Banco Santander.";

                $this->load->model("sms_model");
                $this->sms_model->envio_sms($telefoneGestor, $mensagemGestor);
            }
        }*/
        echo "true";
    }

    public function load_homologacao()
    {
        $this->load->model( "agenda_model" );

        $id_agenda = $this->input->post('id_agenda');

        $info_agenda = $this->agenda_model->getById( $id_agenda );

        $info['andamento'] = $info_agenda['andamento'];
        $info['homologacao'] = $this->agenda_model->getHomologacao( $id_agenda );
        echo $this->load->view( 'agenda/agenda_modal_sindicato_homologacao_view', $info, true );
    }

    public function busca_sub_motivos($idMotivoPrincipal)
    {
        $this->load->model( "motivo_pendencia_model" );


        $filtro_motivo[0] = array(
            'campo'    => "motivo_pendencia.ativo",
            'operador' => null,
            'valor'    => 1
        );
        $filtro_motivo[1] = array(
            'campo'    => "motivo_pendencia.id_motivo_pendencia_principal",
            'operador' => null,
            'valor'    => $idMotivoPrincipal
        );

        $motivos = $this->motivo_pendencia_model->getMotivos($filtro_motivo);


        echo json_encode($motivos);
    }


    //Valor Adicional
    /*public function salva_valor()
    {
        $id_agenda = $this->input->post("id_agenda");
        $valor_adicional = str_replace(",", ".", str_replace(".", "", trim( str_replace("R$", "", $this->input->post("valor_adicional")))));
        $tentativa = $this->input->post("tentativa");

        $this->load->model("agenda_model");

        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

        $id = $homologacao[ count($homologacao)-1 ]['id'];

        $this->agenda_model->updateHomologacao( $id, "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", "N/D", $valor_adicional, "N/D",
            "N/D", "N/D", "N/D", "N/D");
    }*/

    public function define_agenda()
    {
        $id_agenda = $this->input->post("id_agenda");
        $id_exfuncionario = $this->input->post("id_exfuncionario");

        $this->session->set_userdata('id_agenda', $id_agenda);
        $this->session->set_userdata('id_exfuncionario', $id_exfuncionario);
    }

    public function retorna_mensagem()
    {
        $this->load->model("agenda_model");
        $this->load->model("exfuncionarios_model");
        $this->load->model("sindicatos_model");

        $id_agenda = $this->input->post("id_agenda");

        $agenda = $this->agenda_model->getById( $id_agenda );
        $homologacao = $this->agenda_model->getHomologacao( $id_agenda );

        $exfuncionario = $this->exfuncionarios_model->getById( $agenda['id_exfuncionario'] );
        $sindicato     = $this->sindicatos_model->getById( $exfuncionario['id_sindicato'] );

        $sindicato = $sindicato['razao_social'];
        $sindicato_endereco = $sindicato['endereco'];
        $data = $homologacao[ count($homologacao)-1 ]['data'];
        $hora = $homologacao[ count($homologacao)-1 ]['hora'];

        $mensagem = "Sua homologação foi marcada para o dia " .$data. " às " .$hora. "horas, no ".$sindicato." (levar CTPS e exame).Dúvidas ligar(11)30101200.Banco Santander.";


        echo $mensagem;
    }
}


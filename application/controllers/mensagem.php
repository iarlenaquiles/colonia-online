<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class mensagem extends CI_Controller
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
        $this->listar();
    }

    public function listar()
    {

        //Carrega Tabelas
        $this->load->model("mensagem_model");
        $this->load->model("revenda_model");
        $idRevenda = $this->session->userdata("id_revenda");

        $data = array();
        $data['registros'] = $this->mensagem_model->getAll(array(

            array(
                'campo_1' => "m.id_revenda_remetente",
                'operador' => "OR",
                'valor_1' => $idRevenda,
                'campo_2' => "m.id_revenda_destinatario",
                'valor_2' => $idRevenda
            )
        ));

        //Lista de Revendas
        $data['revendas'] = $this->revenda_model->getRevendasPiramide(array(
            array(
                'campo' => "rv.id_revenda_principal",
                'operador' => "=",
                'valor' => $idRevenda
            )
        ));

        $data['idRevenda'] = $idRevenda;

        $this->template->controlearquivo("mensagens/listar_view", $data);
    }


    public function enviar()
    {
        //Carrega Tabelas
        $this->load->model("revenda_model");
        $this->load->model("email_model");
        $this->load->model("mensagem_model");


        //Buscar Parametros da Revenda
        $parametrosRevenda = $this->revenda_model->getParametrosRevenda($this->session->userdata("id_revenda"));
        //Verifica se opção de enviar email esta ativado
        if (!empty($parametrosRevenda['mensagem_email_cadastra_mensagem_interna_bln'])) {

            //Dados da Revenda Remetente
            $dadosRevendaRemetente = $this->revenda_model->getById($this->session->userdata("id_revenda"));

            //Dados da Revenda Destinatário
            $dadosRevendaDestinatario = $this->revenda_model->getById($_REQUEST['revenda_destinatario']);

            //Trocar comandos por variaveis
            $comandos = array('[NOME]', '[DATA]', '[HORA]');
            $variavel = array('' . $dadosRevendaDestinatario['nome_revenda'] . '', date('d/m/Y'), date('H:i:s'));

            $enviarEmail = $this->email_model->enviaEmailRevenda(array(
                'assunto' => $parametrosRevenda['assunto_email_cadastra_mensagem_interna'],
                'msg' => str_replace($comandos, $variavel, $parametrosRevenda['mensagem_email_cadastra_mensagem_interna']),
                'para' => $dadosRevendaDestinatario['email']
            ));
            echo "<pre>";
            print_r($enviarEmail);
            echo "</pre>";exit('porrra');
            //Se der algum erro ao enviar Mensagem, para o processo e exibe o erro.
            if (empty($enviarEmail)) {
                echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao tentar enviar Email!<br/>Possíveis erros: <br/> - Configuração do Email SMTP. <br/> - Email inválido.", 'url' => 'reload'));
                exit();
            }
        }


        //Grava Mensagem no Sistema
        $this->mensagem_model->insert(array('id_revenda_remetente' => $this->session->userdata("id_revenda"),
            'id_revenda_destinatario' => $_REQUEST['revenda_destinatario'],
            'assunto_mensagem' => $_REQUEST['assunto'],
            'mensagem' => $_REQUEST['mensagem']
        ));

        echo json_encode(array('classe' => 'acerto', 'msg' => "Mensagem Interna enviada com sucesso!", 'url' => base_url('mensagem/listar')));
        exit();
    }

    public function salvar()
    {
        //Carrega Tabelas
        $this->load->model("mensagem_model");


        //Grava Mensagem no Sistema
        $this->mensagem_model->update($_REQUEST['id_mensagem'], array(
            'assunto_mensagem' => $_REQUEST['assunto'],
            'mensagem' => $_REQUEST['mensagem']
        ));

        echo json_encode(array('classe' => 'acerto', 'msg' => "Mensagem Interna atualizada com sucesso!", 'url' => base_url('mensagem/listar')));
        exit();
    }


    public function marcar_visualizada($idMensagem)
    {
        //Carrega Tabelas
        $this->load->model("mensagem_model");

        //Marcar Mensagem como visualizada
        $this->mensagem_model->marcar_visualizada($idMensagem);
    }

    public function excluir($idMensagem)
    {
        //Carrega Tabelas
        $this->load->model("mensagem_model");

        //Apaga Mensagem
        $this->mensagem_model->delete($idMensagem);

        echo json_encode(array('classe' => 'acerto', 'msg' => "Mensagem excluída com sucesso!", 'url' => base_url('mensagem/listar')));
        exit();
    }

}	
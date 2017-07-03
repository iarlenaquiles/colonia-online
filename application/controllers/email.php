<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class email extends CI_Controller
{
    public function index()
    {
        $this->listar();
    }

    public function listar()
    {

        //Carrega Tabelas
        $this->load->model("email_model");
        $this->load->model("revenda_model");
        $idRevenda = $this->session->userdata("id_revenda");

        $data = array();
        $data['registros'] = $this->email_model->getAll(array(
            array(
                'campo' => "re.id_revenda",
                'operador' => null,
                'valor' => $idRevenda
            )
        ));
        $data['idRevenda'] = $idRevenda;
        $this->template->controlearquivo("emails/listar_view", $data);
    }

    public function enviar_teste()
    {
        echo "tamo aq";
        //Carrega Tabelas
        $this->load->model("email_model");


        //Enviar Email
        $enviarEmail = $this->email_model->enviarEmail(array(
            'assunto' => "TESTE",
            'msg' => "EMAAIL TESTE",
            'para' => $_REQUEST['para']
        ));
    }

    public function enviar()
    {
        //Carrega Tabelas
        $this->load->model("revenda_model");
        $this->load->model("email_model");

        //Se a opção todos for selecionada, envia para todas revendas filhas




        if ('revenda@todos.com.br' == $_REQUEST['para']) {
            //Lista de Revendas
            $revendasFilhas = $this->revenda_model->getRevendasPiramide(array(
                array(
                    'campo' => "rv.id_revenda_principal",
                    'operador' => "=",
                    'valor' => $this->session->userdata("id_revenda")
                )
            ));

            //Revendas Filhas
            foreach ($revendasFilhas as $revenda) {
                //Enviar Email
                $enviarEmail = $this->email_model->EnviarEmail(array(
                    'assunto' => trim($_REQUEST['assunto_email']),
                    'msg' => $_REQUEST['mensagem_email'],
                    'para' => trim($revenda['email'])
                ));

                //Se der algum erro ao enviar Mensagem, para o processo e exibe o erro.
                if (empty($enviarEmail)) {
                    echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao tentar enviar Email!<br/>Possíveis erros: <br/> - Configuração do Email SMTP. <br/> - Email inválido.", 'url' => 'reload'));
                    exit();
                }

                //Grava Email no Sistema
                $this->email_model->insert(array('id_revenda' => $this->session->userdata("id_revenda"),
                    'para' => trim($revenda['email']),
                    'assunto_email' => trim($_REQUEST['assunto_email']),
                    'mensagem_email' => $_REQUEST['mensagem_email']
                ));

                // Aguarda 2 segundos
                sleep(20);
            }

        }
        else if('clientes@todos.com.br' == $_REQUEST['para']) {

            $this->load->model("cliente_model");

            //Lista de Clientes
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

            //Clientes
            $emailsEnviados = array();
            foreach ($loginsAtivos as $cliente) {

                //Não envia email para emails repetidos
                if(!in_array($cliente['email_cliente'],$emailsEnviados))
                {
                    /*
                    //Enviar Email
                    $enviarEmail = $this->email_model->EnviarEmail(array(
                        'assunto' => trim($_REQUEST['assunto_email']),
                        'msg' => $_REQUEST['mensagem_email'],
                        'para' => trim($cliente['email_cliente'])
                    ));

                    //Se der algum erro ao enviar Mensagem, para o processo e exibe o erro.
                    if (empty($enviarEmail)) {
                        echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao tentar enviar Email!<br/>Possíveis erros: <br/> - Configuração do Email SMTP. <br/> - Email inválido.", 'url' => 'reload'));
                        exit();
                    }
/
                    //Grava Email no Sistema
                    $this->email_model->insert(array('id_revenda' => $this->session->userdata("id_revenda"),
                        'para' => trim($cliente['email_cliente']),
                        'assunto_email' => trim($_REQUEST['assunto_email']),
                        'mensagem_email' => $_REQUEST['mensagem_email']
                    ));*/

                    $emailsEnviados[] = $cliente['email_cliente'];
                    // Aguarda 2 segundos
                    sleep(20);
                }
            }

        }else {
            //Enviar Email
            $enviarEmail = $this->email_model->EnviarEmail(array(
                'assunto' => trim($_REQUEST['assunto_email']),
                'msg' => $_REQUEST['mensagem_email'],
                'para' => trim($_REQUEST['para'])
            ));

            //Se der algum erro ao enviar Mensagem, para o processo e exibe o erro.
            if (empty($enviarEmail)) {
                echo json_encode(array('classe' => 'erro', 'msg' => "Erro ao tentar enviar Email!<br/>Possíveis erros: <br/> - Configuração do Email SMTP. <br/> - Email inválido.", 'url' => 'reload'));
                exit();
            }

            //Grava Email no Sistema
            $this->email_model->insert(array('id_revenda' => $this->session->userdata("id_revenda"),
                'para' => trim($_REQUEST['para']),
                'assunto_email' => trim($_REQUEST['assunto_email']),
                'mensagem_email' => $_REQUEST['mensagem_email']
            ));
        }

        echo json_encode(array('classe' => 'acerto', 'msg' => "Email enviado com sucesso!", 'url' => base_url('email/listar')));
        exit();
    }


    public function excluir($idMensagem)
    {
        //Carrega Tabelas
        $this->load->model("email_model");

        //Apaga Mensagem
        $this->email_model->delete($idMensagem);

        echo json_encode(array('classe' => 'acerto', 'msg' => "Email excluído com sucesso!", 'url' => base_url('email/listar')));
        exit();
    }

}	
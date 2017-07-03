<?php

Class email_model extends CI_Model
{
    public function enviarEmail($dados = array())
    {

        $this->load->library('phpmailerlib');

        $mail = new PHPMailer();
        $mail->SetLanguage("br");
        $mail->IsSMTP();   // send via SMTP
        //$mail->SMTPDebug = 2;
        $mail->Host = trim('mail.uniadv.com.br'); // SMTP servers
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        //Verifica Tipo Segurança
        //$mail->SMTPSecure = "tls";
        //$mail->SMTPSecure = "ssl";
        $mail->SMTPSecure = false;

        $mail->CharSet = 'utf-8';
        $mail->Username = trim('contato@uniadv.com.br'); // SMTP username
        $mail->Password = 'C8x0rPo87d'; // SMTP password
        $mail->From = trim('contato@uniadv.com.br'); //ESPECIFICA O FROM(REMETENTE) DA MENSAGEM DENTRO DA CLASSE
        $mail->FromName = trim('UNIADV');
        $mail->ClearAddresses();
        $mail->IsHTML(true);
        $mail->AddAddress(trim($dados['para']));

        $mail->Subject = trim($dados['assunto']);
        $mail->Body = $dados['msg'];

        if (!$mail->Send()) {
            //echo "ERRO";
            return false;
        } else {
           //echo "Email enviado com sucesso!";
            return true;

        }
    }

    public function enviarEmailAntigo($dados = array())
    {
        $config = array();
        $config['useragent'] = "CodeIgniter";
        $config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"


        $config['smtp_crypto'] = 'ssl';
        $config['protocol'] = "smtp";
        $config['smtp_host'] = $parametrosRevenda['email_host_smtp'];
        $config['smtp_port'] = $parametrosRevenda['email_porta'];
        $config['smtp_user'] = $parametrosRevenda['email_usuario'];
        $config['smtp_pass'] = $parametrosRevenda['email_senha'];

        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
        $config['email_crlf'] = "\r\n";
        $config['email_newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->SMTPSecure = 'ssl';
        $this->email->SMTPAuth = true;
        //Verifica Tipo Segurança
        if (!empty($parametrosRevenda['email_tipo_seguranca']) && 'tls' == $parametrosRevenda['email_tipo_seguranca']) {
            $this->email->SMTPSecure = $parametrosRevenda['email_tipo_seguranca'];

        }
        if (!empty($parametrosRevenda['email_tipo_seguranca']) && 'ssl' == $parametrosRevenda['email_tipo_seguranca']) {
            $this->email->SMTPSecure = $parametrosRevenda['email_tipo_seguranca'];

        }

        //CARREGA A CLASSE EMAIL DENTRO DA LIBRARY DO FRAMEWORK
        $this->email->from($parametrosRevenda['email_usuario'], $dadosRevenda['nome_revenda']);                //ESPECIFICA O FROM(REMETENTE) DA MENSAGEM DENTRO DA CLASSE
        $this->email->reply_to($dadosRevenda['email'], $dadosRevenda['nome_revenda']);
        $this->email->to($dados['para']);                         //ESPECIFICA O DESTINATÁRIO DA MENSAGEM DENTRO DA CLASSE
        $this->email->subject($dados['assunto']);         //ESPECIFICA O ASSUNTO DA MENSAGEM DENTRO DA CLASSE
        $this->email->message($dados['msg']);                     //ESPECIFICA O TEXTO DA MENSAGEM DENTRO DA CLASSE
        $this->email->set_mailtype("html");
        if ($dados['anexo'] != null) {
            foreach ($dados['anexo'] as $value) {
                $this->email->attach($value);
            }

        }


        if ($this->email->send()) {
            //echo 'enviou';
            return true;
        } else {
            echo $this->email->print_debugger();
            return false;
        }


        //AÇÃO QUE ENVIA O E-MAIL COM OS PARÂMETROS DEFINIDOS ANTERIORMENTE
        //echo $this->email->print_debugger();
    }

    public function enviaEmailRevenda($dados)
    {
        // Formato 24 horas (de 1 a 24)
        $hora = date('G');
        if (($hora >= 0) AND ($hora < 6)) {
            $saudacao = "Boa Dia, ";
        } else if (($hora >= 6) AND ($hora < 12)) {
            $saudacao = "Bom Dia ";
        } else if (($hora >= 12) AND ($hora < 18)) {
            $saudacao = "Boa Tarde ";
        } else {
            $saudacao = "Boa Noite ";
        }

        //Dados da Revenda Remetente
        $this->load->model("revenda_model");
        //Se for informado o código da Revenda Usa
        if (!empty($dados['id_revenda'])) {
            $dadosRevendaRemetente = $this->revenda_model->getById($dados['id_revenda']);
        } else {
            $dadosRevendaRemetente = $this->revenda_model->getById($this->session->userdata("id_revenda"));
        }

        //LOGOMARCA
        $logo = '';
        if (!empty($dadosRevendaRemetente['foto_revenda'])) {
            $logo = '<img src="' . base_url($dadosRevendaRemetente['foto_revenda']) . '" alt=""/><br/>';
        }
        $comandos = array('[SAUDACOES]', '[LOGOMARCA]');
        $variavel = array('' . $saudacao . '', '' . $logo . '');

        $dados['msg'] = str_replace($comandos, $variavel, $dados['msg']);
        return $this->enviarEmail($dados);
    }


    /**
     * Método para buscar registros na tabela
     * @name getAll
     * @access public
     * @author Tássio Neri
     * @param $filtro Array com parâmetros
     * @return Array retorna array com registros encontrados
     */
    public function getAll($filtro = null)
    {
        $this->db->select("re.*", false);
        $this->db->select("e.*", false);
        $this->db->select("DATE_FORMAT(e.data_envio,'%d/%m/%Y %H:%i:%s') as data_envio", false);

        $this->db->from("email e");
        $this->db->join("revenda_envio_email re", "re.id_email = e.id_email", "left");

        //Se existir filtro, entra na condição dos operadores
        if ($filtro != null) {
            foreach ($filtro as $row) {
                switch ($row['operador']) {
                    case "LIKE":
                        $this->db->like($row['campo'], $row['valor']);
                        break;
                    case "IN":
                        $this->db->where($row['campo'] . " " . $row['operador'] . " " . $row['valor']);
                        break;
                    case "OR":
                        $this->db->where($row['campo_1'] . " = " . $row['valor_1'] . " || " . $row['campo_2'] . " = " . $row['valor_2']);
                        break;
                    case "BETWEEN":
                        $this->db->where($row['campo'] . " BETWEEN '" . $row['valor_1'] . "' AND '" . $row['valor_2'] . "'");
                        break;
                    default:
                        if ($row["campo"] == null) {
                            $this->db->where($row['valor']);
                        } else {
                            $this->db->where($row['campo'], $row['valor']);
                        }
                        break;
                }
            }
        }
        $this->db->group_by('re.id_email');
        $this->db->order_by('re.id_email', "DESC");
        $query = $this->db->get();
        //echo $this->db->last_query(); exit();
        //Se retornar registro na busca, alimenta o array
        if ($query->num_rows() > 0) {

            $revendas = $query->result_array();


        } else {
            $revendas = null;
        }

        return $revendas;
    }

    /**
     * Método para inserir dados na tabela
     * @name insert
     * @access public
     * @author Tássio Neri
     * @param $dados Array dos dados
     * @return int Código do registro inserido
     */
    public function insert($dados)
    {
        // Cria o Insert
        $this->db->set("para", $dados['para']);
        $this->db->set("assunto_email", $dados['assunto_email']);
        $this->db->set("mensagem_email", $dados['mensagem_email']);
        $this->db->set("data_envio", date('Y-m-d H:i:s'));

        $this->db->insert("email");

        $idEmail = $this->db->insert_id();

        $this->db->set("id_revenda", $dados['id_revenda']);
        $this->db->set("id_email", $idEmail);
        $this->db->insert("revenda_envio_email");

        return $idEmail;
    }

    /**
     * Método para excluir registro
     * @name delete
     * @access public
     * @author Tássio Neri
     * @return void
     */
    public function delete($id)
    {
        $this->db->where('id_email', $id)->delete('email');
        $this->db->where('id_email', $id)->delete('revenda_envio_email');
        return true;
    }
}
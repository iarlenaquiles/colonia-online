<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
    public function verificarSenha($idUsuario, $senha) {

        $this->db->where("id", $idUsuario);
        $this->db->where("senha", md5($senha));
        $this->db->from("usuario");

        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            $usuario = $query->result_array();

            $session = array(
                "logado" => true,
                "id" => $usuario[0]["id"],
                "id_usuario" => $usuario[0]["id"],
                "id_revenda" => $usuario[0]['id_revenda'],
                "usuario" => $usuario[0]["usuario"],
                "nome_usuario"=> $usuario[0]["nome_usuario"],
                "alterar_senha"=> $usuario[0]["alterar_senha"],
                "id_grupo_usuario"=> $usuario[0]["id_grupo_usuario"],
                "id_plano_atual"=> $usuario[0]["id_plano_atual"],
                "email" => $usuario[0]["email"],
                "id_franquia" => $usuario[0]["id_franquia"]
            );

            $this->session->set_userdata($session);

            $resultado = true;
        } else {
            $resultado = false;
        }

        return $resultado;

    }
	public function verificaLogin($usuario, $senha) {

		$this->db->where("usuario", $usuario);
		$this->db->where("senha", md5($senha));
		$this->db->where("ativo", true);
        $this->db->join("usuario_vinculo uv", "uv.id_usuario = usuario.id","left");
		$this->db->from("usuario");



		$query = $this->db->get();
        //echo "asda".$this->db->last_query(); exit();


		if ($query->num_rows() == 1) {

			$usuario = $query->result_array();

            //Se for bloqueada a revenda ou a situação for inativa, ou se a data atual for maior que a data validade bloquea o acesso
            if(!empty($usuario[0]['bloquear_revenda']) || 'Inativo'== $usuario[0]['situacao_revenda'] || date('Y-m-d') > $usuario[0]['data_validade'])
            {
                echo json_encode(array('classe'=> 'erro', 'msg' => "Seu painel se encontra-se bloqueado.",'url'=> base_url('login')));
                exit();
            }

            $this->carregaSessao($usuario);

			$resultado = true;
		} else {
			$resultado = false;
		}

		return $resultado;
	}

    public function verificaUsuario($usuario) {

        $this->db->where("usuario", $usuario);
        $this->db->from("usuario");

        $query = $this->db->get();
        //echo "asda".$this->db->last_query(); exit();

        if ($query->num_rows() == 1) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    public function getEmailUsuario($usuario) {

        $this->db->select( "usuario.usuario as email",false);
        $this->db->select( "uv.id_usuario_principal",false);
        $this->db->select( "usuario.id AS id_usuario",false);
        $this->db->where("usuario", $usuario);
        $this->db->from("usuario");
        $this->db->join("usuario_vinculo uv", "uv.id_usuario = usuario.id",false);

        $query = $this->db->get();
        //echo "asda".$this->db->last_query(); exit();

        if ($query->num_rows() == 1) {
            $resultado = $query->result_array();
            return $resultado[0];
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    public function verificaLoginMd5($usuario, $senha) {



        $this->db->where("usuario", $usuario);
        $this->db->where("senha", $senha);
        $this->db->where("ativo", true);
        $this->db->join("usuario_vinculo uv", "uv.id_usuario = usuario.id",false);
        $this->db->join("revenda r", "r.id_revenda = ur.id_revenda",false);
        $this->db->from("usuario");



        $query = $this->db->get();
        //echo "asda".$this->db->last_query(); exit();


        if ($query->num_rows() == 1) {

            $usuario = $query->result_array();

            $this->carregaSessao($usuario);


            $resultado = true;
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    private function carregaSessao($usuario)
    {
        $session = array(
        "logado" => true,
        "id" => $usuario[0]["id"],
        "id_usuario" => $usuario[0]["id"],
        "id_usuario_principal" => $usuario[0]['id_usuario_principal'],
        "usuario" => $usuario[0]["usuario"],
        "nome_usuario"=> $usuario[0]["nome_usuario"],
        "alterar_senha"=> $usuario[0]["alterar_senha"],
        "email" => $usuario[0]["email"],
        "permissao" => $usuario[0]["permissoes_id"],
        "colonia_id" => $usuario[0]["colonia_id"]
        );

        $this->session->set_userdata($session);
    }

    public function getPermissoesUser($idUsuario)
    {

        //SELECT de agenda
        $this->db->select( "*",false);
        $this->db->from( "permissao_usuario pu" );
        $this->db->join("tela t", "t.id_tela = pu.id_tela",false);
        $this->db->where("pu.id_usuario", $idUsuario);
        $this->db->where("t.ativo", 1);
        $this->db->order_by("t.id_tela_principal, t.id_tela, t.titulo ASC");



        $query = $this->db->get();

        //echo "query".$this->db->last_query(); exit();

        if ($query->num_rows() > 0) {

            $registros = $query->result_array();

        } else {
            $registros = null;
        }

        return $registros;
    }

    public function getOperacionaisTelaUser($idModulo,$idUsuario)
    {

        //SELECT de agenda
        $this->db->select( "*",false);
        $this->db->from( "permissao_usuario pu" );
        $this->db->join("tela t", "t.id_tela = pu.id_tela",false);
        $this->db->where("t.id_tela_principal", $idModulo);
        $this->db->where("pu.id_usuario", $idUsuario);
        $this->db->where("t.ativo", 1);
        $this->db->where("t.operacional", 1);
        $this->db->order_by("t.operacional_ordem ASC");



        $query = $this->db->get();

        //echo "query".$this->db->last_query();// exit();

        if ($query->num_rows() > 0) {
            $registros = $query->result_array();
        } else {

            $dadosTela = $this->getDadosTela($idModulo);
            $idTelaPrincipal = $dadosTela['id_tela_principal'];
            $registros = $this->getOperacionaisTelaUser($idTelaPrincipal,$idUsuario);
        }
        return $registros;
    }

    public function getDadosTela($idModulo)
    {

        //SELECT de agenda
        $this->db->select( "*",false);
        $this->db->from( "tela t" );
        $this->db->where("t.id_tela", $idModulo);
        $this->db->where("t.ativo", 1);

        $query = $this->db->get();



        if ($query->num_rows() > 0) {
            $registros = $query->result_array();

        } else {

            $registros = null;
        }
        return $registros[0];
    }

    public function verificaEmail($email) {

        $this->db->where("email", $email);
        $this->db->from("usuario");
        $query = $this->db->get();
        //echo "query".$this->db->last_query(); exit();

        if ($query->num_rows() == 1) {

            $usuario = $query->result_array();

            //echo "<pre>"; print_r($usuario); exit();

            $id_usuario = $usuario[0]['id'];
            $senha_antiga = $usuario[0]['senha'];

            //gera uma chave de segurança que sera usada na recuperação de senha
            //$codigo = md5( $this->randGenerator(10) );
            $novaSenha = $this->randGenerator(6);
            $verifica_chave = false;
            /*
                        while( $verifica_chave == false ) {

                            // procura a chave de segurança no banco pra verificar se nao há nenhuma igual
                            //$this->db->where("codigo", $codigo );
                            //$query_chave = $this->db->get("recupera_senha");

                            if ( $query_chave->num_rows() == 0 ){

                                $verifica_chave = true;
                            } else {

                                $codigo = md5( $this->functions->randGenerator(10) );
                            }
                        }
                        */
            //$this->db->set( "id_usuario", $id_usuario );
            //$this->db->set( "senha_antiga", $senha_antiga );
            //$this->db->set( "codigo", $codigo );
            //$this->db->insert("recupera_senha");

            $this->updateSenha($id_usuario,md5($novaSenha));



            return $novaSenha;
            //$resultado = true;
        } else {

            $resultado = false;
        }

        return $resultado;
    }
    public function enviaEmailNovaSenha($dados){

        $config = array();
        $config['useragent']           = "CodeIgniter";
        $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "mail.semagua.com";
        $config['smtp_port'] = "587";

        $config['smtp_user'] = "afabb@semagua.com";
        $config['smtp_pass'] = "afabb123456";
        $config['mailtype'] = 'html';
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->load->library('email');
        $this->email->initialize($config);
        //CARREGA A CLASSE EMAIL DENTRO DA LIBRARY DO FRAMEWORK
        $this->email->from("afabb@semagua.com", "AFABB");                //ESPECIFICA O FROM(REMETENTE) DA MENSAGEM DENTRO DA CLASSE
        //$this->email->reply_to($dadosRevenda['email'], $dadosRevenda['nome_revenda']);
        $this->email->to($dados['para']);                         //ESPECIFICA O DESTINATÁRIO DA MENSAGEM DENTRO DA CLASSE
        $this->email->subject($dados['assunto']);         //ESPECIFICA O ASSUNTO DA MENSAGEM DENTRO DA CLASSE
        $this->email->message($dados['msg']);	                 //ESPECIFICA O TEXTO DA MENSAGEM DENTRO DA CLASSE
        if ($dados['anexo'] != null) {
            foreach ($dados['anexo'] as $value) {
                $this->email->attach( $value );
            }
        }

        if ($this->email->send())
        {
            //echo 'enviou';
            return true;
        }
        else{
            //echo $this->email->print_debugger();
            return false;
        }
    }
	public function enviaEmail($email, $codigo){

		$EmailFrom = 'suporte@aetcomunicacao.com.br';
		$NomeFrom = 'Email Automatico';

		$EmailTo  = $email;
		$Assunto  = "Envio Automático";

		$data['codigo'] = $codigo;

		$Mensagem = $this->load->view("email/recupera_senha", $data, true);

    	$temp=sleep(5);

		//define os headers(cabeçalhos) de envio
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";
		$headers .= "From: \"$NomeFrom\" <$EmailFrom>\r\n";
		$headers .= "Reply-To: $EmailFrom\n";

		//e define a mensagem tirando barras para evitar problemas no script
		$Mensagem = stripslashes($Mensagem);
		$Assunto  = stripslashes($Assunto);

		mail($EmailTo, $Assunto, $Mensagem, $headers);
	}

	public function updateSenha($id, $senha) {

		$this->db->set( "senha", $senha );

		$this->db->where("id", $id);
		$this->db->update("usuario");
	}

	//gera senhas aleatórias
	private function randGenerator( $tamanho ) {

		if( $tamanho > 0 ){

			$CaracteresAceitos = 'abcdxywzABCDZYWZ0123456789';
			$max = strlen($CaracteresAceitos)-1;
			$password = null;

			for($i=0; $i < $tamanho; $i++) {
				$password .= $CaracteresAceitos{mt_rand(0, $max)};
			}

			return $password;
		}
		else {
			return '';
		}
	}
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class principal extends CI_Controller
{

    public function index()
    {
        echo "ASDSADAS";
        exit();
        $data["titulo"] = "Entrar";
        $this->template->controlesite("home_view", $data);
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

        if ($this->login_model->verificaEmail($email)) {

            redirect("login");
        } else {

            $this->session->set_userdata("erro", "Não há nenhum usuario cadastrado com o email '" . $email . "'");

            redirect("login/recuperar_senha");
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

    public function entrar()
    {

        $this->load->model("login_model");

        $usuario = $this->input->post("usuario");
        $senha = $this->input->post("senha");

        if (empty($usuario) || empty($senha)) {
            $this->session->set_userdata("erro", "Por favor, preencha o Usuário e senha.");
            redirect("login");
        }
        if ($this->login_model->verificaLogin($usuario, $senha)) {
            $this->session->set_userdata("acerto", "Usuário logado com sucesso!");
            redirect("painel");
        } else {
            $this->session->set_userdata("erro", "Usuário ou senha invalidos");
            redirect("login");
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

        //unseta as sessoes
        $this->session->unset_userdata('logado');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('nome_usuario');
        $this->session->unset_userdata('id_filial');

        //destroi as sessoes
        $this->session->sess_destroy();
        //manda pro login com um alert
        redirect("login");
    }
}
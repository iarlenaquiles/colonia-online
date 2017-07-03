<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class sucesso extends CI_Controller
{

    public function index()
    {

        $data = array();
        $this->load->view("login_view", $data);
    }

    public function teste()
    {

        $data = array();
        $this->load->view("cliente_teste_sucesso_view", $data);
    }

}
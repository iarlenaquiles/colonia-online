<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class inicial extends CI_Controller
{
    function index()
    {
        $data = array();
        $this->load->model( "estado_model" );
        $data['estados'] = $this->estado_model->getAll();

        $this->load->model( "solicitacao_correspondente_model" );
        $data['solicitacaoEstados'] = $this->solicitacao_correspondente_model->getEstadosSolicitados();

        $this->template->controlesite("home_view", $data);
    }
}
?>

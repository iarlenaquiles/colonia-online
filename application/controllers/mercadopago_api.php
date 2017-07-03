<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');


/**
 * Created by PhpStorm.
 * User: gilcierweb
 * Date: 27/03/16
 * Time: 11:55
 */
class Mercadopago_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->config('mercadopago');
        $this->load->library('mercadopago/mercadopago', 'mercadopago');

    }

    public function index($dados)
    {

        $CLIENT_ID = trim($this->config->config['mercadopago']['CLIENT_ID']);
        $CLIENT_SECRET = trim($this->config->config['mercadopago']['CLIENT_SECRET']);
        $sandbox = ($this->config->config['mercadopago']['sandbox'] == 'S') ? true : false;
        $url_retorno_notificacao = trim($this->config->config['mercadopago']['url_retorno_notificacao']);

        // estancia o o mercado pago
        $mercado_pago = new Mercadopago($CLIENT_ID, $CLIENT_SECRET);
        $mercado_pago->sandbox_mode($sandbox);

        //Carrega Tabelas
        $this->load->model("cliente_model");
        $this->load->model("plano_model");

        //Buscar dados do Login/Cliente
        $dadosLogin = $this->cliente_model->getByIdLogin($this->session->userdata("id_login"));

        $this->session->set_userdata(array('id_revenda_pagamento' => $dadosLogin['id_revenda']));

        /* Página de Retorno */
        extract($dados);

        $dadosPlano = $this->plano_model->getById($dados['plano']);

        /* Dados Compra */
        $items = array();

        $valorPlano = str_replace(",", ".", str_replace(".", "", $this->funcoes->formataMoedaFloat($dadosPlano['valor_plano'] / 100)));

        /* Referência (ID da Compra)*/
        $reference = $dados['codigoHistorico'];

        $preference_data = array(

            "items" => array(
                array(
                    "id" => $dadosPlano['id_plano'],
                    "title" => $dadosPlano['nome_plano'],
                    "currency_id" => "BRL",
                    "picture_url" => "https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
                    "description" => $dadosPlano['nome_plano'],
                    "category_id" => "Category",
                    "quantity" => 1,
                    "unit_price" => (float)$valorPlano
                )
            ),

            "payer" => array(
                "name" => $dadosLogin['nome_cliente'],
                "surname" => $dadosLogin['nome_cliente'],
                "email" => $dadosLogin['email_cliente'],
                "date_created" => "2016-03-28T09:50:37.521-04:00",
//                "phone" => array(
//                    "area_code" => "11",
//                    "number" => "4444-4444"
//                ),
//                "identification" => array(
//                    "type" => "DNI",
//                    "number" => "12345678"
//                ),
//                "address" => array(
//                    "street_name" => "Street",
//                    "street_number" => 123,
//                    "zip_code" => "1430"
//                )
            ),
//
//            "back_urls" => array(
//                "success" => "https://www.success.com",
//                "failure" => "http://www.failure.com",
//                "pending" => "http://www.pending.com"
//            ),
//            "auto_return" => "approved",
//            "payment_methods" => array(
//                "excluded_payment_methods" => array(
//                    array(
//                        "id" => "amex",
//                    )
//                ),
//                "excluded_payment_types" => array(
//                    array(
//                        "id" => "ticket"
//                    )
//                ),
//                "installments" => 24,
//                "default_payment_method_id" => null,
//                "default_installments" => null,
//            ),
//            "shipments" => array(
//                "receiver_address" => array(
//                    "zip_code" => "1430",
//                    "street_number" => 123,
//                    "street_name" => "Street",
//                    "floor" => 4,
//                    "apartment" => "C"
//                )
//            ),
            "notification_url" => $url_retorno_notificacao,
            "external_reference" => $reference,
//            "expires" => false,
//            "expiration_date_from" => null,
//            "expiration_date_to" => null
        );

//        echo '<pre>';
//        print_r($preference_data);
//        echo '<pre>';exit;
        $preference = $mercado_pago->create_preference($preference_data);

        /* Gera URL da Pagamento */
        if ($sandbox == true) {
            $paymentURL = trim($preference['response']['sandbox_init_point']); // URL development SANDBOX
        } else {
            $paymentURL = trim($preference['response']['init_point']); // URL production
        }

        /* Redireciona para o PagSeguro */
        if ($paymentURL) {
            echo json_encode(array('tipo' => 'MercadoPago', 'url' => $paymentURL));
            exit();
        } else {
            echo json_encode(array('classe' => 'erro', 'msg' => 'Erro ao redirecionar para o Mercado Pago. Parâmetros incorretos.'));
            exit();
        }

    }

    public function Notifications()
    {
        // Create an instance with your MercadoPago credentials (CLIENT_ID and CLIENT_SECRET):
        // Brasil: https://www.mercadopago.com/mlb/ferramentas/aplicacoes
        $CLIENT_ID = trim($this->config->config['mercadopago']['CLIENT_ID']);
        $CLIENT_SECRET = trim($this->config->config['mercadopago']['CLIENT_SECRET']);
        $sandbox = ($this->config->config['mercadopago']['sandbox'] == 'S') ? true : false;

        // estancia o o mercado pago
        $mercado_pago = new Mercadopago($CLIENT_ID, $CLIENT_SECRET);
        $mercado_pago->sandbox_mode($sandbox);

        $params = array("access_token" => $mercado_pago->get_access_token());

        // Get the payment reported by the IPN. Glossary of attributes response in https://developers.mercadopago.com
        $MP_id_return = strip_tags(trim($_REQUEST["id"]));
        $MP_topic_return = strip_tags(trim($_REQUEST["topic"]));

        if ($MP_topic_return == 'payment') {
            $payment_info = $mercado_pago->get("/collections/notifications/" . $MP_id_return, $params, false);
            $merchant_order_info = $mercado_pago->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"], $params, false);
            // Get the merchant_order reported by the IPN. Glossary of attributes response in https://developers.mercadopago.com
        } elseif ($MP_topic_return == 'merchant_order') {
            $merchant_order_info = $mercado_pago->get("/merchant_orders/" . $MP_id_return, $params, false);
        }

        //If the payment's transaction amount is equal (or bigger) than the merchant order's amount you can release your items
        if ($merchant_order_info["status"] == 200) {
            $transaction_amount_payments = 0;
            $transaction_amount_order = $merchant_order_info["response"]["total_amount"];
            $payments = $merchant_order_info["response"]["payments"];
            foreach ($payments as $payment) {
                if ($payment['status'] == 'approved') {
                    $transaction_amount_payments += $payment['transaction_amount'];
                }
            }
            if ($transaction_amount_payments >= $transaction_amount_order) {
                echo "release your items";
            } else {
                echo "dont release your items";
            }
        } else {
            echo 'Error Mercado Pago';
        }
    }

    public function ReturnTransaction()
    {
        $this->Notifications();
    }

    public function search()
    {
        //Verificação da Sessão de Login
        $this->load->library("autenticacao");
        $this->load->helper("Util");

        //Carrega Tabelas
        $this->load->model("cliente_model");
        $this->load->model("revenda_model");
        $this->load->model("plano_carreira_model");

        //Dados da Revenda
        $dadosRevenda = $this->revenda_model->getById($this->session->userdata("id_revenda"));

        $this->load->model("profile_model");
        $data['profiles'] = $this->profile_model->getAll(array(
            array(
                'campo' => "rp.id_revenda",
                'operador' => null,
                'valor' => $this->session->userdata("id_revenda")
            )
        ));

        $CLIENT_ID = trim($this->config->config['mercadopago']['CLIENT_ID']);
        $CLIENT_SECRET = trim($this->config->config['mercadopago']['CLIENT_SECRET']);
        $sandbox = ($this->config->config['mercadopago']['sandbox'] == 'S') ? true : false;

        // estancia o o mercado pago
        $mercado_pago = new Mercadopago($CLIENT_ID, $CLIENT_SECRET);
        $mercado_pago->sandbox_mode($sandbox);

        $data = array();
        $range_input = $this->input->post('range', TRUE);
        $range = (!empty($range_input)) ? trim($range_input) : "date_created";
        $begin_date_input = $this->input->post('begin_date', TRUE);
        if (!empty($begin_date_input)) {
            $begin_date = explode('/', trim($begin_date_input));
            $begin_date = "{$begin_date[2]}-{$begin_date[1]}-{$begin_date[0]}T00:00:00Z"; //YYYYMMDD (20071103) 2014-10-21T00:00:00Z
        } else {
            $begin_date = "NOW-1MONTH";
        }
        $end_date_input = $this->input->post('end_date', TRUE);
        if (!empty($end_date_input)) {
            $end_date = explode('/', trim($end_date_input));
            $end_date = "{$end_date[2]}-{$end_date[1]}-{$end_date[0]}T24:00:00Z"; //YYYYMMDD (20071103) 2014-10-25T24:00:00Z
        } else {
            $end_date = "NOW";
        }

        $status_input = $this->input->post('status', TRUE);
        $status = (!empty($status_input)) ? trim($status_input) : "approved";
        $operation_type_input = $this->input->post('operation_type', TRUE);
        $operation_type = (!empty($operation_type_input)) ? trim($operation_type_input) : "regular_payment";

        // Sets the filters you want
        $filters = array(
            "range" => $range,
            "begin_date" => $begin_date,
            "end_date" => $end_date,
            "status" => $status,
            "operation_type" => $operation_type
        );

        // Search payment data according to filters
        $data['searchResult'] = $mercado_pago->search_payment($filters);

        $this->template->controlearquivo("mercadopago/search_approved_payments", $data);

    }
}
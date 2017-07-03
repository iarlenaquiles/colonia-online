<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

/**
 * Payment
 *
 * @package    MY_Controller
 * @subpackage Payment
 * @author     Bruno Nunes <newjob@brunodev.com.br>
 */
class Payment extends CI_Controller
{
    private $urlCallback;

    public function __construct()
    {
        parent::__construct();

        $this->urlCallback = base_url('payment/callback');

        $this->load->config('pagseguro');
        $this->load->library('pagsegurolibrary/pagseguro', 'pagseguro');

    }

    public function index()
    {
        /* Página de Retorno */
        extract($_POST);

        $urlCallback = $this->urlCallback;

        /* Dados Compra */
        $items = array();

        $items[] = array(
            'description' => 'Produto 1',
            'amount' => '1400.00',
            'quantity' => 1
        );


        $customerTest = pagseguro::getPurchaserTest();

        /* Dados Cliente */
        $customer = array();
        $customer['client_name'] = $customerTest['name'];
        $customer['client_email'] = $customerTest['email'];
        $customer['client_ddd'] = $customerTest['ddd'];
        $customer['client_phone'] = $customerTest['phone'];

        /* Dados Frete */
        $shipping = array();

        $shipping['frete'] = 3;
        $shipping['cep'] = '78280-000';
        $shipping['rua'] = 'Av. Getúlio Vargas';
        $shipping['numero'] = '123';
        $shipping['complemento'] = '';
        $shipping['bairro'] = 'Centro';
        $shipping['cidade'] = 'Cuiabá';
        $shipping['estado'] = 'Mato Grosso';
        $shipping['pais'] = 'Brasil';

        /* Referência (ID da Compra)*/
        $reference = 1;

        /* Gera URL da Pagamento */
        $paymentURL = $this->pagseguro->requestPayment($items, false, $reference, false, $urlCallback);
        //pre($paymentURL,1);
        /* Redireciona para o PagSeguro */

        if ($paymentURL) {
            redirect($paymentURL);
        }

    }


    /**
     * retornoPagamentoPagseguro
     *
     * Recebe o retorno de pagamento da promoção via pagseguro
     * @access public
     * @return void
     */
    public function callback()
    {
        $this->retornoTransacao();
        /*
        $transaction = false;

        // Verifica se existe a transação
        if ($this->input->get ( 'transaction_id' )) {
            $transaction = self::TransactionNotification ( $this->input->get ( 'transaction_id' ) );
        }

        // Se a transação for um objeto
        if (is_object ( $transaction )) {
            self::setTransacaoPagseguro($transaction);
        }

        print_r($transaction);

        //redirect ( base_url('payment/thanks') );

        */

    }

    /**
     * NotificationListener
     *
     * Recebe as notificações do pagseguro sobre atualização de pagamento.
     * @access public
     * @return bool
     */
    public function NotificationListener()
    {

        header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
        $code = trim($_REQUEST['notificationCode']);//(isset ( $_POST ['notificationCode'] ) && trim ( $_POST ['notificationCode'] ) !== "" ? trim ( $_POST ['notificationCode'] ) : null);
        $type = trim($_REQUEST['notificationType']);//(isset ( $_POST ['notificationType'] ) && trim ( $_POST ['notificationType'] ) !== "" ? trim ( $_POST ['notificationType'] ) : null);
        $transaction = false;

        if (!empty($code) && !empty($type)) {

            $notificationType = new PagSeguroNotificationType ($type);
            $strType = $notificationType->getTypeFromValue();
            switch ($strType) {
                case 'TRANSACTION' :
                    $transaction = self::TransactionNotification($code);
                    break;
                case 'transaction' :
                    $transaction = self::TransactionNotification($code);
                    break;
                default :
                    LogPagSeguro::error("Unknown notification type [" . $notificationType->getValue() . "]");
            }
        } else {
            LogPagSeguro::error("Parameters da Notificação são inválidos.");
            self::printLog();
        }
        if (is_object($transaction)) {
            self::setTransacaoPagseguro($transaction);
        }
        return TRUE;
    }

    /**
     * setTransacaoPagseguro
     *
     * Seta os status da transação vindas do Pagseguro
     *
     * @param array $transaction
     * @return void
     */
    private function setTransacaoPagseguro($transaction = null)
    {
        // Pegamos o objeto da transação
        $transactionObj = self::getTransaction($transaction);


        //Carrega Tabelas
        $CI = &get_instance();
        $CI->load->model("cliente_model");

        // Buscamos a venda
        if ($transactionObj ['reference']) {

            //Busca dados do Login
            $dadosLogins = $CI->cliente_model->buscarLogins(array(array(
                    'campo' => "lhp.id_login_historico_pagamento",
                    'operador' => null,
                    'valor' => $transactionObj ['reference']
                )
                )
            );
            $idLoginHistoricoPagamento = $transactionObj ['reference'];

        } else {
            //Busca dados do Login
            $dadosLogins = $CI->cliente_model->buscarLogins(array(array(
                    'campo' => "lhp.id_login_historico_pagamento",
                    'operador' => null,
                    'valor' => $transactionObj ['Reference']
                )
                )
            );
            $idLoginHistoricoPagamento = $transactionObj ['reference'];
        }


        // existindo a venda
        if (!empty($dadosLogins)) {
            $dataPagamento = '';

            // Aguardando pagamento
            if ($transactionObj ['status'] == 1) {
                // ACAO PARA AGUARDANDO PAGAMENTO
                $situacaoPagamento = "Aguardando Pagamento";
            }
            // Aguardando aprovação
            if ($transactionObj ['status'] == 2) {
                // ACAO PARA GUARDAR TRANSACAO AGUARDANDO APROVACAO
                $situacaoPagamento = "Aguardando Pagamento";
            }
            // Transação paga
            if ($transactionObj ['status'] == 3) {
                // ACAO PARA TRANSACAO PAGA

                //Se a data de pagamento for maior que a data de vencimento
                $dataValidade = explode(" ", $dadosLogins[0]['validade']);
                $dataPagamento = date('Y-m-d');
                if ($dataPagamento > $dataValidade[0]) {
                    $novaDataVencimento = new DateTime($dataPagamento);
                    $novaDataVencimento->modify("+" . $dadosLogins[0]['dias_plano'] . " day");
                    $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
                } else {
                    $novaDataVencimento = new DateTime($dataValidade[0]);
                    $novaDataVencimento->modify("+" . $dadosLogins[0]['dias_plano'] . " day");
                    $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
                }
                $CI->cliente_model->updateLogin($dadosLogins[0]['id_login'], array(
                        'validade' => $novaDataVencimento . " " . date('H:i:s'),
                        'situacao_login' => 'Ativo',
                        'id_plano' => $dadosLogins[0]['id_plano_escolhido'])
                );
                $situacaoPagamento = "Pago";
            }
            // Pagamento cancelado
            if ($transactionObj ['status'] == 7) {
                // ACAO PARA TRANSACAO CANCELADA
                $situacaoPagamento = "Cancelado";
            }

            //Atualiza histórico Pagamento
            $historico = $CI->cliente_model->updateHistoricoPagamentoLogin($idLoginHistoricoPagamento,
                array('data_pagamento' => $dataPagamento,
                    'situacao_pagamento' => $situacaoPagamento
                )
            );

            // VC PODE COLOCAR A URL QUE VC DESEJA ENVIAR O USUARIO APOS CONCLUIR A COMPRA
        }
    }

    /**
     * Método que registra logs do pagseguro
     * @access private
     * @param String $strType
     */
    private static function printLog($strType = null)
    {
        $count = 30;
        echo "<h2>Receive notifications</h2>";
        if ($strType) {
            echo "<h4>notifcationType: $strType</h4>";
        }
        echo "<p>Last <strong>$count</strong> items in <strong>log file:</strong></p><hr>";
        echo LogPagSeguro::getHtml($count);
    }

    public function thanks()
    {
        $this->load->view('payment/thanks');
    }

    /**
     * getTransaction
     *
     * Método para buscar a transação no pag reguto
     * @access public
     * @param PagSeguroTransaction $transaction
     * @return array
     */
    public static function getTransaction(PagSeguroTransaction $transaction)
    {
        return array('reference' => $transaction->getReference(), 'status' => $transaction->getStatus()->getValue());
    }

    /**
     * TransactionNotification
     *
     * Recupera a transação através de uma notificação
     * @access private
     * @param unknown_type $notificationCode
     * @return Ambigous <a, NULL, PagSeguroTransaction>
     */

    private static function TransactisonNotification($notificationCode)
    {
        try {
            $CI =& get_instance();
            $transaction = $this->pagseguro->transactionNotification($notificationCode);

        } catch (PagSeguroServiceException $e) {
            die ($e->getMessage());
        }

        return $transaction;
    }


    /**
     * TransactionNotification
     *
     * Recupera a transação através de uma notificação
     * @access private
     * @param unknown_type $notificationCode
     * @return Ambigous <a, NULL, PagSeguroTransaction>
     */
    private static function TransactionNotification($notificationCode, $idRevenda)
    {


        $CI = &get_instance();
        $ambiente = $CI->config->config['pagseguro']['environment'];

        //Dados da Revenda
        //Carrega Tabelas
        $CI->load->model("revenda_model");

        //Caso não informa nenhum tenta pegar o pai
        if (empty($idRevenda)) {
            $urlAtual = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REDIRECT_URL'];
            //Buscar Parametros da Revenda pela URL
            $parametrosRevenda = $CI->revenda_model->getParametrosRevendaPorUrl($urlAtual);
        } else {
            $parametrosRevenda = $CI->revenda_model->getParametrosRevenda($idRevenda);
        }

        //Se não informar nenhum usa a do administrador
        if (empty($parametrosRevenda)) {
            $parametrosRevenda = $CI->revenda_model->getParametrosRevenda(1);
        }

        $credentials = new PagSeguroAccountCredentials ($parametrosRevenda['pagseguro_email'], $parametrosRevenda['pagseguro_token']);

        //$credentials = new PagSeguroAccountCredentials ( $CI->config->config['pagseguro'][$ambiente]['pagseguroAccount'], $CI->config->config['pagseguro'][$ambiente]['pagseguroToken'] );

        try {
            $transaction = PagSeguroNotificationService::checkTransaction($credentials, $notificationCode);

            $retornoNotificacao = $transaction;


            if (is_object($transaction)) {

                //Carrega Tabelas
                $CI->load->model("cliente_model");

                //Verifica a situaçao da Transaçao.
                $situacaoTransacao = $retornoNotificacao->getStatus()->getValue();
                $idLoginHistoricoPagamento = $retornoNotificacao->getReference();
                $referencia = $retornoNotificacao->getCode();

                $dataPagamento = "";
                if (1 == $situacaoTransacao) {
                    $situacaoPagamento = "Aguardando Pagamento";
                } elseif (3 == $situacaoTransacao) {
                    //Busca dados do Login
                    $dadosLogins = $CI->cliente_model->buscarLogins(array(array(
                            'campo' => "lhp.id_login_historico_pagamento",
                            'operador' => null,
                            'valor' => $idLoginHistoricoPagamento
                        )
                        )
                    );

                    //Só se não foi pago
                    if ($dadosLogins[0]['situacao_pagamento'] != "Pago") {
                        //Se a data de pagamento for maior que a data de vencimento
                        $dataValidade = explode(" ", $dadosLogins[0]['validade']);
                        $dataPagamento = date('Y-m-d');
                        if ($dataPagamento > $dataValidade[0]) {
                            $novaDataVencimento = new DateTime($dataPagamento);
                            $novaDataVencimento->modify("+" . $dadosLogins[0]['dias_plano'] . " day");
                            $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
                        } else {
                            $novaDataVencimento = new DateTime($dataValidade[0]);
                            $novaDataVencimento->modify("+" . $dadosLogins[0]['dias_plano'] . " day");
                            $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
                        }
                        $CI->cliente_model->updateLogin($dadosLogins[0]['id_login'], array(
                                'validade' => $novaDataVencimento . " " . date('H:i:s'),
                                'situacao_login' => 'Ativo',
                                'id_plano' => $dadosLogins[0]['id_plano_escolhido'])
                        );
                        $CI->cliente_model->updateTipo($dadosLogins[0]['id_cliente'], array('tipo' => 'Cliente'));

                        $situacaoPagamento = "Pago";
                    }
                } elseif (6 == $situacaoTransacao) {
                    //Busca dados do Login
                    $dadosLogins = $CI->cliente_model->buscarLogins(array(array(
                            'campo' => "lhp.id_login_historico_pagamento",
                            'operador' => null,
                            'valor' => $idLoginHistoricoPagamento
                        )
                        )
                    );

                    //Se a data de pagamento for maior que a data de vencimento
                    $dataValidade = explode(" ", $dadosLogins[0]['validade']);


                    //Devolvida
                    $novaDataVencimento = new DateTime($dataValidade[0]);
                    $novaDataVencimento->modify("-" . $dadosLogins[0]['dias_plano'] . " day");
                    $novaDataVencimento = $novaDataVencimento->format("Y-m-d");

                    $situacaoPagamento = "Devolvida";

                    $CI->cliente_model->updateLogin($dadosLogins[0]['id_login'], array(
                            'validade' => $novaDataVencimento . " " . date('H:i:s'),
                            'situacao_login' => 'Ativo',
                            'id_plano' => $dadosLogins[0]['id_plano_escolhido'])
                    );

                    //Atualiza histórico Pagamento
                    $historico = $CI->cliente_model->updateHistoricoPagamentoLogin($idLoginHistoricoPagamento,
                        array('data_pagamento' => $dataPagamento,
                            'referencia' => $referencia,
                            'situacao_pagamento' => $situacaoPagamento
                        )
                    );
                } elseif (7 == $situacaoTransacao) {
                    $situacaoPagamento = "Cancelado";
                } else
                    $situacaoPagamento = "Aguardando Pagamento";


                if ($dadosLogins[0]['situacao_pagamento'] != 'Pago') {
                    //Atualiza histórico Pagamento
                    $historico = $CI->cliente_model->updateHistoricoPagamentoLogin($idLoginHistoricoPagamento,
                        array('data_pagamento' => $dataPagamento,
                            'referencia' => $referencia,
                            'situacao_pagamento' => $situacaoPagamento
                        )
                    );
                }


            }
        } catch (PagSeguroServiceException $e) {
            die ($e->getMessage());
        }
        return $transaction;
    }

    public function retornoNotificacao()
    {
        //$CI = & get_instance ();
        //$CI->output->set_header("Access-Control-Allow-Origin: https://sandbox.pagseguro.uol.com.br");
        header("access-control-allow-origin: https://pagseguro.uol.com.br");

        $notificationCode = $_REQUEST['notificationCode'];
        $this->TransactionNotification($notificationCode, $_REQUEST['id_revenda']);

        return TRUE;
    }

    public function retornoTransacao()
    {
        //Limpa código
        $transactionCode = str_replace("-", "", $_REQUEST['transaction_id']);
        if (!empty($transactionCode)) {
            //Carrega Tabelas
            $this->load->model("cliente_model");
            $this->load->model("revenda_model");

            try {
                $CI = &get_instance();
                $ambiente = $CI->config->config['pagseguro']['environment'];

                //Dados da Revenda
                $parametrosRevenda = $this->revenda_model->getParametrosRevenda($_REQUEST['id_revenda']);

                // $credentials = new PagSeguroAccountCredentials ( $CI->config->config['pagseguro'][$ambiente]['pagseguroAccount'], $CI->config->config['pagseguro'][$ambiente]['pagseguroToken'] );
                $credentials = new PagSeguroAccountCredentials ($parametrosRevenda['pagseguro_email'], $parametrosRevenda['pagseguro_token']);

                $response = PagSeguroTransactionSearchService::searchByCode(
                    $credentials,
                    $transactionCode
                );

                //Verifica a situaçao da Transaçao.
                $situacaoTransacao = $response->getStatus()->getValue();
                $referencia = $response->getCode();
                $idLoginHistoricoPagamento = $response->getReference();
                $dataPagamento = "";

                if (1 == $situacaoTransacao) {
                    $situacaoPagamento = "Aguardando Pagamento";
                } elseif (3 == $situacaoTransacao) {
                    //Busca dados do Login
                    $dadosLogins = $this->cliente_model->buscarLogins(array(array(
                            'campo' => "lhp.id_login_historico_pagamento",
                            'operador' => null,
                            'valor' => $idLoginHistoricoPagamento
                        )
                        )
                    );

                    if ($dadosLogins[0]['situacao_pagamento'] != 'Pago') {
                        //Se a data de pagamento for maior que a data de vencimento
                        $dataValidade = explode(" ", $dadosLogins[0]['validade']);
                        $dataPagamento = date('Y-m-d');
                        if ($dataPagamento > $dataValidade[0]) {
                            $novaDataVencimento = new DateTime($dataPagamento);
                            $novaDataVencimento->modify("+" . $dadosLogins[0]['dias_plano'] . " day");
                            $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
                        } else {
                            $novaDataVencimento = new DateTime($dataValidade[0]);
                            $novaDataVencimento->modify("+" . $dadosLogins[0]['dias_plano'] . " day");
                            $novaDataVencimento = $novaDataVencimento->format("Y-m-d");
                        }
                        $situacaoPagamento = "Pago";

                        $this->cliente_model->updateLogin($dadosLogins[0]['id_login'], array(
                                'validade' => $novaDataVencimento . " " . date('H:i:s'),
                                'situacao_login' => 'Ativo',
                                'id_plano' => $dadosLogins[0]['id_plano_escolhido'])
                        );
                    }

                    $this->cliente_model->updateTipo($dadosLogins[0]['id_cliente'], array('tipo' => 'Cliente'));
                    //Limpar Cache
                    $this->limparCache();

                } elseif (6 == $situacaoTransacao) {
                    //Busca dados do Login
                    $dadosLogins = $this->cliente_model->buscarLogins(array(array(
                            'campo' => "lhp.id_login_historico_pagamento",
                            'operador' => null,
                            'valor' => $idLoginHistoricoPagamento
                        )
                        )
                    );

                    //Se a data de pagamento for maior que a data de vencimento
                    $dataValidade = explode(" ", $dadosLogins[0]['validade']);


                    //Devolvida
                    $novaDataVencimento = new DateTime($dataValidade[0]);
                    $novaDataVencimento->modify("-" . $dadosLogins[0]['dias_plano'] . " day");
                    $novaDataVencimento = $novaDataVencimento->format("Y-m-d");

                    $situacaoPagamento = "Devolvida";

                    $this->cliente_model->updateLogin($dadosLogins[0]['id_login'], array(
                            'validade' => $novaDataVencimento . " " . date('H:i:s'),
                            'situacao_login' => 'Ativo',
                            'id_plano' => $dadosLogins[0]['id_plano_escolhido'])
                    );
                } elseif (7 == $situacaoTransacao) {
                    $situacaoPagamento = "Cancelado";
                } else {
                    $situacaoPagamento = "Aguardando Pagamento";
                }

                if (empty($referencia))
                    $referencia = $_REQUEST['transaction_id'];

                if ($dadosLogins[0]['situacao_pagamento'] != 'Pago') {
                    //Atualiza histórico Pagamento
                    $historico = $this->cliente_model->updateHistoricoPagamentoLogin($idLoginHistoricoPagamento,
                        array('data_pagamento' => $dataPagamento,
                            'referencia' => $referencia,
                            'situacao_pagamento' => $situacaoPagamento
                        )
                    );
                }

                $this->session->unset_userdata('id_revenda_pagamento');
                redirect(base_url('painel_cliente'));

            } catch (PagSeguroServiceException $e) {
                die($e->getMessage());
            }
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
            $resultsRevenda = $this->memcached_library->get('listar_revendas' . $idRevenda);
            $resultsClientes = $this->memcached_library->get('listar_clientes' . $idRevenda);

            // Se não existir cache Revendas, carrega com os dados da busca.
            if (!empty($resultsRevenda)) {
                // Deleta Cache
                $this->memcached_library->delete('listar_revendas' . $idRevenda);
            }

            // Se não existir cache Clientes, carrega com os dados da busca.
            if (!empty($resultsClientes)) {
                // Deleta Cache
                $this->memcached_library->delete('listar_clientes' . $idRevenda);
            }
        } else {
            //echo "ENTROU SERVIDOR";
            $meminstance = new Memcache();
            $meminstance->connect('localhost', 11211);

            $resultClientes = $meminstance->get('listar_clientes' . $idRevenda);
            $resultRevendas = $meminstance->get('listar_revendas' . $idRevenda);
            if (!empty($resultClientes)) {
                // Deleta Cache
                $meminstance->delete('listar_clientes' . $idRevenda);
            }
            if (!empty($resultRevendas)) {
                // Deleta Cache
                $meminstance->delete('listar_revendas' . $idRevenda);
            }
        }
    }

}

?>
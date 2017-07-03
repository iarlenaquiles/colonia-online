<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class relatorio extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        // Your own constructor code

        //Verificação da Sessão de Login
        $this->load->library("autenticacao");

    }


    public function aniversariantes(){
      $this->load->library("autenticacao");

      $this->template->controlearquivo("relatorio/aniversariantes", $data);

    }

    public function imposto_sindical(){
      $this->load->library("autenticacao");

      $this->template->controlearquivo("relatorio/imposto_sindical", $data);

    }

    public function livro(){
      $this->load->library("autenticacao");

      $this->template->controlearquivo("relatorio/livro", $data);

    }

    public function gerar_livro(){

        $this->load->library('pdf');
        $this->pdf->SetFooter('Pagina {PAGENO}/{nb}');
        $this->load->model("relatorio_model");
        $data['livros'] = $this->relatorio_model->getLivro($_REQUEST['livro']);
        $this->load->model("pessoa_model");
        $data['cargos'] = $this->pessoa_model->getAll();
        $this->load->model("estado_model");
        $data['estados'] = $this->estado_model->getAll();
        $this->load->model("cidade_model");
        $data['cidades'] = $this->cidade_model->getAll();
        $this->load->model("colonia_model");
        $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
        $this->pdf->load_view('relatorio/imprimir/livroI', $data);

        $this->pdf->Output();


    }



    public function gerar_imposto(){

      $this->load->library('pdf');

      $this->pdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("relatorio_model");
      $data['pagamentos'] = $this->relatorio_model->getPagamentos($_REQUEST['ano']);
      $this->load->model("pessoa_model");
      $data['cargos'] = $this->pessoa_model->getAll();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $this->pdf->load_view('relatorio/imprimir/imposto_sindical_impressao', $data);

      $this->pdf->Output();


    }


    public function gerar_aniversariantes(){

        $this->load->library('pdf');
        $this->pdf->AddPage('L');
        $this->pdf->SetFooter('Pagina {PAGENO}/{nb}');
        $this->load->model("relatorio_model");
        $data['aniversariantes'] = $this->relatorio_model->getAniversariantes($_REQUEST['mes']);
        $this->load->model("pessoa_model");
        $data['cargos'] = $this->pessoa_model->getAll();
        $this->load->model("estado_model");
        $data['estados'] = $this->estado_model->getAll();
        $this->load->model("cidade_model");
        $data['cidades'] = $this->cidade_model->getAll();
        $this->load->model("colonia_model");
        $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
        $this->pdf->load_view('relatorio/imprimir/aniversariantes', $data);

        $this->pdf->Output();


    }

    public function gerados(){
        $this->load->library("autenticacao");
        $this->load->model("relatorio_model");
        //Retorno registros
        $this->load->model("relatorio_model");
        $data["registros"] = $this->relatorio_model->getRelatorios();

        $this->template->controlearquivo("relatorio/gerados", $data);
    }


    public function geral(){
      $this->load->library("autenticacao");

      $this->template->controlearquivo("relatorio/geral", $data);
    }

    public function gerar_aposentados(){
      $this->load->library('pdf');

      $this->pdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("pessoa_model");
      $data["aposentados"] = $this->pessoa_model->getAposentados();
      $data['cargos'] = $this->pessoa_model->getAll();
      $data['qtd'] = $this->pessoa_model->countQtdAposentados();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $this->pdf->load_view('relatorio/imprimir/aposentados', $data);
      $this->pdf->Output();
    }

    public function gerar_catadores(){
      $this->load->library('pdf');
      $this->pdf->AddPage('L');
      $this->pdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("pessoa_model");
      $data["catadores"] = $this->pessoa_model->getCatadores();
      $data['cargos'] = $this->pessoa_model->getAll();
      $data['qtd'] = $this->pessoa_model->countQtdCatadores();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $this->pdf->load_view('relatorio/imprimir/catadores', $data);
      $this->pdf->Output();
    }


    public function todos_colonizados(){
      $this->load->library('mpdf');
      $this->load->library("autenticacao");
      $this->load->model("pessoa_model");
      $this->mpdf->SetFooter('Pagina {PAGENO}/{nb}');
      $data["pescadores"] = $this->pessoa_model->getAll();
      $data['cargos'] = $this->pessoa_model->getAll();
      $data['qtd'] = $this->pessoa_model->count();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $html = $this->load->view('relatorio/imprimir/todos',$data,TRUE);
      $this->mpdf->WriteHTML($html);
      $this->mpdf->Output('relatorio_todos_colonizados_'.date('Y-m-d').'.pdf','D');

    }

    public function gerar_falecidos(){
      $this->load->library('pdf');
      $this->pdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("pessoa_model");
      $data["falecidos"] = $this->pessoa_model->getFalecidos();
      $data['cargos'] = $this->pessoa_model->getAll();
      $data['qtd'] = $this->pessoa_model->countQtdFalecidos();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $this->pdf->load_view('relatorio/imprimir/falecidos', $data);
      $this->pdf->Output();
    }

    public function gerar_pis_seap_mpa(){
      $this->load->library('mpdf');
      $this->load->library("autenticacao");
      $this->mpdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("pessoa_model");
      $data["documentos"] = $this->pessoa_model->getAll();
      $data['cargos'] = $this->pessoa_model->getAll();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $html = $this->load->view('relatorio/imprimir/pis_seap_mpa',$data,TRUE);
      $this->mpdf->WriteHTML($html);
      $this->mpdf->Output('relatorio_pis_seap_mpa_'.date('Y-m-d').'.pdf','D');
    }


    public function gerar_cpf_seap_mpa(){
      $this->load->library('mpdf');
      $this->load->library("autenticacao");
      $this->mpdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("pessoa_model");
      $data["documentos"] = $this->pessoa_model->getAll();
      $data['cargos'] = $this->pessoa_model->getAll();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $html = $this->load->view('relatorio/imprimir/cpf_seap_mpa',$data,TRUE);
      $this->mpdf->WriteHTML($html);
      $this->mpdf->Output('relatorio_cpf_seap_mpa_'.date('Y-m-d').'.pdf','D');
    }


    public function gerar_titulo_zona_secao(){
      $this->load->library('mpdf');
      $this->load->library("autenticacao");
      $this->mpdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("pessoa_model");
      $data["documentos"] = $this->pessoa_model->getAll();
      $data['cargos'] = $this->pessoa_model->getAll();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $html = $this->load->view('relatorio/imprimir/titulo_zona_secao',$data,TRUE);
      $this->mpdf->WriteHTML($html);
      $this->mpdf->Output('relatorio_titulo_zona_secao_'.date('Y-m-d').'.pdf','D');
    }

    public function gerar_telefones(){
      $this->load->library('mpdf');
      $this->load->library("autenticacao");
      $this->mpdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("pessoa_model");
      $data["telefones"] = $this->pessoa_model->getAll();
      $data['cargos'] = $this->pessoa_model->getAll();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $html = $this->load->view('relatorio/imprimir/telefones',$data,TRUE);
      $this->mpdf->WriteHTML($html);
      $this->mpdf->Output('relatorio_telefones_'.date('Y-m-d').'.pdf','D');
    }


    public function gerar_enderecos(){
      $this->load->library('mpdf');
      $this->load->library("autenticacao");
      $this->mpdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("pessoa_model");
      $data["enderecos"] = $this->pessoa_model->getAll();
      $data['cargos'] = $this->pessoa_model->getAll();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $html = $this->load->view('relatorio/imprimir/enderecos',$data,TRUE);
      $this->mpdf->WriteHTML($html);
      $this->mpdf->Output('relatorio_enderecos_'.date('Y-m-d').'.pdf','D');
    }


    public function gerar_bairros(){
      $this->load->library('mpdf');
      $this->load->library("autenticacao");
      $this->mpdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("relatorio_model");
      $data["bairros"] = $this->relatorio_model->getBairros();
      $this->load->model("pessoa_model");
      $data['cargos'] = $this->pessoa_model->getAll();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $html = $this->load->view('relatorio/imprimir/bairros',$data,TRUE);
      $this->mpdf->WriteHTML($html);
      $this->mpdf->Output('relatorio_bairros_'.date('Y-m-d').'.pdf','D');
    }

    public function gerar_nit_cpf_nasc(){
      $this->load->library('mpdf');
      $this->load->library("autenticacao");
      $this->mpdf->SetFooter('Pagina {PAGENO}/{nb}');
      $this->load->model("pessoa_model");
      $data["documentos"] = $this->pessoa_model->getAll();
      $data['cargos'] = $this->pessoa_model->getAll();
      $this->load->model("estado_model");
      $data['estados'] = $this->estado_model->getAll();
      $this->load->model("cidade_model");
      $data['cidades'] = $this->cidade_model->getAll();
      $this->load->model("colonia_model");
      $data['dadosColonia'] = $this->colonia_model->getById($this->session->userdata('colonia_id'));
      $html = $this->load->view('relatorio/imprimir/nit_cpf_nasc',$data,TRUE);
      $this->mpdf->WriteHTML($html);
      $this->mpdf->Output('relatorio_nit_cpf_nasc_'.date('Y-m-d').'.pdf','D');
    }

}

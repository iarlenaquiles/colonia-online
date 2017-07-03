<?php
class relatorio_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }



    public function getAniversariantes($mes){
      //SELECT
      $this->db->select( "a.*",false);

      $this->db->from("pessoa a");
      $this->db->where('Month(a.data_nascimento) = '.$mes);
      $this->db->where('a.colonia_id = '.$this->session->userdata("colonia_id"));
      $this->db->order_by("a.nome_pessoa asc");

      $query = $this->db->get();
      //echo $this->db->last_query(); exit();

      if ($query->num_rows() > 0) {

        $registros = $query->result_array();

      } else {
        $registros = null;
      }

      return $registros;
    }


    public function getPagamentos($ano){
      //SELECT
      $this->db->select( "pg.*, p.nome_pessoa, p.numero_carteira, p.cpf_cnpj",false);
      
      $this->db->from("historico_pescador_pagamento pg");
      $this->db->join("pessoa p", "p.id_pessoa = pg.id_pessoa","left");
      $this->db->where('Year(pg.data_pagamento) = '.$ano);
      $this->db->where('p.colonia_id = '.$this->session->userdata("colonia_id"));
      $this->db->order_by("p.nome_pessoa asc");

      $query = $this->db->get();
      //echo $this->db->last_query(); exit();

      if ($query->num_rows() > 0) {

        $registros = $query->result_array();

      } else {
        $registros = null;
      }

      return $registros;
    }




    public function getLivro($livro){
      //SELECT
      $this->db->select( "a.*",false);

      $this->db->from("pessoa a");
      $this->db->where('a.numero_livro_filiacao = '.$livro);
      $this->db->where('a.colonia_id = '.$this->session->userdata("colonia_id"));
      $this->db->order_by("a.numero_carteira asc");

      $query = $this->db->get();
      //echo $this->db->last_query(); exit();

      if ($query->num_rows() > 0) {

        $registros = $query->result_array();

      } else {
        $registros = null;
      }

      return $registros;
    }


    public function getRelatorios(){
      //SELECT
      $this->db->select( "r.*, p.nome_pessoa, u.nome_usuario, c.nome_colonia",false);
      $this->db->from("relatorios r");
      $this->db->join("pessoa p", "p.id_pessoa = r.id_pessoa","left");
      $this->db->join("colonia c", "c.id_colonia = p.colonia_id","left");
      $this->db->join("usuario u", "u.id = r.id_usuario_cadastro","left");


      $query = $this->db->get();
      //echo $this->db->last_query(); exit();

      if ($query->num_rows() > 0) {

        $registros = $query->result_array();

      } else {
        $registros = null;
      }

      return $registros;
    }


    public function getBairros(){
      //SELECT
      $this->db->select( "p.*",false);

      $this->db->from("pessoa p");
      $this->db->where('p.colonia_id = '.$this->session->userdata("colonia_id"));
      $this->db->order_by("p.endereco_bairro asc");

      $query = $this->db->get();
      //echo $this->db->last_query(); exit();

      if ($query->num_rows() > 0) {

        $registros = $query->result_array();

      } else {
        $registros = null;
      }

      return $registros;
    }





  }

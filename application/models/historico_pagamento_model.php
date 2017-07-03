<?php

Class login_historico_pagamento_model extends CI_Model
{

    public function insert($dados)
    {
        // Cria o Insert
        $this->db->set("id_usuario", $dados['id_usuario']);
        $this->db->set("id_plano_valor_escolhido", $dados['id_plano_valor_escolhido']);
        $this->db->set("valor_plano", $dados['valor_plano']);
        $this->db->set("desconto", $dados['desconto']);
        $this->db->set("data_pedido", date('Y-m-d H:i:s'));
        $this->db->set("data_pagamento", $dados['data_pagamento']);
        $this->db->set("mes_ano_referencia", date('d/Y'));
        $this->db->set("situacao", $dados['situacao']);

        $this->db->insert("historico_pagamento");

        return $this->db->insert_id();
    }

    public function getID($id)
    {
        $this->db->where('id_plano', $id);
        $query = $this->db->get('plano');

        return $query->num_rows();
    }


    public function getAll($filtro = null)
    {

        //SELECT
        $this->db->select("hp.*", false);
        //$this->db->select( "DATE_FORMAT(hp.data_pedido,'%d/%m/%Y') as data_pedido",false);

        $this->db->select("lhp.*", false);
        $this->db->from("login_historico_pagamento lhp");

        if ($filtro != null) {
            foreach ($filtro as $row) {
                switch ($row['operador']) {

                    case "LIKE":
                        $this->db->like($row['campo'], $row['valor']);
                        break;
                    case "IN":
                        $this->db->where($row['campo'] . " " . $row['operador'] . " " . $row['valor']);
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

        $this->db->order_by("lhp.id_login_historico_pagamento DESC");

        $query = $this->db->get();

        //echo $this->db->last_query(); exit();

        if ($query->num_rows() > 0) {

            $registros = $query->result_array();

        } else {
            $registros = null;
        }

        return $registros;
    }


    public function getById($id)
    {

        $filtro[] = array(
            'campo' => 'lhp.id_login_historico_pagamento',
            'operador' => null,
            'valor' => $id
        );

        $resultado = $this->getAll($filtro);

        return $resultado[0];
    }


}
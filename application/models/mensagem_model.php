<?php 
	
Class mensagem_model extends CI_Model
{


    /**
     * Método para buscar registros na tabela
     * @name getAll
     * @access public
     * @author Tássio Neri
     * @param $filtro Array com parâmetros
     * @return Array retorna array com registros encontrados
     */
    public function getAll($filtro=null)
    {
        $this->db->select( "m.*",false);
        $this->db->select( "m.data_envio as data_envio_original",false);
        $this->db->select( "DATE_FORMAT(m.data_envio,'%d/%m/%Y %H:%i:%s') as data_envio",false);
        $this->db->select( "DATE_FORMAT(m.data_visualizacao_destinatario,'%d/%m/%Y %H:%i:%s') as data_visualizacao",false);
        $this->db->select( "rr.id_revenda AS id_revenda_remetente",false);
        $this->db->select( "rr.nome_revenda AS nome_revenda_remetente",false);
        $this->db->select( "rd.id_revenda AS id_revenda_destinatario",false);
        $this->db->select( "rd.nome_revenda AS nome_revenda_destinatario",false);
        $this->db->from( "mensagem m" );
        $this->db->join("revenda rr", "rr.id_revenda = m.id_revenda_remetente","left");
        $this->db->join("revenda rd", "rd.id_revenda = m.id_revenda_destinatario","left");
        //Se existir filtro, entra na condição dos operadores
        if ($filtro!=null) {
            foreach ($filtro as $row) {
                switch ($row['operador']) {
                    case "LIKE":
                        $this->db->like( $row['campo'], $row['valor'] );
                        break;
                    case "IN":
                        $this->db->where( $row['campo'] ." ". $row['operador'] ." ". $row['valor'] );
                        break;
                    case "OR":
                        $this->db->where( $row['campo_1'] ." = ". $row['valor_1']." || ".$row['campo_2'] ." = ". $row['valor_2'] );
                        break;
                    case "NOT NULL":
                        $this->db->where($row['campo']." != ''");
                        break;
                    case "BETWEEN":
                        $this->db->where( $row['campo'] ." BETWEEN '". $row['valor_1']."' AND '".$row['valor_2']."'" );
                        break;
                    default:
                        if ($row["campo"]==null) {
                            $this->db->where( $row['valor'] );
                        } else {
                            $this->db->where( $row['campo'], $row['valor'] );
                        }
                        break;
                }
            }
        }
        $this->db->order_by('m.id_mensagem',"DESC");
        $query = $this->db->get();
        //echo $this->db->last_query();// exit();
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
        $this->db->set( "id_revenda_remetente", $dados['id_revenda_remetente']);
        $this->db->set( "id_revenda_destinatario", $dados['id_revenda_destinatario']);
        $this->db->set( "assunto_mensagem", $dados['assunto_mensagem']);
        $this->db->set( "mensagem", $dados['mensagem']);
        $this->db->set( "data_envio", date('Y-m-d H:i:s'));

        $this->db->insert("mensagem");

        return $this->db->insert_id();
    }


    /**
     * Método para atualizar dados na tabela
     * @name update
     * @access public
     * @author Tássio Neri
     */
    public function update($id,$dados)
    {
        $this->db->set( "assunto_mensagem", $dados['assunto_mensagem']);
        $this->db->set( "mensagem", $dados['mensagem']);
        $this->db->where("id_mensagem", $id);
        $this->db->update("mensagem");
    }

    /**
     * Método para excluir registro
     * @name delete
     * @access public
     * @author Tássio Neri
     * @return void
     */
    public function delete($id){
        $this->db->where('id_mensagem', $id)->delete('mensagem');
        return true;
    }


    /**
     * Método para atualizar dados na tabela
     * @name update
     * @access marcar_visualizada
     * @author Tássio Neri
     * @param $dados Array dos dados
     * @return int Código do registro inserido
     */
    public function marcar_visualizada($id)
    {
        $this->db->set( "data_visualizacao_destinatario", date('Y-m-d H:i:s'));

        $this->db->where("id_mensagem", $id);
        $this->db->update("mensagem");

    }

}
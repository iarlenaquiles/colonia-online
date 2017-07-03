<?php 
	
Class plano_model extends CI_Model
{

	public function getID($id){
		$this->db->where('id_plano', $id );
		$query = $this->db->get('plano');
		
		return $query->num_rows();
	}

    /**
     * Método para excluir registro
     * @name delete
     * @access public
     * @author Tássio Neri
     * @return void
     */
    public function delete($id){
        $this->db->where('id_plano', $id)->delete('plano');
        return true;
    }

	public function getAll($filtro=null)
	{

		//SELECT
        $this->db->select( "*",false);
        //$this->db->select( " GROUP_CONCAT(DISTINCT(CONCAT(pv.quantidade_dias,"-",pv.valor,"-",pv.desconto))) AS planos_valores ",false);


		$this->db->from( "plano p" );
        $this->db->join("revenda_plano rp", "rp.id_plano = p.id_plano","left");

        if ($filtro!=null) {
            foreach ($filtro as $row) {
                switch ($row['operador']) {

                    case "LIKE":
                        $this->db->like( $row['campo'], $row['valor'] );
                        break;
                    case "IN":
                        $this->db->where( $row['campo'] ." ". $row['operador'] ." ". $row['valor'] );
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
        $this->db->group_by("p.id_plano");
        $this->db->order_by("p.nome_plano","asc");
		$query = $this->db->get();

		//echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}


    public function getAllPlanoValor($filtro=null)
    {

        //SELECT
        $this->db->select( "*",false);
        //$this->db->select( " GROUP_CONCAT(DISTINCT(CONCAT(pv.quantidade_dias,"-",pv.valor,"-",pv.desconto))) AS planos_valores ",false);


        $this->db->from( "plano_valor pv" );
        if ($filtro!=null) {
            foreach ($filtro as $row) {
                switch ($row['operador']) {

                    case "LIKE":
                        $this->db->like( $row['campo'], $row['valor'] );
                        break;
                    case "IN":
                        $this->db->where( $row['campo'] ." ". $row['operador'] ." ". $row['valor'] );
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
        $this->db->group_by("pv.id_plano_valor");
        $query = $this->db->get();

        //echo $this->db->last_query(); exit();

        if ($query->num_rows() > 0) {

            $registros = $query->result_array();

        } else {
            $registros = null;
        }

        return $registros;
    }


    public function getValoresPlano($idPlano)
    {

        //SELECT
        $this->db->select( "*",false);
        $this->db->from( "plano_valor pv" );
        $this->db->where('pv.id_plano',$idPlano);
        //$this->db->group_by("p.id_plano");
        $query = $this->db->get();

        //echo $this->db->last_query(); exit();

        if ($query->num_rows() > 0) {

            $registros = $query->result_array();

        } else {
            $registros = null;
        }

        return $registros;
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
        $this->db->set( "nome_plano", $dados['nome_plano']);
        $this->db->set( "quantidade_dias", $dados['quantidade_dias']);
        $this->db->set( "valor_plano", $dados['valor_plano']);
        $this->db->set( "situacao_plano", $dados['situacao_plano']);

        $this->db->insert("plano");

        return $this->db->insert_id();
    }

    /**
     * Método para atualizar dados na tabela
     * @name update
     * @access public
     * @author Tássio Neri
     * @param $dados Array dos dados
     * @return int Código do registro inserido
     */
    public function update($id,$dados)
    {
        // Cria o Insert
        $this->db->set( "nome_plano", $dados['nome_plano']);
        $this->db->set( "quantidade_dias", $dados['quantidade_dias']);
        $this->db->set( "valor_plano", $dados['valor_plano']);
        $this->db->set( "situacao_plano", $dados['situacao_plano']);

        $this->db->where("id_plano", $id);
        $this->db->update("plano");
    }


	public function getById($id) {

		$filtro[] = array(
			'campo'    => 'p.id_plano',
			'operador' => null,
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}

    public function getByIdPlanoValor($id) {

        $filtro[] = array(
            'campo'    => 'pv.id_plano_valor',
            'operador' => null,
            'valor'    => $id
        );

        $resultado = $this->getAllPlanoValor( $filtro );

        return $resultado[0];
    }

    /**
     * Método para inserir dados na tabela
     * @name insertPlanoRevenda
     * @access public
     * @author Tássio Neri
     * @param $idRevenda Código da Revenda
     * @param $idPlano Código do Plano
     * @return int Código do registro inserido
     */
    public function insertPlanoRevenda($idRevenda, $idPlano)
    {
        // Cria o Insert
        $this->db->set( "id_revenda", $idRevenda);
        $this->db->set( "id_plano", $idPlano);

        $this->db->insert("revenda_plano");

        return $this->db->insert_id();
    }



}
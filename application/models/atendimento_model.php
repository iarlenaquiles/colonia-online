<?php

Class atendimento_model extends CI_Model
{

	public function getID($id){
		$this->db->where('id_historico', $id );
		$query = $this->db->get('historico');

		return $query->num_rows();
	}

	public function delete($id){
		$this->db->where('id_historico', $id)->delete('historico');
		return true;
	}

	function count(){
		$registros = $this->getAll();
		return  count($registros);
	}

	public function getAll($filtro=null)
	{

		//SELECT de agenda
    $this->db->select( "h.*, p.nome_pessoa, p.colonia_id");
		$this->db->from( "historico h" );
		$this->db->join("pessoa p", "p.id_pessoa = h.id_pessoa","left");
		$this->db->join("colonia c", "c.id_colonia = p.colonia_id","right");

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
                        $this->db->where("'". $row['campo'] ."' BETWEEN '". $row['valor_1']."' AND '".$row['valor_2']."'" );
                        break;
					 case "equals":
					 			$this->db->where($row["campo"]." = ".$row['valor']);
								break;
					default:
						if ($row["campo"]==null) {
							$this->db->where($row['valor']);
						} else {
							$this->db->where($row['campo'], $row['valor']);
						}
						break;
				}
			}
		}

		$query = $this->db->get();

//		echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}

	public function getById($id) {

		$filtro[] = array(
			'campo'    => 'h.id_historico',
			'operador' => 'equals',
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}


  public function insert($dados){
    $this->db->insert("historico", $dados);

    $idColonia = $this->db->insert_id();

    return $idColonia;

  }

	public function getByCnpj($cnpj) {

		$filtro[] = array(
			'campo'    => 'c.cnpj',
			'operador' => null,
			'valor'    => $cnpj
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}


	function update($table,$data,$fieldID,$ID){
		$this->db->where($fieldID,$ID);
		$this->db->update($table, $data);

		if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}

		return FALSE;
	}


	public function getAtendimentoByColonia($idColonia){

		//SELECT de historico
		$this->db->select( "h.*, p.nome_pessoa, p.id_pessoa,u.nome_usuario as usuario_cadastro");
		$this->db->from( "historico h" );
		$this->db->join("pessoa p", "p.id_pessoa = h.id_pessoa","left");
		$this->db->join("colonia c", "c.id_colonia = p.colonia_id","right");
		$this->db->join("usuario u", "u.id = h.id_usuario_cadastro","left");
		$this->db->where('c.id_colonia = '.$idColonia);

		$query = $this->db->get();

	//		echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}


}

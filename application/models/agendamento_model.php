<?php

Class agendamento_model extends CI_Model
{

	public function getID($id){
		$this->db->where('id_agendamento_inss', $id );
		$query = $this->db->get('agendamento_inss');

		return $query->num_rows();
	}

	public function delete($id){
		$this->db->where('id_agendamento_inss', $id)->delete('agendamento_inss');
		return true;
	}

	function count(){
		$registros = $this->getAll();
		return  count($registros);
	}

	public function getAll($filtro=null)
	{

		//SELECT de agenda
    $this->db->select( "a.*, p.nome_pessoa");
		$this->db->from( "agendamento_inss a" );
		$this->db->join("pessoa p", "p.id_pessoa = a.id_pessoa","left");

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
			'campo'    => 'a.id_agendamento_inss',
			'operador' => 'equals',
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}


  public function insert($dados){
    $this->db->insert("agendamento_inss", $dados);

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



}
